<div>
    @include(
        'collection.form',
        [
            'action' => route('collections.update', $collection),
            'method' => 'PUT',
            'collection' => $collection,
        ]
    )
</div>
