<x-layout>
    <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4 sm:px-6 md:px-8">
        <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg">
            <div class="p-6 sm:p-8 lg:p-10 rounded-2xl bg-white shadow-md">
                <h2 class="text-gray-800 text-center text-2xl font-bold sm:text-3xl lg:text-4xl">Sign up</h2>
                <form class="mt-6 sm:mt-8 space-y-4" method="post" action="/users/register">
                    @csrf

                    <div>
                        <label class="text-gray-800 text-sm sm:text-base mb-2 block">Username</label>
                        <div class="relative flex items-center">
                            <input name="username" type="text" required
                                   class="w-full text-gray-800 text-sm sm:text-base border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                   placeholder="Enter Username" value="{{old('username')}}"/>
                        </div>
                        @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-800 text-sm sm:text-base mb-2 block">Email</label>
                        <div class="relative flex items-center">
                            <input name="email" type="text" required
                                   class="w-full text-gray-800 text-sm sm:text-base border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                   placeholder="Enter Email" value="{{old('email')}}"/>
                        </div>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-800 text-sm sm:text-base mb-2 block">Password</label>
                        <div class="relative flex items-center">
                            <input name="password" type="password" required
                                   class="w-full text-gray-800 text-sm sm:text-base border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                   placeholder="Enter password" value="{{old('password')}}"/>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                 class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                                <path
                                    d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"></path>
                            </svg>
                        </div>
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-800 text-sm sm:text-base mb-2 block">Confirm Password</label>
                        <div class="relative flex items-center">
                            <input name="password_confirmation" type="password" required
                                   class="w-full text-gray-800 text-sm sm:text-base border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                   placeholder="Enter password" value="{{old('password_confirmation')}}"/>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                 class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                                <path
                                    d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"></path>
                            </svg>
                        </div>
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                               class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"/>
                        <label for="remember-me" class="text-gray-800 ml-3 block text-sm">
                            I accept the <a href="javascript:void(0);"
                                            class="text-cyan-400 font-semibold hover:underline ml-1">Terms and
                                Conditions</a>
                        </label>
                    </div>


                    <div class="!mt-8">
                        <button type="submit"
                                class="w-full py-3 px-4 text-sm tracking-wider font-semibold rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                            Create an account
                        </button>
                    </div>
                    <p class="text-gray-800 text-sm mt-6 text-center">Already have an account? <a href="/login"
                                                                                                  class="text-cyan-400 font-semibold hover:underline ml-1">Login
                            here</a></p>
                </form>
            </div>
        </div>
    </div>
</x-layout>
