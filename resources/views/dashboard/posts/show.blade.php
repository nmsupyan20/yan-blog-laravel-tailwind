<x-dashboard.dashboard>
    <x-slot:titlePage> {{ $titlePage }} </x-slot:titlePage>
    <div class="bg-white w-full mx-auto p-7 rounded-lg">
        <h1 class="text-lg mb-4 font-bold text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Temporibus
            asperiores sunt
            consequuntur, fuga
            corporis aliquid possimus beatae earum eos quaerat placeat delectus qui doloremque tempore ratione
            laudantium incidunt exercitationem? Tempora?</h1>
        <div class="mb-4">
            <a href="/posts" class="bg-gray-400 text-white py-2 px-3 rounded-lg shadow-md">Back to Posts</a>
            <a href="/posts/{{ $post->id }}/edit"
                class="bg-yellow-400 text-black py-2 px-3 rounded-lg shadow-md">Edit</a>
            <a href="/posts/{{ $post->id }}" class="bg-red-500 text-white py-2 px-3 rounded-lg shadow-md">Delete</a>
        </div>
        <hr class="text-gray-300 shadow-md mb-4">
        <div class="w-full">
            <img src="" alt="">
        </div>
        <div>
            {!! $post->content !!}
        </div>
    </div>
</x-dashboard.dashboard>