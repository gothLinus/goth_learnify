<x-layout>
    <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4 sm:px-6 md:px-8">
        <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg">
            <div class="p-6 sm:p-8 lg:p-10 rounded-2xl bg-white shadow-md">
                <h2 class="text-gray-800 text-center text-2xl font-bold sm:text-3xl lg:text-4xl">Create Card</h2>
                <form class="mt-6 sm:mt-8 space-y-4" method="post" action="/card/create">
                    @csrf
                    <div>
                        <label for="title" class="text-gray-800 text-sm sm:text-base mb-2 block">Title</label>
                        <div class="relative flex items-center">
                            <input name="title" type="text" required
                                   class="w-full text-gray-800 text-sm sm:text-base border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                   placeholder="Enter Card Title" value="{{old('title')}}"/>
                        </div>
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description"
                               class="text-gray-800 text-sm sm:text-base mb-2 block">Description</label>
                        <div class="relative flex items-center">
                            <textarea name="description" rows="4" required
                                      class="w-full text-gray-800 text-sm sm:text-base border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                      placeholder="Enter Card Description">{{old('description')}}</textarea>
                        </div>
                        @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-800 text-sm sm:text-base mb-2 block"
                               for="multiple_files">Upload files</label>
                        <div class="relative flex items-center">
                            <input
                                class="w-full text-gray-800 text-sm sm:text-base border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                name="multiple_files" type="file" multiple>
                        </div>
                        @error('multiple_files')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="timer" class="text-gray-800 text-sm sm:text-base mb-2 block">Timer</label>
                        <div class="relative flex items-center">
                            <input name="timer" type="time" required
                                   class="w-full text-gray-800 text-sm sm:text-base border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                   placeholder="Enter password" value="{{old('password')}}"/>
                        </div>
                        @error('timer')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="!mt-6 sm:!mt-8">
                        <button type="submit"
                                class="w-full py-3 px-4 text-sm sm:text-base tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                            Create Card
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
