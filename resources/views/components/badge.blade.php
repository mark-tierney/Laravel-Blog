
@if(!isset($show) || $show)
<span class="badge badge-{{ $type ?? 'info' }}">
    {{ $slot }}
</span>
@endif