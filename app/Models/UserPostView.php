<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserPostView extends Pivot
{
    use HasFactory;

    protected $table = 'user_post_views';

    protected $fillable = [
        'user_id',
        'post_id',
        'viewed_at',
    ];
}
