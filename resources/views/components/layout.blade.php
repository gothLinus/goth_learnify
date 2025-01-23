<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon"
          href="https://avatars.githubusercontent.com/u/187384192?s=400&u=7bffeecfc46ba9535f8b1f432d983ab77f173e0b&v=4"/>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: '#ef3b2d',
                    },
                },
            },
        };
    </script>
    <title>learning</title>
</head>
<body class="bg-slate-800">
@auth
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <!-- Logo Section -->
            <a wire:navigate.hover href="/" class="flex items-center space-x-3 rtl:space-x-reverse ">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-violet-600">Learnify</span>
            </a>

            <!-- Dropdown Section -->
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse"
                 x-data="{ open: false }">
                <!-- Button to toggle dropdown -->
                <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button"
                        @click="open = !open"
                        aria-expanded="false">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full"
                         src="{{ auth()->user()->profilePicture ? asset('storage/' . auth()->user()->profilePicture) : 'https://www.svgrepo.com/show/122119/user-image-with-black-background.svg' }}"
                         alt="">
                </button>

                <!-- Dropdown menu -->
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     @click.outside="open = false"
                     style="display: none;"
                     class="absolute top-16 right-0 z-50 w-48 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">{{auth()->user()->username}}</span>
                        <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{auth()->user()->email}}</span>
                    </div>
                    <ul class="py-2">
                        <li>
                            <a wire:navigate.hover href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a wire:navigate.hover href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a wire:navigate.hover href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Create
                                Card</a>
                        </li>
                        <li>
                            <a wire:navigate.hover href="#"
                               x-data
                               @click.prevent="$refs.logoutForm.submit()"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Sign out
                            </a>
                        </li>

                        <form x-ref="logoutForm" action="/users/logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>


            <!-- Responsive Navigation -->
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a wire:navigate.hover href="/"
                           class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 hover:text-violet-500 hover:underline"
                           aria-current="page">Home</a>
                    </li>
                    <li>
                        <a wire:navigate.hover href="https://github.com/gothLinus/goth_learnify"
                           class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 hover:text-violet-500 hover:underline">About</a>
                    </li>
                    <li>
                        <a wire:navigate.hover href="mailto:{{ config('contact.email') }}"
                           class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 hover:text-violet-500 hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endauth
<main>
    {{$slot}}
</main>
<x-flash_messages/>
</body>
</html>
