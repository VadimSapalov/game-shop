import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';

export default function GuestLayout({ children }) {
    return (
        <div className="min-h-screen bg-gray-100">
            {/* Навігація для гостей */}
            <nav className="bg-white border-b border-gray-100 shadow-sm">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between h-16 items-center">
                        
                        {/* Логотип та назва */}
                        <div className="flex items-center min-w-0">
                            <Link href="/" className="shrink-0">
                                <ApplicationLogo className="block h-8 w-auto sm:h-9 fill-current text-gray-800" />
                            </Link>
                            <span className="ml-2 sm:ml-3 font-bold text-base sm:text-lg text-gray-800 truncate">
                                Game Store
                            </span>
                        </div>

                        {/* Кнопки входу/реєстрації */}
                        <div className="flex items-center space-x-3 sm:space-x-6 ml-4">
                            <Link
                                href={route('login')}
                                className="text-xs sm:text-sm text-gray-700 font-medium whitespace-nowrap"
                            >
                                Log in
                            </Link>
                            <Link
                                href={route('register')}
                                className="text-xs sm:text-sm bg-gray-800 text-white px-3 py-1.5 rounded-md transition font-medium whitespace-nowrap shadow-sm"
                            >
                                Register
                            </Link>
                        </div>

                    </div>
                </div>
            </nav>
            
            <main>{children}</main>
        </div>
    );
}