<li class="list-group-item d-flex justify-content-between row mb-3 {{ $post->trashed()?'border-danger':'' }}">
    <div class="col-md-8">
        <h3><a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a></h3>
        <span class="text-muted mb-0">added {{ $post->created_at->diffForHumans() }} 
                                      by {{ $post->user->name }}</span><br>
        @if($post->comments_count == 1)
        <span>
            {{ $post->comments_count }} comment
        </span>
        @elseif($post->comments_count > 1)
        <span>
            {{ $post->comments_count }} comments
        </span>
        @else
        <span>No comments yet.</span>
        @endif
    </div>
    
    <div>
        @can('update', $post)
        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">Edit</a>
        @endcan
        @if(!$post->trashed())
        @can('delete', $post)
        <form class="d-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
        @endcan
        @endif
        {{--  @if($post->trashed())
        @can('restore', $post)
        <form class="d-inline" action="{{ route('posts.restore', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('RESTORE')
            <input type="submit" value="Restore" class="btn btn-danger">
        </form>
        @endcan
        @endif  --}}
    </div>

    {{--  @cannot('update', $post)
        <p>you cannot update post.</p>
    @endcannot  --}}
</li>
