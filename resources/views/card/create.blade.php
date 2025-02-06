<x-layout>
    <div class="flex flex-col items-center justify-center py-6 px-4 sm:px-6 md:px-8">
        <div x-data="fileUpload()" class="w-full max-w-sm sm:max-w-md lg:max-w-lg">
            <div
                class="p-6 sm:p-8 lg:p-10 rounded-2xl bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <h2 class="text-gray-800 dark:text-white text-center text-2xl font-bold sm:text-3xl lg:text-4xl mb-6">
                    Create Card
                </h2>

                <form class="space-y-6" method="post" action="/card/create" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label class="text-gray-800 dark:text-gray-200 text-sm sm:text-base mb-2 block">Title</label>
                        <textarea name="title" required
                                  class="w-full text-gray-800 dark:text-white dark:bg-gray-700 text-sm sm:text-base border border-gray-300 dark:border-gray-600 px-4 py-3 rounded-md outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200"
                                  placeholder="Enter Card Title">{{ old('title') }}</textarea>
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label
                            class="text-gray-800 dark:text-gray-200 text-sm sm:text-base mb-2 block">Description</label>
                        <textarea name="description" rows="4" required
                                  class="w-full text-gray-800 dark:text-white dark:bg-gray-700 text-sm sm:text-base border border-gray-300 dark:border-gray-600 px-4 py-3 rounded-md outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200"
                                  placeholder="Enter Card Description">{{ old('description') }}</textarea>
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
                               x-ref="fileInput"
                               @change="addFiles">
                        @error('multiple_files')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <template x-for="(file, index) in files" :key="index">
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
                                    <button @click="removeFile(index)" type="button"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center">
                                        &times;
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div>
                        <label class="text-gray-800 dark:text-gray-200 text-sm sm:text-base mb-2 block">Select
                            Time</label>
                        <input type="time" name="time" min="00:00" max="23:59" required
                               class="w-full text-gray-800 dark:text-white dark:bg-gray-700 text-sm sm:text-base border border-gray-300 dark:border-gray-600 px-4 py-3 rounded-md outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200"
                               value="{{ old('time') }}">
                        @error('time')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="!mt-8">
                        <button type="submit"
                                class="w-full py-3 px-4 text-sm sm:text-base tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                            Create Card
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function fileUpload() {
            return {
                files: [],
                addFiles( event ) {
                    const newFiles = Array.from(event.target.files).map(file => ({
                        name: file.name,
                        preview: URL.createObjectURL(file),
                        isImage: file.type.startsWith('image/'),
                        fileObject: file
                    }));

                    newFiles.forEach(newFile => {
                        if (!this.files.some(existingFile =>
                            existingFile.name === newFile.name &&
                            existingFile.fileObject.size === newFile.fileObject.size
                        )) {
                            this.files.push(newFile);
                        }
                    });

                    this.updateFileInput();
                },
                removeFile( index ) {
                    this.files.splice(index, 1);
                    this.updateFileInput();
                },
                updateFileInput() {
                    const dataTransfer = new DataTransfer();
                    this.files.forEach(file => dataTransfer.items.add(file.fileObject));
                    this.$refs.fileInput.files = dataTransfer.files;
                }
            }
        }
    </script>
</x-layout>
