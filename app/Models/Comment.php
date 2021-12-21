<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\Taggable;

class Comment extends Model
{
    use HasFactory, SoftDeletes, Taggable;
    
    // use blogPost becos Laravel will find foreign key as blog_post_id
    // if you wanna use another foreign key name: return $this->belongsTo('App\BlogPost', 'post_id', 'blog_post_id');
    
    protected $fillable = ['user_id', 'content'];

    protected $hidden = ['deleted_at', 'commentable_type', 'commentable_id', 'user_id'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }
}
