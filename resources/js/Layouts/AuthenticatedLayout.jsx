import ApplicationLogo from '@/Components/ApplicationLogo';
import Dropdown from '@/Components/Dropdown';
import NavLink from '@/Components/NavLink';
import { Link } from '@inertiajs/react';

export default function AuthenticatedLayout({ auth, header, children }) {
    // Захист від порожнього об'єкта auth
    const user = auth?.user;

    return (
        <div className="min-h-screen bg-gray-100">
            <nav className="bg-white border-b border-gray-100">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between items-center h-16">
                        
                        {/* Ліва частина: Лого + Основні посилання */}
                        <div className="flex items-center gap-4 sm:gap-10">
                            <div className="shrink-0">
                                <Link href="/">
                                    <ApplicationLogo className="block h-8 w-auto fill-current text-gray-800" />
                                </Link>
                            </div>

                            <div className="flex space-x-3 sm:space-x-8">
                                <NavLink href={route('home')} active={route().current('home')} className="text-sm sm:text-base">
                                    Shop
                                </NavLink>
                                
                                {user && (
                                    <NavLink 
                                        href={user.is_admin ? route('index') : route('library')} 
                                        active={route().current('index') || route().current('library')}
                                        className="text-sm sm:text-base"
                                    >
                                        {user.is_admin ? 'Admin' : 'Library'}
                                    </NavLink>
                                )}
                            </div>
                        </div>

                        {/* Права частина: Профіль або Вхід */}
                        <div className="flex items-center ms-auto">
                            {user ? (
                                <div className="ms-3 relative">
                                    <Dropdown>
                                        <Dropdown.Trigger>
                                            <button className="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 transition">
                                                <span className="hidden sm:inline">{user.name}</span>
                                                <span className="sm:hidden">{user.name}</span>
                                                <svg className="ms-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd" />
                                                </svg>
                                            </button>
                                        </Dropdown.Trigger>
                                        <Dropdown.Content>
                                            <Dropdown.Link href={route('profile.edit')}>Profile</Dropdown.Link>
                                            <Dropdown.Link href={route('logout')} method="post" as="button">Logout</Dropdown.Link>
                                        </Dropdown.Content>
                                    </Dropdown>
                                </div>
                            ) : (
                                <div className="flex items-center gap-3">
                                    <Link href={route('login')} className="text-xs sm:text-sm text-gray-600 hover:text-gray-900">
                                        Log in
                                    </Link>
                                    <Link href={route('register')} className="text-xs sm:text-sm bg-gray-800 text-white px-3 py-1 rounded-md hover:bg-gray-700 transition">
                                        Join
                                    </Link>
                                </div>
                            )}
                        </div>

                    </div>
                </div>
            </nav>

            {header && <header className="bg-white shadow"><div className="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">{header}</div></header>}
            <main>{children}</main>
        </div>
    );
}