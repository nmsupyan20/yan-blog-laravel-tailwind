<x-landing.landing>

    <div class="main sm:w-2/3 w-full  mx-auto mt-5">
        {{-- Latest Post --}}
        <div class="latest-post">
            <h1 class="text-center font-bold text-xl text-gray-600">- Latest Articles -</h1>
            <div class="wrapper mt-3 flex justify-center gap-4 flex-wrap">
                @foreach ($latests as $latest)
                    <div class="w-[17rem] bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="h-35 overflow-hidden rounded-t-lg">
                            <img src="{{ asset('storage/posts/' . $latest->image) }}" alt="{{ $latest->title }}">
                        </div>
                        <div class="p-5 flex flex-col justify-between">
                            <h5 class="mb-2 text-lg font-bold text-gray-600">{{ $latest->title }}</h5>
                            <div>
                                <a href="/landing/{{ $latest->id }}/"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-yellow-400 bg-purple-800 rounded-lg hover:bg-yellow-400 hover:text-purple-800">
                                    Read more..
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- All Post --}}
        <div class="all-post mt-5">
            <h1 class="text-center font-bold text-xl text-gray-600">- All Articles -</h1>
            <div class="wrapper mt-3 flex justify-center gap-4 flex-wrap">
                @foreach ($posts as $post)
                    <div class="w-[17rem] bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="h-35 overflow-hidden rounded-t-lg">
                            <img src="{{ asset('storage/posts/' . $post->image) }}" alt="{{ $post->title }}">
                        </div>
                        <div class="p-5">
                            <h5 class="mb-2 text-lg font-bold text-gray-600">{{ $post->title }}</h5>
                            <a href="/landing/{{ $post->id }}/"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-yellow-400 bg-purple-800 rounded-lg hover:bg-yellow-400 hover:text-purple-800">
                                Read more..
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

</x-landing.landing>