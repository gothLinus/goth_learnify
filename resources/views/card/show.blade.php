<x-layout>
    <div class=" flex items-center justify-center py-6 px-4 sm:px-6 lg:px-8">
        <div
            class="w-full max-w-2xl bg-white dark:bg-gray-800 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">

            <div class="mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $card->title }}</h2>
            </div>

            <div class="mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">
                <p class="text-gray-600 dark:text-gray-300">{{ $card->description }}</p>
            </div>

            <div class="mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">
                <div class="flex items-center space-x-4">

                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <span>{{ $card->time }}</span>
                    </p>

                    <button @click="start()"
                            class="px-3 py-1 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-200">
                        Start
                    </button>
                    <button @click="stop()"
                            class="px-3 py-1 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 transition-all duration-200">
                        Stop
                    </button>
                    <button @click="reset()"
                            class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-200">
                        Reset
                    </button>
                </div>
            </div>

            <div class="mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">
                <div class="grid grid-cols-2 gap-4">
                    @foreach($card->files as $file)
                        <img src="{{ asset('storage/' . $file->path) }}" alt="File Image"
                             class="rounded-lg w-full h-auto object-cover shadow-sm hover:shadow-md transition-shadow duration-200"/>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-between items-center mt-6">

                <form method="POST" action="/card/delete/{{ $card->id }}">
                    @csrf
                    @method('delete')
                    <button type="submit"
                            class="flex items-center text-red-500 hover:text-red-700 dark:hover:text-red-600 focus:outline-none transition-colors duration-200">
                        <i class="fa-solid fa-trash mr-2"></i> Delete Card
                    </button>
                </form>

                <a href="/card/edit/{{ $card->id }}"
                   class="flex items-center text-blue-500 hover:text-blue-700 dark:hover:text-blue-600 focus:outline-none transition-colors duration-200">
                    <i class="fa-solid fa-pencil mr-2"></i> Edit Card
                </a>
            </div>
        </div>
    </div>
</x-layout>
