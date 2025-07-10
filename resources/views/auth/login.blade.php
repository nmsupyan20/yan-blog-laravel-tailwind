<x-auth.auth>
    <x-slot:titlePage> {{ $titlePage }} </x-slot:titlePage>
    <div class="h-screen flex justify-center items-center">
        <div class="card bg-white w-[23rem] rounded-lg p-5 shadow-md">
            <h1 class="text-center text-2xl font-bold mb-4 text-purple-800">Login</h1>
            <hr class="text-gray-200 mb-4">
            <form action="{{ route('login.authenticate') }}" method="post">
                @csrf

                @session('success')
                    <div class="bg-green-200 w-full p-3 rounded-lg">
                        <span class="text-green-700 text-sm"> {{ session('success') }} </span>
                    </div>
                @endsession

                @session('failed')
                    <div class="bg-red-200 w-full p-3 rounded-lg">
                        <span class="text-red-700 text-sm"> {{ session('failed') }} </span>
                    </div>
                @endsession

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
                <hr class="text-gray-200 mb-4">
                <div class="flex flex-col gap-y-1">
                    <button type="submit" name="btn-submit"
                        class="w-full bg-purple-800 text-yellow-400 rounded-lg px-4 py-2 hover:bg-purple-950 active:bg-yellow-400 active:text-purple-800 transition-all duration-300 shadow-md">Login</button>
                    <a href="/register" class="text-center text-sky-600 hover:text-sky-700 text-sm">Belum punya akun?
                        ayo daftar
                        sekarang</a>
                </div>
            </form>
        </div>
    </div>
</x-auth.auth>