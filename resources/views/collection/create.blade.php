<x-layout>
    <div>
        @include(
            'collection.form',
            [
                'action' => route('collections.store'),
                'method' => 'POST',
                'collection' => null,
            ]
        )
    </div>
    <a href="{{ route('collections.index') }}" wire:navigate.hover>Back</a>
</x-layout>
