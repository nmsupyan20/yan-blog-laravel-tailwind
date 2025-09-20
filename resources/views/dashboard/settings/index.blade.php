<x-dashboard.dashboard>
    <x-slot:titlePage> {{ $titlePage }} </x-slot:titlePage>


    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm">

        <div class="flex items-center justify-end gap-1 border-b border-solid border-gray-300 pb-2">
            <a href="/categories"
                class="py-2 px-3 rounded-lg shadown-md bg-gray-400 text-white hover:bg-gray-500 flex items-center text-sm sm:text-base">
                <i data-feather="arrow-left" class="size-[1rem]"></i>
                <span>Back</span>
            </a>

            <a href="/settings/profile"
                class="py-2 px-3 rounded-lg shadown-md bg-yellow-400 text-black hover:bg-yellow-300 flex items-center text-sm sm:text-base">
                <i data-feather="edit" class="size-[1rem]"></i>
                <span>Edit</span>
            </a>

            <form action="/logout" method="post">
                @csrf
                <button type="button"
                    class="flex items-center bg-purple-400 text-black hover:bg-purple-500 px-3 py-2 rounded-lg shadow-md"
                    onclick="return confirm('Apakah anda yakin ingin logout?')">
                    <i data-feather="log-out" class="size-[1rem]"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>



        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                            Nama:
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                            Email:
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                            Username:
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->username }}
                        </td>
                    </tr>
                    <tr class="bg-white">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                            Password:
                        </th>
                        <td class="px-6 py-4">
                            <div class="flex">
                                <a href="/settings/password"
                                    class="px-3 py-2 rounded-lg bg-purple-800 text-yellow-400 hover:bg-yellow-400 hover:ring hover:ring-purple-800 hover:text-purple-800 flex items-center">
                                    <i data-feather="lock" class="size-[1rem]"></i>
                                    <span>Edit Password</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</x-dashboard.dashboard>