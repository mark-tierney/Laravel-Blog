<span class="text-muted mb-0">
    {{ empty(trim($slot)) ? 'added ' : $slot }} {{ $date->diffForHumans() }}
    @if(isset($name))
        by {{ $name }}
    @endif
</span>