<x-dashboard.dashboard>
    <x-slot:titlePage> {{ $titlePage }} </x-slot:titlePage>

    <div class="w-full lg:w-2/3 mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow-sm">

        <form action="/settings/update-profile" method="post">
            @csrf
            @method('PUT')
            {{-- Field Name --}}
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name : </label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    required />
            </div>
            {{-- Field email --}}
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email : </label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    required />
            </div>
            {{-- Field username --}}
            <div class="mb-5">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username : </label>
                <input type="email" id="username" name="username" value="{{ old('username', $user->username) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    required />
            </div>
            {{-- Button submit dan back --}}
            <div class="flex items-center justify-center gap-1">
                <a href="/settings"
                    class="py-2 px-3 rounded-lg shadow-md bg-gray-400 text-white hover:bg-gray-500 flex items-center text-sm sm:text-base">
                    <i data-feather="arrow-left" class="size-[1rem]"></i>
                    <span>Back</span>
                </a>
                <button type="submit"
                    class="text-yellow-400 bg-purple-800 hover:bg-yellow-400 hover:text-purple-800 hover:ring hover:ring-purple-800 rounded-lg text-sm sm:text-base px-3 py-2 flex items-center">
                    <i data-feather="edit" class="size-[1rem]"></i>
                    <span>Update</span>
                </button>
            </div>

        </form>

    </div>

</x-dashboard.dashboard>