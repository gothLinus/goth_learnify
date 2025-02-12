<x-layout>
    <div
        class="min-h-screen flex flex-col items-center justify-center py-6 px-4 sm:px-6 md:px-8 bg-gray-50 dark:bg-gray-900">
        <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg">
            <div class="p-6 sm:p-8 lg:p-10 rounded-2xl bg-white dark:bg-gray-800 shadow-lg">
                <h2 class="text-gray-900 dark:text-gray-100 text-center text-2xl font-bold sm:text-3xl lg:text-4xl mb-6">
                    Sign up</h2>
                <form class="space-y-6" method="post" action="/users/register">
                    @csrf

                    <div>
                        <label class="text-gray-700 dark:text-gray-300 text-sm sm:text-base mb-2 block font-medium">Username</label>
                        <div class="relative flex items-center">
                            <input name="username" type="text" required
                                   class="w-full text-gray-900 dark:text-gray-200 text-sm sm:text-base border border-gray-200 dark:border-gray-600 px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white dark:bg-gray-700"
                                   placeholder="Enter Username" value="{{old('username')}}"/>
                        </div>
                        @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-300 text-sm sm:text-base mb-2 block font-medium">Email</label>
                        <div class="relative flex items-center">
                            <input name="email" type="text" required
                                   class="w-full text-gray-900 dark:text-gray-200 text-sm sm:text-base border border-gray-200 dark:border-gray-600 px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white dark:bg-gray-700"
                                   placeholder="Enter Email" value="{{old('email')}}"/>
                        </div>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-300 text-sm sm:text-base mb-2 block font-medium">Password</label>
                        <div class="relative flex items-center" x-data="{show : false}">
                            <input name="password" :type="show ? 'text' : 'password'" required
                                   class="w-full text-gray-900 dark:text-gray-200 text-sm sm:text-base border border-gray-200 dark:border-gray-600 px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white dark:bg-gray-700"
                                   placeholder="Enter password" value="{{old('password')}}"/>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#6b7280" stroke="#6b7280"
                                 @click="show = !show"
                                 class="w-4 h-4 absolute right-4 cursor-pointer dark:fill-gray-400 dark:stroke-gray-400"
                                 viewBox="0 0 128 128">
                                <path
                                    d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"></path>
                            </svg>
                        </div>
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-300 text-sm sm:text-base mb-2 block font-medium">Confirm
                            Password</label>
                        <div class="relative flex items-center" x-data="{show : false}">
                            <input name="password_confirmation" :type="show ? 'text' : 'password'" required
                                   class="w-full text-gray-900 dark:text-gray-200 text-sm sm:text-base border border-gray-200 dark:border-gray-600 px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white dark:bg-gray-700"
                                   placeholder="Confirm password" value="{{old('password_confirmation')}}"/>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#6b7280" stroke="#6b7280"
                                 @click="show = !show"
                                 class="w-4 h-4 absolute right-4 cursor-pointer dark:fill-gray-400 dark:stroke-gray-400"
                                 viewBox="0 0 128 128">
                                <path
                                    d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"></path>
                            </svg>
                        </div>
                        @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox"
                               class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"/>
                        <label for="terms" class="text-gray-700 dark:text-gray-300 ml-3 block text-sm">
                            I accept the <a href="#"
                                            class="text-blue-600 dark:text-blue-400 font-semibold hover:underline ml-1">Terms
                                and Conditions</a>
                        </label>
                    </div>

                    <div class="!mt-8">
                        <button type="submit"
                                class="w-full py-3 px-4 text-sm sm:text-base tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
                            Create an account
                        </button>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 text-sm sm:text-base !mt-8 text-center">Already have an
                        account? <a href="{{ route('login') }}"
                                    class="text-blue-600 dark:text-blue-400 font-semibold hover:underline ml-1">Login
                            here</a></p>
                </form>
            </div>
        </div>
    </div>
</x-layout>
