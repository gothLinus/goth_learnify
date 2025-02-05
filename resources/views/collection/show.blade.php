<div>
    <a href="{{ route('collections.index') }}" wire:navigate.hover>Back</a>
    @dump($collection->attributesToArray())
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
