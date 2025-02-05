<div>
    <ol>
        @foreach ($collections as $collection)
            <li>
                <a
                    href="{{ route('collections.show', $collection) }}"
                    wire:navigate.hover
                >
                    {{ $collection->name }}
                </a>
            </li>
        @endforeach
    </ol>
</div>
