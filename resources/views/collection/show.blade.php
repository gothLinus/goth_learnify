<div>
    <a href="{{ route('collections.index') }}" wire:navigate.hover>Back</a>
    @dump($collection->attributesToArray())
</div>
