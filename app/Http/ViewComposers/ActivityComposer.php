<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use App\Models\BlogPost;
use App\Models\User;

class ActivityComposer
{
    public function compose(View $view)
    {
        $mostCommented = Cache::remember('blog-post-most-commented', 60, function(){
            return BlogPost::mostCommented()->take(5)->get();
        });

        $mostActive = Cache::remember('user-most-active', 60, function(){
            return User::withMostBlogPosts()->take(5)->get();
        });

        $mostActiveLastMonth = Cache::remember('user-most-active-last-month', 60, function(){
            return User::withMostBlogPostsLastMonth()->take(5)->get();
        });

        $view->with('mostCommented', $mostCommented);
        $view->with('mostActive', $mostActive);
        $view->with('mostActiveLastMonth', $mostActiveLastMonth);
    }
}