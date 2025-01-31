<x-layout>
    <div
        class="min-h-screen flex flex-col items-center justify-center py-6 px-4 sm:px-6 md:px-8 bg-gray-50 dark:bg-gray-900">
        <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg">
            <div class="p-6 sm:p-8 lg:p-10 rounded-2xl bg-white dark:bg-gray-800 shadow-lg">
                <h2 class="text-gray-900 dark:text-gray-100 text-center text-2xl font-bold sm:text-3xl lg:text-4xl mb-6">
                    Sign in</h2>
                <form class="space-y-6" method="post" action="/users/login">
                    @csrf
                    <div>
                        <label class="text-gray-700 dark:text-gray-300 text-sm sm:text-base mb-2 block font-medium">Email
                            or Username</label>
                        <div class="relative flex items-center">
                            <input name="login" type="text" required
                                   class="w-full text-gray-900 dark:text-gray-200 text-sm sm:text-base border border-gray-200 dark:border-gray-600 px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white dark:bg-gray-700"
                                   placeholder="Enter Email or Username" value="{{old('login')}}"/>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#6b7280" stroke="#6b7280"
                                 class="w-4 h-4 absolute right-4 dark:fill-gray-400 dark:stroke-gray-400"
                                 viewBox="0 0 24 24">
                                <circle cx="10" cy="7" r="6"></circle>
                                <path
                                    d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"></path>
                            </svg>
                        </div>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-300 text-sm sm:text-base mb-2 block font-medium">Password</label>
                        <div class="relative flex items-center" x-data="{show : false}">
                            <input name="password" :type="show ?'text' : 'password'" required
                                   class="w-full text-gray-900 dark:text-gray-200 text-sm sm:text-base border border-gray-200 dark:border-gray-600 px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white dark:bg-gray-700"
                                   placeholder="Enter password" value="{{old('password')}}"/>
                            <svg @click="show = !show"
                                 xmlns="http://www.w3.org/2000/svg" fill="#6b7280" stroke="#6b7280"
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

                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember" type="checkbox"
                                   class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                   value="{{old('remember-me')}}"/>
                            <label for="remember-me"
                                   class="ml-3 block text-sm sm:text-base text-gray-700 dark:text-gray-300">
                                Remember me
                            </label>
                        </div>
                        <div class="text-sm sm:text-base">
                            <a href="/forgot-password"
                               class="text-blue-600 dark:text-blue-400 hover:underline font-semibold">
                                Forgot your password?
                            </a>
                        </div>
                    </div>

                    <div class="!mt-8">
                        <button type="submit"
                                class="w-full py-3 px-4 text-sm sm:text-base tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
                            Sign in
                        </button>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 text-sm sm:text-base !mt-8 text-center">Don't have an
                        account? <a
                            href="/register"
                            class="text-blue-600 dark:text-blue-400 hover:underline ml-1 whitespace-nowrap font-semibold">Register
                            here</a></p>
                </form>
                <div class="mt-8">
                    <div class="flex items-center">
                        <div class="flex-grow border-t border-gray-200 dark:border-gray-600"></div>
                        <p class="text-center text-gray-500 dark:text-gray-400 text-sm sm:text-base mx-3">Or login
                            with</p>
                        <div class="flex-grow border-t border-gray-200 dark:border-gray-600"></div>
                    </div>
                    <div class="flex justify-center mt-6 gap-4">
                        <a href="/login/google"
                           class="w-1/3 py-2 flex items-center justify-center text-sm sm:text-base rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
                            <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google"
                                 class="w-5 h-5 mr-2"/>
                            Google
                        </a>
                        <a href="/login/github"
                           class="w-1/3 py-2 flex items-center justify-center text-sm sm:text-base rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
                            <img src="https://www.svgrepo.com/show/512317/github-142.svg" alt="GitHub"
                                 class="w-5 h-5 mr-2"/>
                            GitHub
                        </a>
                        <a href="/login/apple"
                           class="w-1/3 py-2 flex items-center justify-center text-sm sm:text-base rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
                            <img src="https://www.svgrepo.com/show/508761/apple.svg" alt="Apple" class="w-5 h-5 mr-2"/>
                            Apple
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
