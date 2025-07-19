<x-dashboard.dashboard>
    <x-slot:titlePage> {{ $titlePage }} </x-slot:titlePage>

    @session('success')
        <div class="bg-green-200 p-3 w-full text-green-700 mb-4 flex items-center justify-between" id="alert">
            <span> {{ session('success') }} </span>
            <i data-feather="x" id="alertCancelButton" onclick="showHideAlert()"></i>
        </div>
    @endsession

    @session('failed')
        <div class="bg-red-200 p-3 w-full text-red-700 mb-4 flex items-center justify-between" id="alert">
            <span> {{ session('failed') }} </span>
            <i data-feather="x" id="alertCancelButton" onclick="showHideAlert()"></i>
        </div>
    @endsession

    <div class="add-button-wrapper flex justify-end">
        <a href="/categories/create"
            class="bg-purple-900 text-yellow-400 rounded-lg flex items-center py-2 px-4 gap-2 w-fit hover:bg-yellow-400 hover:text-purple-900 shadow-md">
            <span>Tambah</span>
            <i data-feather="plus" class="size-[1.2rem]"></i>
        </a>
    </div>

    <div class="table-wrapper overflow-x-auto mt-4 shadow-md rounded-lg">
        @php
            $titleTables = ["No.", "Name", "Created By", "Action"]    
        @endphp

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-md text-left rtl:text-right text-black">
                {{-- Head Table --}}
                <thead class="text-sm sm:text-md text-yellow-400 uppercase bg-purple-800">
                    <tr>
                        @foreach ($titleTables as $titleTable)
                            <th scope="col" class="px-6 py-3">
                                {{ $titleTable }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                {{-- Akhir dari head table --}}

                {{-- Body Table --}}
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr class="bg-white border-b border-gray-200 hover:bg-purple-100">
                            <td class="px-6 py-4">
                                {{ $categories->firstItem() + $key }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $category->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $category->user->name }}
                            </td>

                            {{-- Tombol aksi edit dan delete --}}
                            <td class="px-6 py-4 text-right flex items-center gap-1">
                                {{-- Tombol edit --}}
                                <a href="/categories/{{ $category->id }}/edit"
                                    class="text-black bg-yellow-400 hover:bg-yellow-300 rounded-lg text-sm px-5 py-2.5">
                                    <i data-feather="edit" class="size-[1rem]"></i>
                                </a>
                                {{-- Tombol delete --}}
                                <form class="inline" method="post" action="/categories/{{ $category->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-500 hover:bg-red-600 rounded-lg text-sm w-full sm:w-auto px-5 py-2.5"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus kategori ini?')">
                                        <i data-feather="trash" class="size-[1rem]"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                {{-- Akhir dari body table --}}
            </table>
        </div>

        {{ $categories->links() }}
    </div>
</x-dashboard.dashboard>