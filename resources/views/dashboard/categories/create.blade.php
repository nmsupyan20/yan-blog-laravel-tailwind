<x-dashboard.dashboard>
    <x-slot:titlePage> {{ $titlePage }} </x-slot:titlePage>
    <div class="bg-white w-2/3 mx-auto p-7 rounded-lg m">
        <form action="{{ route('categories') }}" method="post">
            @csrf
            <div class="flex flex-col gap-y-2 mb-4">
                <label for="name">Categories : </label>
                <input type="text" name="name" id="name" placeholder="Input category name" class="bg-purple-50 h-[2.3rem] w-full p-2 rounded-lg border-gray-200 border border-solid shadow-md  @error('name') border-red-400
                @enderror">
                @error('name')
                    <small class="text-red-400"> {{ $message }} </small>
                @enderror
            </div>
            <hr class="text-gray-200 mb-4">
            <div class="mt-2 flex gap-2 justify-center">
                <button type="submit"
                    class="bg-purple-800 text-yellow-400 rounded-lg px-4 py-2 flex items-center gap-1 hover:bg-purple-900 hover:text-yellow-500 active:bg-yellow-400 active:text-purple-800 transition-all duration-300">
                    <span>Save</span>
                    <i data-feather="save" class="size-[1.2rem]"></i>
                </button>
                <a href="/categories"
                    class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 hover:text-gray-100 active:bg-gray-700">
                    Back
                </a>
            </div>
        </form>
    </div>

</x-dashboard.dashboard>