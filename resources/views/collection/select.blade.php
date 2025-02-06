@props([
    'collections',
    'selected_id',
])

<div>
    <select name="collection_id" value="{{ $selected_id }}">
        <option disabled>Select collection...</option>
        @foreach ($collections as $collection)
            <option value="{{ $collection->id }}">
                {{ $collection->name }}
            </option>
        @endforeach
    </select>

    @error('collection_id')
        <p>{{ $message }}</p>
    @enderror
</div>
