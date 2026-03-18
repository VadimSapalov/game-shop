<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new Software item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('admin.software.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="Title" :value="__('Name')" />
                            <x-text-input id="Title" name="Title" type="text" class="mt-1 block w-full" :value="old('Title')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('Title')" />
                        </div>

                        <div>
                            <x-input-label for="Description" :value="__('Description')" />
                            <textarea id="Description" name="Description" 
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                                rows="4" required>{{ old('Description') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('Description')" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="Price" :value="__('Price')" />
                                <x-text-input id="Price" name="Price" type="number" step="0.01" class="mt-1 block w-full" :value="old('Price')" required />
                                <x-input-error class="mt-2" :messages="$errors->get('Price')" />
                            </div>

                            <div>
                                <x-input-label for="ReleaseDate" :value="__('Release Date')" />
                                <x-text-input id="ReleaseDate" name="ReleaseDate" type="date" class="mt-1 block w-full" :value="old('ReleaseDate')" required />
                                <x-input-error class="mt-2" :messages="$errors->get('ReleaseDate')" />
                            </div>
                        </div>

                        <div class="flex items-center gap-4 pt-4 border-t">
                            <x-primary-button>
                                {{ __('Save') }}
                            </x-primary-button>

                            <a href="{{ route('admin.software.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline transition">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>