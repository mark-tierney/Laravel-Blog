<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagCount = Tag::all()->count();

        if(0 === $tagCount) {
            $this->command->info('no tags found, cannot assign to blog posts');
            return;
        }

        $howManyMin = (int)$this->command->ask('Minimun tags on blog posts', 0);
        $howManyMax = min((int)$this->command->ask('Maximum tags on blog posts', 0), $tagCount);

        BlogPost::all()->each(function (BlogPost $post) use($howManyMin, $howManyMax){
            $take = random_int($howManyMin, $howManyMax);
            $tags = Tag::inRandomOrder()->take($take)->get()->pluck('id');
            $post->tags()->sync($tags);
        });
    }
}
