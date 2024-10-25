<x-layouts.app>

    <section class="bg-secondary h-full p-10 flex-grow flex justify-center items-center">
        <article class="container max-w-7xl shadow-lg text-center flex flex-col md:flex-row">
            <img class="object-cover rounded-l-lg w-full md:w-1/2 hidden md:block" src="{{ Vite::asset('resources/img/img_register.jpg') }}" alt="Register Image">
            <form class="bg-secondary p-6 w-full md:rounded-r-lg flex flex-col items-center" method="POST" action="{{ route('register') }}">
                @csrf
                <h2 class="text-2xl font-bold mb-4 text-center">Registration Form</h2>
    
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
                    <!-- Username Field -->
                    <div class="mb-4">
                        <label for="username" class="block text-base font-bold text-gray-700 text-left">Username: </label>
                        <input type="text" id="username" name="username" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                        <div class="min-h-[1rem]">
                            @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
    
                    <!-- First Name Field -->
                    <div class="mb-4">
                        <label for="first_name" class="block text-base font-bold text-gray-700 text-left">First Name: </label>
                        <input type="text" id="first_name" name="first_name" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                        <div class="min-h-[1rem]">
                            @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
    
                    <!-- Last Name Field -->
                    <div class="mb-4">
                        <label for="last_name" class="block text-base font-bold text-gray-700 text-left">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                        <div class="min-h-[1rem]">
                            @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
    
                    <!-- Email Field -->
                    <div class="mb-4">
                        <label for="email" class="block text-base font-bold text-gray-700 text-left">Email: </label>
                        <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                        <div class="min-h-[1rem]">
                            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
    
                    <!-- Password Field -->
                    <div class="mb-4">
                        <label for="password" class="block text-base font-bold text-gray-700 text-left">Password</label>
                        <input type="password" id="password" name="password" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
    
                    <!-- Confirm Password Field -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-base font-bold text-gray-700 text-left">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                </div>
                <div class="min-h-[1rem]">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
    
                <!-- Register Button -->
                <button type="submit" class="mt-2 w-full bg-blue-600 text-white font-semibold rounded-md p-2 hover:bg-blue-700">Register</button>
            </form>
        </article>
    </section>
    
    

</x-layouts.app>