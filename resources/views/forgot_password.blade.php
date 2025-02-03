<x-layout>
    <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4 sm:px-6 md:px-8">
        <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg">
            <div class="p-6 sm:p-8 lg:p-10 rounded-2xl bg-white shadow-md">
                <h2 class="text-gray-800 text-center text-2xl font-bold sm:text-3xl lg:text-4xl">
                    Change Password
                </h2>
                <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="/">
                    @csrf
                    <div>
                        <label class="text-gray-800 text-sm sm:text-base mb-2 block">Email or Username</label>
                        <div class="relative flex items-center">
                            <input name="email" type="text" required
                                   class="w-full text-gray-800 text-sm sm:text-base border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                   placeholder="Enter Username" value="{{old('username')}}"/>
                        </div>
                        @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
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
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="newsletter" aria-describedby="newsletter" type="checkbox"
                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                   required="">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="newsletter" class="font-light text-gray-500 dark:text-gray-300">I accept the <a
                                    class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Terms
                                    and Conditions</a></label>
                        </div>
                    </div>
                    <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Reset passwod
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
