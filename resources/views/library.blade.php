<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Library
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($softwares->isEmpty())
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <p class="text-gray-500">Nothing here yet.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($softwares as $item)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 border border-gray-200">
                            <h3 class="text-lg font-bold">{{ $item->Title }}</h3>
                            <p class="text-sm text-gray-600 line-clamp-2 mb-4">{{ $item->Description }}</p>
                            
                            <div class="flex justify-between items-center mt-4">
                                <a href="{{ route('show', $item->id) }}" class="text-blue-600 hover:underline">Details</a>
                                
                                <button class="bg-gray-300 text-gray-500 cursor-not-allowed opacity-60 shadow-none px-4 py-2 rounded-md">
                                    Download
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>