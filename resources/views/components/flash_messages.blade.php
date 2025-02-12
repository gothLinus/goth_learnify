@if (session()->has('message'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => (show = false), 3000)"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 fixed top-4 left-1/2 transform -translate-x-1/2 shadow-lg z-50"
    >
        <svg class="flex-shrink-0 inline w-5 h-5 me-3 animate-bounce" aria-hidden="true"
             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div>
            <span class="font-semibold">{{ session('message') }}</span>
        </div>
        &nbsp;
        <button
            @click="show = false"
            class="ml-auto p-1 rounded-full hover:bg-blue-100 dark:hover:bg-gray-700 transition-colors duration-200"
            aria-label="Close"
        >
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif
