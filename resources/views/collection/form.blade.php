@props([
    'action',
    'method',
    'collection',
])

<div>
    <form action="{{ $action }}" method="POST">
        @csrf
        @method($method)

        <label for="name">Name</label>
        <input
            name="name"
            value="{{ old('name', $collection?->name) }}"
            placeholder="Name"
        />
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Save</button>
    </form>
</div>
