<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Game Shop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <h1 class="text-2xl font-bold text-gray-800 mb-6 px-4 sm:px-0">Available Software</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($softwares as $item)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center transition hover:shadow-md">
                        
                        <div class="flex-shrink-0 mr-6">
                            <a href="{{ route('show', $item->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">
                                View
                            </a>
                        </div>

                        <div class="w-16 h-16 mr-4 bg-gray-200 rounded-md overflow-hidden flex-shrink-0">
                            <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">Logo</div>
                        </div>

                        <div class="flex-grow">
                            <h3 class="text-lg font-bold text-gray-800">{{ $item->Title }}</h3>
                            <p class="text-sm text-gray-600 mt-1">
                                {{ Str::limit($item->Description, 60) }}
                            </p>
                            <p class="text-sm font-semibold text-green-600 mt-2">
                                Price: ${{ $item->Price }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full p-6 text-center text-gray-500 bg-white sm:rounded-lg shadow-sm">
                        No software items available at the moment.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>