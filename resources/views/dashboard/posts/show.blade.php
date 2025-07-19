<x-dashboard.dashboard>
    <x-slot:titlePage> {{ $titlePage }} </x-slot:titlePage>

    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        {{-- Container Button --}}
        <div class="flex items-center justify-end border-b border-solid border-gray-300 pb-2 gap-1 mb-3">
            {{-- Button Back --}}
            <a href="/posts"
                class="px-3 py-2 bg-gray-400 text-white hover:bg-gray-500 rounded-lg flex items-center text-sm sm:text-md">
                <i data-feather="arrow-left" class="size-[1rem]"></i>
                <span>Back</span>
            </a>

            {{-- Button Edit --}}
            <a href="/posts/{{ $post->id }}/edit"
                class="px-3 py-2 bg-yellow-400 text-black hover:bg-yellow-300 rounded-lg flex items-center text-sm sm:text-md">
                <i data-feather="edit" class="size-[1rem]"></i>
                <span>edit</span>
            </a>

            {{-- Button Delete --}}
            <form action="/posts/{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="text-white bg-red-500 rounded-lg px-3 py-2 flex items-center hover:bg-red-600 text-sm sm:text-md"
                    onclick="return confirm('Anda yakin ingin menghapus postingan?')">
                    <i data-feather="trash" class="size-[1rem]"></i>
                    <span>Hapus</span>
                </button>
            </form>
        </div>

        {{-- Title Postingan --}}
        <h1 class="text-xl font-bold mb-3">
            {{ $post->title }}
        </h1>

        {{-- Author dan waktu --}}
        <p class="text-sm text-gray-400 italic mb-3">Dibuat oleh {{ $post->user->name }} pada
            {{ $post->created_at->diffForHumans() }}
        </p>

        <div class="h-[15rem] overflow-hidden mb-3">
            <img src="{{ asset('storage/posts/' . $post->image) }}" alt="{{ $post->title }}">
        </div>

        <p class="text-justify">
            {!! $post->content !!}
        </p>
    </div>


</x-dashboard.dashboard>