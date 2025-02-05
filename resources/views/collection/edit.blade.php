<div>
    @include(
        'collection.form',
        [
            'action' => route('collections.update', $collection),
            'method' => 'PUT',
            'collection' => $collection,
        ]
    )
    <a href="{{ route('collections.show', $collection) }}" wire:navigate.hover>
        Back
    </a>
</div>
