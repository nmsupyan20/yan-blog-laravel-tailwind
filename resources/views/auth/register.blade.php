<x-auth.auth>
    <x-slot:titlePage> {{ $titlePage }} </x-slot:titlePage>
    <div class="h-screen flex justify-center items-center">
        <div class="card bg-white w-[23rem] rounded-lg p-5 shadow-md">
            <h1 class="text-center text-2xl font-bold mb-4 text-purple-800">Register Form</h1>
            <hr class="text-gray-200 mb-4">
            <form action="{{ route('register.store') }}" method="post">
                @csrf
                <div class="mb-2 flex flex-col gap-y-2">
                    <label for="name">Nama : </label>
                    <input type="text" name="name" id="name" placeholder="Enter the name" value="{{ old('name') }}"
                        class="rounded-lg border-solid border border-gray-200 h-[2.2rem] p-3 shadow-md @error('name') border-red-400
                        @enderror">
                    @error('name')
                        <small class="text-red-400"> {{ $message }} </small>
                    @enderror
                </div>
                <div class="mb-2 flex flex-col gap-y-2">
                    <label for="email">Email : </label>
                    <input type="email" name="email" id="email" placeholder="Enter the email" value="{{ old('email') }}"
                        class="rounded-lg border-solid border border-gray-200 h-[2.2rem] p-3 shadow-md @error('email') border-red-400
                        @enderror">
                    @error('email')
                        <small class="text-red-400"> {{ $message }} </small>
                    @enderror
                </div>
                <div class="mb-2 flex flex-col gap-y-2">
                    <label for="username">Username : </label>
                    <input type="text" name="username" id="username" placeholder="Enter the username"
                        value="{{ old('username') }}" class="rounded-lg border-solid border border-gray-200 h-[2.2rem] p-3 shadow-md @error('username') border-red-400
                        @enderror">
                    @error('username')
                        <small class="text-red-400"> {{ $message }} </small>
                    @enderror
                </div>
                <div class="mb-4 flex flex-col gap-y-2">
                    <label for="password">Password : </label>
                    <input type="password" name="password" id="password" placeholder="Enter the password" class="rounded-lg border-solid border border-gray-200 h-[2.2rem] p-3 shadow-md @error('password') border-red-400
                    @enderror">
                    @error('password')
                        <small class="text-red-400"> {{ $message }} </small>
                    @enderror
                </div>
                <div class="mb-2 flex flex-col gap-y-2">
                    <label for="confirmPassword">Confirm Password : </label>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Enter to password"
                        class="rounded-lg border-solid border border-gray-200 h-[2.2rem] p-3 shadow-md @error('confirmPassword') border-red-400
                        @enderror">
                    @error('confirmPassword')
                        <small class="text-red-400"> {{ $message }} </small>
                    @enderror
                </div>
                <hr class="text-gray-200 mb-4">
                <div class="flex flex-col gap-y-2">
                    <button type="submit" name="btn-submit"
                        class="w-full bg-purple-800 text-yellow-400 rounded-lg px-4 py-2 hover:bg-purple-950 active:bg-yellow-400 active:text-purple-800 transition-all duration-300 shadow-md">Register</button>
                    <a href="/login"
                        class="w-full bg-gray-400 text-white rounded-lg px-4 py-2 text-center hover:bg-gray-500 hover:text-gray-100 active:bg-gray-700 shadow-md">Back
                        to
                        login</a>
                </div>
            </form>
        </div>
    </div>
</x-auth.auth>