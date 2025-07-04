<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'hotness',
        'views_count',
        'created_at',
    ];

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'order_items', 'post_id', 'product_id')
            ->using(UserPostView::class)
            ->withPivot('quantity', 'price');
    }
}
