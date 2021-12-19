<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <h2 class="font-semibold md:text-5xl text-4xl text-indigo-800 leading-tight mb-10 sm:m-0 sm:mb-10">
                    {{ __('Wedstrijden') }}
                </h2>

                <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8 sm:m-0">
                    @foreach($games as $game)
                        <a href="{{ route('gamble.show', $game->id) }}">
                            <div id="{{ $game->id }}" class="bg-white h-60 flex flex-col justify-center items-center text-indigo-800 border-2 border-indigo-800 hover:bg-indigo-800 hover:text-white transition ease-in-out cursor-pointer">
                                <h3 class="text-5xl font-medium">Uitslag</h3>
                                <p class="text-3xl font-bold">4 - 1</p>
                                <p class="text-2xl font-semibold">{{ $game->name1 }} VS {{ $game->name2 }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="my-3">
                    {{ $games->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
