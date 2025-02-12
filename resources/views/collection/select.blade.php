@props([
    'collections',
    'selected_id',
])

<div>
    <select name="collection_id">
        <option disabled>Select collection...</option>
        @foreach ($collections as $collection)
            <option
                value="{{ $collection->id }}"
                {{ $collection->id === $selected_id ? 'selected' : null }}
            >
                {{ $collection->name }}
            </option>
        @endforeach
    </select>

    @error('collection_id')
        <p>{{ $message }}</p>
    @enderror
</div>
