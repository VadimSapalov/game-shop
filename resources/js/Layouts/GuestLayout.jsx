import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';

export default function GuestLayout({ children }) {
    return (
        <div className="min-h-screen bg-gray-100">
            {/* Навігація для гостей */}
            <nav className="bg-white border-b border-gray-100 shadow-sm">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between h-16 items-center">
                        <div className="flex items-center">
                            <Link href="/">
                                <ApplicationLogo className="block h-9 w-auto fill-current text-gray-800" />
                            </Link>
                            <span className="ml-3 font-bold text-lg text-gray-800">Game Store</span>
                        </div>

                        <div className="flex space-x-4">
                            <Link
                                href={route('login')}
                                className="text-sm text-gray-700 hover:text-gray-900 font-medium"
                            >
                                Log in
                            </Link>
                            <Link
                                href={route('register')}
                                className="text-sm text-gray-700 hover:text-gray-900 font-medium"
                            >
                                Register
                            </Link>
                        </div>
                    </div>
                </div>
            </nav>

            {/* Основний контент сторінки */}
            <main>
                {/* Ми прибрали sm:max-w-md, тепер контент регулюється всередині сторінок */}
                {children}
            </main>
        </div>
    );
}