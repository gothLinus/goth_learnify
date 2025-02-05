<div>
    @foreach ($collections as $collection)
        <a
            href="{{ route('collections.show', $collection) }}"
            wire:navigate.hover
        >
            {{ $collection->name }}
        </a>
    @endforeach
</div>
