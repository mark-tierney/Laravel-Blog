@auth
<x-errors></x-errors>
<form action="{{ route('posts.comments.store', ['post' => $post->id]) }}" method="POST">
    @csrf
    <div class="form-group p-3">
        <textarea name="content" type="text" class="form-control" ></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Add comment</button>
</form>
@else
<a href="{{ route('login') }}">Sign-in</a> to post comment.
@endauth

<hr/>


{{--  <x-errors></x-errors>  --}}
    
    