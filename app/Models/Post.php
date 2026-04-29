<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;


class Post extends Model
{
     use Commentable;

         protected $fillable = [
        'title', 'description', 'image', 'user_name', 'user_id', 'status', 'reason'
    ];

    protected $casts = [
        'status' => 'string'
    ];

    // Scope for approved posts only (homepage)
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    // Scope for pending posts (admin review)
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
