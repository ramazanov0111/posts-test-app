<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\ProductResource;
use App\Http\Services\BaseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseController
{
    public function __construct(protected BaseService $service)
    {
    }

    public function postList(int $userId): JsonResponse
    {
        return $this->service->getPostList($userId);
    }

    public function viewStore(Request $request): JsonResponse
    {
        return $this->service->userViewStore($request);
    }
}
