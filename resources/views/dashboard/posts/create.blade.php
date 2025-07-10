<x-dashboard.dashboard>
    <x-slot:titlePage> {{ $titlePage }} </x-slot:titlePage>
    <div class="bg-white w-full mx-auto p-7 rounded-lg">
        <form action="{{ route('posts') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                {{-- Grid Kiri --}}
                <div>
                    {{-- Judul Postingan --}}
                    <div class="flex flex-col gap-y-2 mb-4">
                        <label for="title">Judul : </label>
                        <input type="text" name="title" id="title" placeholder="Masukkan judul postinganmu" class="bg-purple-50 h-[2.3rem] w-full p-2 rounded-lg border-gray-200 border border-solid shadow-md  @error('title') border-red-400
                        @enderror">
                        @error('title')
                            <small class="text-red-400"> {{ $message }} </small>
                        @enderror
                    </div>

                    {{-- Kategori Postingan --}}
                    <div class="flex flex-col gap-y-2 mb-4">
                        <label for="category">Kategory : </label>
                        <div class="bg-purple-50 rounded-lg p-2">
                            <select name="category_id" id="category" class="w-full">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Gambar Postingan --}}
                    <div class="flex flex-col gap-y-2 mb-4">
                        <span>Gambar : </span>
                        <div class="flex items-stretch rounded-lg overflow-hidden border border-gray-200 shadow-sm">
                            <label for="image"
                                class="bg-purple-700 text-white py-2 px-4 rounded-l-lg cursor-pointer hover:bg-purple-800 transition duration-150 ease-in-out flex-shrink-0 text-center flex items-center justify-center">
                                Pilih File
                            </label>
                            <input type="file" name="image" id="image" hidden>
                            <div id="file-name-display"
                                class="flex-grow bg-purple-50 text-gray-500 text-sm px-4 py-2 flex items-center overflow-hidden whitespace-nowrap truncate">
                                Input file anda
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Akhir dari grid kiri --}}

                {{-- Grid Kanan --}}
                <div class="flex flex-col gap-y-2">
                    <label for="content">Postingan : </label>
                    <textarea name="content" id="content" class="summernote"></textarea>
                </div>
                {{-- Akhir dari grid kanan --}}
            </div>

            <hr class="text-gray-200 mb-4">

            {{-- Save button dan back button --}}
            <div class="mt-2 flex gap-2 justify-center">
                {{-- Save button --}}
                <button type="submit"
                    class="bg-purple-800 text-yellow-400 rounded-lg px-4 py-2 flex items-center gap-1 hover:bg-purple-900 hover:text-yellow-500 active:bg-yellow-400 active:text-purple-800 transition-all duration-300">
                    <span>Save</span>
                    <i data-feather="save" class="size-[1.2rem]"></i>
                </button>

                {{-- Back button --}}
                <a href="/users"
                    class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 hover:text-gray-100 active:bg-gray-700">
                    Back
                </a>
            </div>
        </form>
    </div>
</x-dashboard.dashboard>