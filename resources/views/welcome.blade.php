<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Game Shop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Welcome!</h1>

                    @auth
                        <!-- Відображення для авторизованого користувача -->
                        <p class="mb-4">Greetings, <strong>{{ Auth::user()->name }}</strong>! You are logged in.</p>
                        
                        <div class="mt-4">
                            <a href="{{ route('admin.software.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 transition ease-in-out duration-150">
                                Open software list
                            </a>
                        </div>
                    @endauth

                    @guest
                        <!-- Відображення для гостя -->
                        <p class="mb-4">You see this as guest, please login.</p>
                        
                        <div class="flex space-x-4 mt-4">
                            <a href="{{ route('login') }}" class="text-sm text-gray-600 underline hover:text-gray-900">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="text-sm text-gray-600 underline hover:text-gray-900">
                                Register
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</x-app-layout>