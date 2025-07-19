<x-dashboard.dashboard>
    <x-slot:titlePage> {{ $titlePage }} </x-slot:titlePage>
    <div class="bg-white w-full mx-auto p-7 rounded-lg">
        <form action="/users/{{ $user->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <div class="flex flex-col gap-y-2">
                    <label for="name">Nama : </label>
                    <input type="text" name="name" id="name" placeholder="Input Your Name" value="{{ $user->name }}"
                        class="bg-purple-50 h-[2.3rem] w-full p-2 rounded-lg border-gray-200 border border-solid shadow-md  @error('name') border-red-400
                        @enderror">
                    @error('name')
                        <small class="text-red-400"> {{ $message }} </small>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="email">Email : </label>
                    <input type="email" name="email" id="email" placeholder="Input Your Email"
                        value="{{ $user->email }}" class="bg-purple-50 h-[2.3rem] w-full p-2 rounded-lg border-gray-200 border border-solid shadow-md  @error('email') border-red-400
                        @enderror">
                    @error('email')
                        <small class="text-red-400"> {{ $message }} </small>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="username">Username : </label>
                    <input type="text" name="username" id="username" placeholder="Input Your Username"
                        value="{{ $user->username }}" class="bg-purple-50 h-[2.3rem] w-full p-2 rounded-lg border-gray-200 border border-solid shadow-md  @error('username') border-red-400
                        @enderror">
                    @error('username')
                        <small class="text-red-400"> {{ $message }} </small>
                    @enderror
                </div>
            </div>
            <hr class="text-gray-200 mb-4">
            <div class="mt-2 flex gap-2 justify-center">
                <button type="submit"
                    class="bg-purple-800 text-yellow-400 rounded-lg px-4 py-2 flex items-center gap-1 hover:bg-purple-900 hover:text-yellow-500 active:bg-yellow-400 active:text-purple-800 transition-all duration-300">
                    <span>Update</span>
                    <i data-feather="edit" class="size-[1.2rem]"></i>
                </button>
                <a href="/users"
                    class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 hover:text-gray-100 active:bg-gray-700">
                    Back
                </a>
            </div>
        </form>
    </div>
</x-dashboard.dashboard>