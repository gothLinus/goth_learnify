<x-layout>
    <div
        class="min-h-screen flex flex-col items-center justify-center py-6 px-4 sm:px-6 md:px-8"
        x-data="filePreview()"
    >
        <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg">
            <div class="p-6 sm:p-8 lg:p-10 rounded-2xl bg-white shadow-md">
                <h2
                    class="text-gray-800 text-center text-2xl font-bold sm:text-3xl lg:text-4xl"
                >
                    Create Card
                </h2>
                <form
                    class="mt-6 sm:mt-8 space-y-4"
                    method="POST"
                    action="{{ route('card.store') }}"
                    enctype="multipart/form-data"
                >
                    @csrf

                    @include(
                        'collection.select',
                        [
                            'collections' => $collections,
                            'selected_id' => null,
                        ]
                    )

                    <div>
                        <label
                            for="title"
                            class="text-gray-800 text-sm sm:text-base mb-2 block"
                        >
                            Title
                        </label>
                        <div class="relative flex items-center">
                            <input
                                name="title"
                                type="text"
                                required
                                class="w-full text-gray-800 text-sm sm:text-base border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="Enter Card Title"
                                value="{{ old('title') }}"
                            />
                        </div>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label
                            for="description"
                            class="text-gray-800 text-sm sm:text-base mb-2 block"
                        >
                            Description
                        </label>
                        <div class="relative flex items-center">
                            <textarea
                                name="description"
                                rows="4"
                                required
                                class="w-full text-gray-800 text-sm sm:text-base border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="Enter Card Description"
                            >
{{ old('description') }}</textarea
                            >
                        </div>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label
                            class="text-gray-800 text-sm sm:text-base mb-2 block"
                            for="multiple_files"
                        >
                            Upload files
                        </label>
                        <div class="relative flex items-center">
                            <input
                                class="w-full text-gray-800 text-sm sm:text-base border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                name="multiple_files[]"
                                type="file"
                                accept="jpg,jpeg,png,pdf,docx,doc"
                                multiple
                                id="file-input"
                                x-ref="fileInput"
                                @change="previewFiles()"
                            />
                        </div>
                        @error('multiple_files')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div id="file-preview" class="mt-4">
                        <template
                            x-for="(file, index) in files"
                            :key="index"
                        >
                            <div class="file-preview-item mt-2 relative">
                                <template
                                    x-if="file.type.startsWith('image/')"
                                >
                                    <img
                                        :src="file.preview"
                                        :alt="file.name"
                                        class="w-20 h-20 object-cover rounded-md"
                                    />
                                </template>
                                <template
                                    x-if="! file.type.startsWith('image/')"
                                >
                                    <p
                                        x-text="file.name"
                                        class="text-gray-800"
                                    ></p>
                                </template>
                                <button
                                    @click="removeFile(index)"
                                    type="button"
                                    class="absolute top-0 right-0 text-red-500 text-lg"
                                >
                                    &times;
                                </button>
                            </div>
                        </template>
                    </div>

                    <div>
                        <label
                            for="time"
                            class="text-gray-800 text-sm sm:text-base mb-2 block"
                        >
                            Select time:
                        </label>
                        <div class="relative flex items-center">
                            <input
                                type="time"
                                name="time"
                                class="w-full text-gray-800 text-sm sm:text-base border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                min="00:00"
                                max="23:59"
                                value="{{ old('time') }}"
                                required
                            />
                        </div>
                        @error('time')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="!mt-6 sm:!mt-8">
                        <button
                            type="submit"
                            class="w-full py-3 px-4 text-sm sm:text-base tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none"
                        >
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
                        reader.onload = (e) => {
                            newFiles.push({
                                name: file.name,
                                type: file.type,
                                preview: e.target.result,
                                file: file,
                            });
                            this.files = [...newFiles];
                        };
                        reader.readAsDataURL(file);
                    }
                },
                removeFile(index) {
                    this.files.splice(index, 1);
                    const fileInput = this.$refs.fileInput;
                    const currentFiles = Array.from(fileInput.files);
                    currentFiles.splice(index, 1);
                    const dataTransfer = new DataTransfer();
                    currentFiles.forEach((file) =>
                        dataTransfer.items.add(file),
                    );
                    fileInput.files = dataTransfer.files;
                },
            };
        }
    </script>
</x-layout>
