<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testNoPostsWhenEmptyDB()
    {
        $response = $this->get('/posts');

        $response->assertSeeText('No Posts Found');
    }

    public function testSee1PostWhenTheres1Post()
    {
        //arrange obj
        $post = $this->createDummyBlogPost();

        //act
        $response = $this->get('/posts');

        //assert
        $response->assertSeeText('new title');
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'new title'
        ]);
    }

    public function testStoreValid()
    {
        $params = [
            'title' => 'Valid title',
            'content' => 'At least 10 chars'
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog post created.');
    }

    public function testStoreFail()
    {
        $params = [
            'title' => 'x',
            'content' => 'x'
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');
            
        $messages = session('errors')->getMessages();

        $this->assertEquals($messages['title'][0], 'The title must be at least 5 characters.');
        $this->assertEquals($messages['content'][0], 'The content must be at least 10 characters.');
    }

    public function testUpdateValid()
    {
        $post = $this->createDummyBlogPost();

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'new title',
            'content' => 'content of post'
        ]);

        $params = [
            'title' => 'changed title',
            'content' => 'changes content of post'
        ];

        $this->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');
        
        $this->assertEquals(session('status'), 'Blog post updated.');
        $this->assertDatabaseMissing('blog_posts', [
            'title' => 'new title',
            'content' => 'content of post'
        ]);
        $this->assertDatabaseHas('blog_posts', ['title' => 'changed title']);
    }

    public function testDelete()
    {
        $post = $this->createDummyBlogPost();
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'new title',
            'content' => 'content of post'
        ]);

        $this->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog post deleted.');
        $this->assertDatabaseMissing('blog_posts', [
            'title' => 'new title',
            'content' => 'content of post'
        ]);

    }

    private function createDummyBlogPost(): BlogPost
    {
        $post = new BlogPost;
        $post->title = 'new title';
        $post->content = 'content of post';
        $post->save();

        return $post;
    }
}
