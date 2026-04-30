<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Showing:') }} {{ $software->Title }}
            </h2>
            @if(auth()->user() && auth()->user()->is_admin)
            <a href="{{ route('admin.software.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                &larr; Back to the list
            </a>
            @endif
            @if(auth()->user() && !auth()->user()->is_admin)
            <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                &larr; Back to the list
            </a>
            @endif
            @guest
            <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                &larr; Back to the list
            </a>
            @endguest
        </div>
    </x-slot>
    <!-- Виведення повідомлень про результат (успіх або помилка) -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 p-4 bg-green-100 text-green-700 rounded-lg px-6">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 p-4 bg-red-100 text-red-700 rounded-lg px-6">{{ session('error') }}</div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Основна інформація в лівій колонці-->
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Software name</h3>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $software->Title }}</p>
                            </div>

                            <div>
                                <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Description</h3>
                                <p class="mt-1 text-gray-700 leading-relaxed text-justify">
                                    {{ $software->Description }}
                                </p>
                            </div>
                        </div>

                        <!-- Характеристики в правій колонці -->
                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 space-y-4">
                            <div class="flex justify-between items-center border-b border-gray-200 pb-2">
                                <span class="text-gray-600 font-medium">Item ID:</span>
                                <span class="text-gray-900 font-mono">{{ $software->id }}</span>
                            </div>

                            <div class="flex justify-between items-center border-b border-gray-200 pb-2">
                                <span class="text-gray-600 font-medium">Price:</span>
                                <span class="text-2xl font-bold text-green-600">{{ number_format($software->Price, 2) }} $</span>
                            </div>

                            <div class="flex justify-between items-center border-b border-gray-200 pb-2">
                                <span class="text-gray-600 font-medium">Release date:</span>
                                <span class="text-gray-900">{{ \Carbon\Carbon::parse($software->ReleaseDate)->format('d.m.Y') }}</span>
                            </div>

                            <div class="pt-4 flex space-x-3">
                                @auth
                                    @if(auth()->user()->is_admin) 
                                    <a href="{{ route('admin.software.edit', $software->id) }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white text-center py-2 rounded-lg">
                                        Edit
                                    </a>
                                    @elseif($isOwned)
                                        <a href="{{ route('library') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-center py-2 rounded-md px-6 py-2">View in library</a>
                                    @else
                                        <form action="{{ route('software.purchase', $software->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition">
                                                Buy
                                            </button>
                                        </form>
                                    @endif
                                @endauth    
                                @guest
                                <button class="flex-1 bg-indigo-600 text-white text-center py-2 rounded-lg opacity-50 cursor-not-allowed" disabled>
                                    Login to buy
                                </button>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>