<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Scopes\LatestScope;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id'];

    use SoftDeletes;
    use HasFactory;

    public function blogPost()
    {
        return $this->belongsTo('App\Models\BlogPost');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopeLatest(Builder $query)
    {  
        return $query->orderBy(static::CREATED_AT, 'desc');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function (Comment $comment) {
            Cache::tags(['blog-post'])->forget("blog-post-{$comment->blog_post_id}");
            Cache::tags(['blog-post'])->forget('mostCommented');
        });

        //static::addGlobalScope(new LatestScope);
    }
}