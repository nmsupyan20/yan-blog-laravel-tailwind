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
        <a href="/posts/create"
            class="bg-purple-900 text-yellow-400 rounded-lg flex items-center py-2 px-4 gap-2 w-fit hover:bg-yellow-400 hover:text-purple-900 shadow-md">
            <span>Tambah</span>
            <i data-feather="plus" class="size-[1.2rem]"></i>
        </a>
    </div>

    <div class="table-wrapper overflow-x-auto mt-4 shadow-md">
        @php
            $titleTables = ["No.", "title", "Author", "Category", "Created_at", "Updated_at", "Action"]    
        @endphp

        <table class="w-full border-solid border border-purple-100">
            <tr>
                @foreach ($titleTables as $titleTable)
                    <th class="border-solid border border-gray-100 p-2 bg-purple-900 text-yellow-400">
                        {{ $titleTable }}
                    </th>
                @endforeach
            </tr>

            @foreach ($posts as $key => $post)
                <tr class="bg-white text-center border-b border-gray-100 border-solid shadow-sm">
                    <td class="p-3"> {{ $posts->firstItem() + $key }}. </td>
                    <td class="p-3"> {{ $post->title }} </td>
                    <td class="p-3"> {{ $post->user->name }} </td>
                    <td class="p-3"> {{ $post->category->name }} </td>
                    <td class="p-3"> {{ $post->created_at }} </td>
                    <td class="p-3"> {{ $post->updated_at }} </td>
                    <td class="p-3">
                        <a href="/posts/{{ $post->id }}" class="bg-purple-800 text-yellow-400 py-2 px-3 rounded-lg">Show</a>
                        <a href="/posts/{{ $post->id }}/edit" class="bg-yellow-400 text-black py-2 px-3 rounded-lg">Edit</a>
                        <form action="/categories/{{ $post->id }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-2 px-3 rounded-lg" name="delete"
                                onclick="return confirm('Anda yakin mau menghapus kategori ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
</x-dashboard.dashboard>