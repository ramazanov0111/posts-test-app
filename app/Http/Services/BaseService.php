<?php

namespace App\Http\Services;

use App\Models\Post;
use App\Models\UserPostView;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseService
{
    public function getPostList(int $userId): JsonResponse
    {
        $result = Post::query()
            ->select(
                [
                    'posts.id',
                    'posts.title',
                    'posts.content',
                    'posts.hotness',
                    'posts.views_count',
                    'posts.created_at',
                ])
            ->leftJoin('user_post_views', function ($join) use ($userId) {
                $join->on('posts.id', '=', 'user_post_views.post_id')
                    ->where('user_post_views.user_id', '=', $userId);
            })
            ->where('posts.views_count', '<', 1000)
            ->whereNull('user_post_views.id')
            ->orderBy('posts.hotness')
            ->limit(20)
            ->get();

        // Увеличиваем счетчик показов
        Post::query()->chunk(200, function ($items) {
            foreach ($items as $item) {
                $item->views_count++;
                $item->save();
            }
        });

        return response()->json($result);
    }

    public function userViewStore(Request $request): JsonResponse
    {
        $postId = $request->get('post_id');
        $userId = $request->get('user_id');

        if ($postId && $userId) {
            UserPostView::create([
                'post_id' => $postId,
                'user_id' => $userId,
                'viewed_at' => Carbon::parse(now())
            ]);
        } else {
            return response()->json([
                'status' => "error"
            ], 400);
        }

        return response()->json([
            'status' => 'success'
        ], 201);
    }
}
