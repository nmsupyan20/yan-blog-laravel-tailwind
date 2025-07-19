<x-dashboard.dashboard>
    <x-slot:titlePage> {{ $titlePage }} </x-slot:titlePage>
    <div class="bg-white w-full mx-auto p-7 rounded-lg">
        <form action="/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
                {{-- Grid Kiri --}}
                <div>
                    {{-- Judul Postingan --}}
                    <div class="flex flex-col gap-y-2 mb-4">
                        <label for="title">Judul : </label>
                        <input type="text" name="title" id="title" placeholder="Masukkan judul postinganmu"
                            value="{{ old('title', $post->title) }}" class="bg-purple-50 h-[2.3rem] w-full p-2 rounded-lg border-gray-200 border border-solid shadow-md  @error('title') border-red-400
                            @enderror">
                        @error('title')
                            <small class="text-red-400"> {{ $message }} </small>
                        @enderror
                    </div>

                    {{-- Kategori Postingan --}}
                    <div class="flex flex-col gap-y-2 mb-4">
                        <label for="category">Kategory : </label>
                        <select name="category_id" id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ ($post->category->name) == ($category->name) ? 'selected' : '' }}> {{ $category->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Gambar Postingan --}}
                    <div class="flex flex-col gap-y-2 mb-4">
                        <label class="block mb-2 text-gray-900" for="file_input">Upload Gambar : </label>
                        <img src="{{ asset('storage/posts/' . $post->image) }}" alt="{{ $post->title }}"
                            class="block w-[30%] h-[30%]">
                        <input class="file:bg-purple-800 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 @error('image') border-red-500
                        @enderror" aria-describedby="file_input_help" id="file_input" type="file" name="image">
                        <p class="mt-1 text-sm text-gray-500" id="file_input_help">PNG, JPG, JPEG (Max 2MB).</p>
                        @error('image')
                            <small class="text-red-500"> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                {{-- Akhir dari grid kiri --}}

                {{-- Grid Kanan --}}
                <div class="flex flex-col gap-y-2">
                    <label for="content">Postingan : </label>
                    <textarea name="content" id="content"
                        class="summernote"> {{ old('content', $post->content) }} </textarea>
                    @error('content')
                        <small class="text-red-500"> {{ $message }} </small>
                    @enderror
                </div>
                {{-- Akhir dari grid kanan --}}
            </div>

            <hr class="text-gray-200 mb-4">

            {{-- Save button dan back button --}}
            <div class="mt-2 flex gap-2 justify-center">
                {{-- Save button --}}
                <button type="submit"
                    class="bg-purple-800 text-yellow-400 rounded-lg px-4 py-2 flex items-center gap-1 hover:bg-purple-900 hover:text-yellow-500 active:bg-yellow-400 active:text-purple-800 transition-all duration-300">
                    <i data-feather="edit" class="size-[1.2rem]"></i>
                    <span>Update</span>
                </button>

                {{-- Back button --}}
                <a href="/users"
                    class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 hover:text-gray-100 active:bg-gray-700 flex items-center">
                    <i data-feather="arrow-left" class="size-[1.2rem]"></i>
                    <span>Back</span>
                </a>
            </div>
        </form>
    </div>
</x-dashboard.dashboard>