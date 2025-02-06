<x-layout>
    <div class="bg-white rounded-lg shadow-md p-6 max-w-xl mx-auto mt-10">
        <div class="mb-4 border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $card->title }}
            </h2>
        </div>
        <div class="mb-4 border-b pb-4">
            <p class="text-gray-600">{{ $card->collection->name }}</p>
        </div>
        <div class="mb-4 border-b pb-4">
            <p class="text-gray-600">{{ $card->description }}</p>
        </div>
        <div class="mb-4 border-b pb-4">
            <div class="flex items-center space-x-4">
                <!-- Format the time for display -->
                <p class="text-sm text-gray-500">
                    <span>
                        {{ $card->time }}
                    </span>
                </p>
                <button
                    @click="start()"
                    class="px-3 py-1 bg-green-500 text-white rounded-lg hover:bg-green-700"
                >
                    Start
                </button>
                <button
                    @click="stop()"
                    class="px-3 py-1 bg-yellow-500 text-white rounded-lg hover:bg-yellow-700"
                >
                    Stop
                </button>
                <button
                    @click="reset()"
                    class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-700"
                >
                    Reset
                </button>
            </div>
        </div>
        <div class="mb-4 border-b pb-4 grid grid-cols-2 gap-4">
            @foreach ($card->files as $file)
                <img
                    src="{{ asset('storage/' . $file->path) }}"
                    alt="File Image"
                    class="rounded-lg w-full h-auto object-cover"
                />
            @endforeach
        </div>
        <div class="flex justify-between items-center mt-6">
            <form method="POST" action="/card/delete/{{ $card->id }}">
                @csrf
                @method('delete')
                <button
                    type="submit"
                    class="flex items-center text-red-500 hover:text-red-700"
                >
                    <i class="fa-solid fa-trash mr-2"></i>
                    Delete Card
                </button>
            </form>
            <a
                href="/card/edit/{{ $card->id }}"
                class="flex items-center text-blue-500 hover:text-blue-700"
            >
                <i class="fa-solid fa-pencil mr-2"></i>
                Edit Card
            </a>
        </div>
    </div>
</x-layout>
