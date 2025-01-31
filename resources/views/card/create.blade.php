<x-layout>
    <div
        class="flex flex-col items-center justify-center py-6 px-4 sm:px-6 md:px-8">
        <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg">

            <div
                class="p-6 sm:p-8 lg:p-10 rounded-2xl bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl transition-shadow duration-300">

                <h2 class="text-gray-800 dark:text-white text-center text-2xl font-bold sm:text-3xl lg:text-4xl mb-6">
                    Create Card
                </h2>

                <form class="space-y-6" method="post" action="/card/create" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label for="title" class="text-gray-800 dark:text-gray-200 text-sm sm:text-base mb-2 block">
                            Title
                        </label>
                        <input name="title" type="text" required
                               class="w-full text-gray-800 dark:text-white dark:bg-gray-700 text-sm sm:text-base border border-gray-300 dark:border-gray-600 px-4 py-3 rounded-md outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200"
                               placeholder="Enter Card Title" value="{{ old('title') }}"/>
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description"
                               class="text-gray-800 dark:text-gray-200 text-sm sm:text-base mb-2 block">
                            Description
                        </label>
                        <textarea name="description" rows="4" required
                                  class="w-full text-gray-800 dark:text-white dark:bg-gray-700 text-sm sm:text-base border border-gray-300 dark:border-gray-600 px-4 py-3 rounded-md outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200"
                                  placeholder="Enter Card Description">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-800 dark:text-gray-200 text-sm sm:text-base mb-2 block"
                               for="multiple_files">
                            Upload Files
                        </label>
                        <input
                            class="w-full text-gray-800 dark:text-white dark:bg-gray-700 text-sm sm:text-base border border-gray-300 dark:border-gray-600 px-4 py-3 rounded-md outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200"
                            name="multiple_files[]" type="file" accept="jpg,jpeg,png,pdf,docx,doc" multiple
                            id="file-input" x-ref="fileInput" @change="previewFiles()">
                        @error('multiple_files')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div id="file-preview" class="mt-4">
                        <template x-for="(file, index) in files" :key="index">
                            <div class="file-preview-item mt-2 relative">
                                <template x-if="file.type.startsWith('image/')">
                                    <img :src="file.preview" :alt="file.name"
                                         class="w-20 h-20 object-cover rounded-md shadow-sm">
                                </template>
                                <template x-if="!file.type.startsWith('image/')">
                                    <p x-text="file.name" class="text-gray-800 dark:text-gray-200"></p>
                                </template>
                                <button @click="removeFile(index)" type="button"
                                        class="absolute top-0 right-0 text-red-500 hover:text-red-600 text-lg">
                                    &times;
                                </button>
                            </div>
                        </template>
                    </div>

                    <div>
                        <label for="time" class="text-gray-800 dark:text-gray-200 text-sm sm:text-base mb-2 block">
                            Select Time
                        </label>
                        <input type="time" name="time"
                               class="w-full text-gray-800 dark:text-white dark:bg-gray-700 text-sm sm:text-base border border-gray-300 dark:border-gray-600 px-4 py-3 rounded-md outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200"
                               min="00:00" max="23:59" value="{{ old('time') }}" required/>
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
        function filePreview() {
            return {
                files: [],
                previewFiles() {
                    const fileInput = this.$refs.fileInput;
                    const selectedFiles = fileInput.files;
                    const newFiles = [];
                    for (let file of selectedFiles) {
                        const reader = new FileReader();
                        reader.onload = ( e ) => {
                            newFiles.push({
                                name: file.name,
                                type: file.type,
                                preview: e.target.result,
                                file: file
                            });
                            this.files = [...newFiles];
                        };
                        reader.readAsDataURL(file);
                    }
                },
                removeFile( index ) {
                    this.files.splice(index, 1);
                    const fileInput = this.$refs.fileInput;
                    const currentFiles = Array.from(fileInput.files);
                    currentFiles.splice(index, 1);
                    const dataTransfer = new DataTransfer();
                    currentFiles.forEach(file => dataTransfer.items.add(file));
                    fileInput.files = dataTransfer.files;
                }
            }
        }
    </script>
</x-layout>
