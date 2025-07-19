<x-dashboard.dashboard>
    <x-slot:titlePage> {{ $titlePage }} </x-slot:titlePage>

    <div class="w-full lg:w-2/3 p-6 bg-white border border-gray-200 rounded-sm shadow-sm mx-auto text-sm">
        <div class="bg-white p-6 rounded-lg shadow-md border border-solid border-gray-200">
            <div class="flex items-center py-2 border-b border-gray-200">
                <div class="w-1/4 font-semibold text-gray-700">Name :</div>
                <div class="w-3/4 text-gray-900"> {{ $user->name }} </div>
            </div>

            <div class="flex items-center py-2 border-b border-gray-200">
                <div class="w-fit lg:w-1/4 font-semibold text-gray-700">Username :</div>
                <div class="w-fit lg:w-3/4 text-gray-900 pl-1 lg:pl-0"> {{ $user->username }} </div>
            </div>

            <div class="flex items-center py-2 border-b border-gray-200">
                <div class="w-fit lg:w-1/4 font-semibold text-gray-700">Email :</div>
                <div class="w-fit lg:w-3/4 text-gray-900 pl-1 lg:pl-0"> {{ $user->email }} </div>
            </div>

            <div class="flex items-center py-2 border-b border-gray-200">
                <div class="w-fit lg:w-1/4 font-semibold text-gray-700">Created At :</div>
                <div class="w-fit lg:w-3/4 text-gray-900 pl-1 lg:pl-0"> {{ $user->created_at }} </div>
            </div>

            <div class="flex items-center py-2 border-b border-gray-200">
                <div class="w-fit lg:w-1/4 font-semibold text-gray-700">Updated At :</div>
                <div class="w-fit lg:w-3/4 text-gray-900 pl-1 lg:pl-0"> {{ $user->updated_at }} </div>
            </div>

            <div class="flex items-center py-2.5">
                <div class="w-fit lg:w-1/4 font-semibold text-gray-700">Password :</div>
                <div class="w-fit lg:w-3/4 pl-1 lg:pl-0">
                    <a href="/users/{{ $user->id }}/password"
                        class="text-yellow-400 bg-purple-800 hover:bg-yellow-400 hover:text-purple-800 hover:ring focus:ring-purple-800 font-medium rounded-sm text-sm px-5 py-2.5 shadow-sm">Edit
                        Password</a>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-center gap-2 mt-4">
            <a href="/users"
                class="text-white bg-gray-400 hover:bg-gray-600 font-medium rounded-lg text-sm px-4 py-3 flex items-center">
                <i data-feather="arrow-left" class="size-[1rem]"></i>
                <span>Back</span>
            </a>
            <div class="flex items-center gap-2">
                <a href="/users/{{ $user->id }}/edit"
                    class="text-black bg-yellow-400 hover:bg-yellow-300 font-medium rounded-lg text-sm px-4 py-3 flex items-center">
                    <i data-feather="edit" class="size-[1rem]"></i>
                    <span>Edit</span>
                </a>
                <form action="/users/{{ $user->id }}" method="post" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="button"
                        class="bg-red-500 text-white hover:bg-red-600 rounded-lg px-4 py-3 text-sm flex items-center border-none"
                        onclick="return confirm('Apakah anda yakin ingin menghapus user?')">
                        <i data-feather="trash" class="size-[1rem]"></i>
                        <span>Delete</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

</x-dashboard.dashboard>