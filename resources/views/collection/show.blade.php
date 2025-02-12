<x-layout>
    <div>
        <a href="{{ route('collections.index') }}" wire:navigate.hover>Back</a>
        @dump($collection->attributesToArray())

        <ul>
            @forelse ($collection->cards as $card)
                <li>
                    <a
                        href="{{ route('card.show', $card) }}"
                        wire:navigate.hover
                    >
                        {{ $card->title }}
                    </a>
                </li>
            @empty
                <p>No Cards found.</p>
            @endforelse
        </ul>

        @can('update', $collection)
            <a
                href="{{ route('collections.edit', $collection) }}"
                wire:navigate.hover
            >
                Edit
            </a>
        @endcan

        @can('delete', $collection)
            <form
                action="{{ route('collections.destroy', $collection) }}"
                method="post"
            >
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endcan
    </div>
</x-layout>
