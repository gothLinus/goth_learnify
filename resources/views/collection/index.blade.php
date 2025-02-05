@php
    use App\Models\Collection;
@endphp

<div>
    @can('create', Collection::class)
        <a href="{{ route('collections.create') }}" wire:navigate.hover>New</a>
    @endcan

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
