@if($loop->even)
<div>{{ $key }}.{{ $post['title'] }}</div>
@else
<div style='color:green'>{{ $key }}.{{ $post['title'] }}</div>
@endif