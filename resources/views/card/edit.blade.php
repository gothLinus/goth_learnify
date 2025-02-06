<x-layout>
    <div class="flex flex-col items-center justify-center py-6 px-4 sm:px-6 md:px-8">
        <div x-data="fileManager({{ $card->files->toJson() }})" class="w-full max-w-sm sm:max-w-md lg:max-w-lg">
            <div
                class="p-6 sm:p-8 lg:p-10 rounded-2xl bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <h2 class="text-gray-800 dark:text-white text-center text-2xl font-bold sm:text-3xl lg:text-4xl mb-6">
                    Edit Card
                </h2>

                <form class="space-y-6" method="post" action="/card/edit/{{ $card->id }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="text-gray-800 dark:text-gray-200 text-sm sm:text-base mb-2 block">Title</label>
                        <textarea name="title" required
                                  class="w-full text-gray-800 dark:text-white dark:bg-gray-700 text-sm sm:text-base border border-gray-300 dark:border-gray-600 px-4 py-3 rounded-md outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200"
                                  placeholder="Enter Card Title">{{ old('title', $card->title) }}</textarea>
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label
                            class="text-gray-800 dark:text-gray-200 text-sm sm:text-base mb-2 block">Description</label>
                        <textarea name="description" rows="4" required
                                  class="w-full text-gray-800 dark:text-white dark:bg-gray-700 text-sm sm:text-base border border-gray-300 dark:border-gray-600 px-4 py-3 rounded-md outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200"
                                  placeholder="Enter Card Description">{{ old('description', $card->description) }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-800 dark:text-gray-200 text-sm sm:text-base mb-2 block">Upload
                            Files</label>
                        <input type="file" name="multiple_files[]" multiple
                               accept="image/jpeg,image/png,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                               class="w-full text-gray-800 dark:text-white dark:bg-gray-700 text-sm sm:text-base border border-gray-300 dark:border-gray-600 px-4 py-3 rounded-md outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200"
                               x-ref="fileInput" @change="addNewFiles">
                        @error('multiple_files')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4 flex flex-wrap gap-2">

                        <template x-for="(file, index) in existingFiles" :key="file.id">
                            <div class="relative">
                                <div class="file-preview-item p-2 border rounded-lg dark:border-gray-600">
                                    <template x-if="file.isImage">
                                        <img :src="file.preview" class="w-20 h-20 object-cover rounded-md">
                                    </template>
                                    <template x-if="!file.isImage">
                                        <div class="p-2 bg-gray-100 dark:bg-gray-700 rounded-md">
                                            <span x-text="file.name" class="text-sm"></span>
                                        </div>
                                    </template>
                                    <button @click="removeExistingFile(index)" type="button"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center">
                                        &times;
                                    </button>
                                </div>
                            </div>
                        </template>

                        <template x-for="(file, index) in newFiles" :key="index">
                            <div class="relative">
                                <div class="file-preview-item p-2 border rounded-lg dark:border-gray-600">
                                    <template x-if="file.isImage">
                                        <img :src="file.preview" class="w-20 h-20 object-cover rounded-md">
                                    </template>
                                    <template x-if="!file.isImage">
                                        <div class="p-2 bg-gray-100 dark:bg-gray-700 rounded-md">
                                            <span x-text="file.name" class="text-sm"></span>
                                        </div>
                                    </template>
                                    <button @click="removeNewFile(index)" type="button"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center">
                                        &times;
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>

                    <input type="hidden" name="deleted_files" :value="JSON.stringify(deletedFiles)">

                    <div>
                        <label class="text-gray-800 dark:text-gray-200 text-sm sm:text-base mb-2 block">Select
                            Time</label>
                        <input type="time" name="time" min="00:00" max="23:59" required
                               class="w-full text-gray-800 dark:text-white dark:bg-gray-700 text-sm sm:text-base border border-gray-300 dark:border-gray-600 px-4 py-3 rounded-md outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200"
                               value="{{ old('time', $card->time) }}">
                        @error('time')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="hidden" id="allFiles">

                    <div class="!mt-8">
                        <button type="submit" @click="allFiles()"
                                class="w-full py-3 px-4 text-sm sm:text-base tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                            Edit Card
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function fileManager( existingFiles ) {
            return {
                existingFiles: existingFiles.map(file => ({
                    id: file.id,
                    name: file.name,
                    preview: file.is_image ? `/storage/${file.path}` : '',
                    isImage: file.is_image,
                })),
                newFiles: [],
                deletedFiles: [],

                addNewFiles( event ) {
                    const newFiles = Array.from(event.target.files).map(file => ({
                        name: file.name,
                        preview: URL.createObjectURL(file),
                        isImage: file.type.startsWith('image/'),
                        fileObject: file
                    }));

                    newFiles.forEach(newFile => {
                        if (!this.newFiles.some(existing =>
                            existing.name === newFile.name &&
                            existing.fileObject.size === newFile.fileObject.size
                        )) {
                            this.newFiles.push(newFile);
                        }
                    });

                    this.updateFileInput();
                },

                removeExistingFile( index ) {
                    const removedFile = this.existingFiles.splice(index, 1)[0];
                    this.deletedFiles.push(removedFile.id);
                },

                removeNewFile( index ) {
                    this.newFiles.splice(index, 1);
                    this.updateFileInput();
                },

                updateFileInput() {
                    const dataTransfer = new DataTransfer();
                    this.newFiles.forEach(file => dataTransfer.items.add(file.fileObject));
                    this.$refs.fileInput.files = dataTransfer.files;
                }
            }
        }
    </script>
</x-layout>
