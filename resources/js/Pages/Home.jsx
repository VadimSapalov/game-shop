import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head, Link } from '@inertiajs/react';

export default function Home({ auth, softwares }) {
    const Layout = auth.user ? AuthenticatedLayout : GuestLayout;

    return (
        <Layout
            auth={auth}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Game Shop</h2>}
        >
            <Head title="Game Shop" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        {softwares.map((item) => (
                            <div key={item.id} className="bg-white shadow-sm rounded-lg p-6 border border-gray-100 flex flex-col justify-between transition hover:shadow-lg">
                                <div className="flex items-start mb-4">
                                    <div className="w-16 h-16 bg-gray-100 rounded-lg flex-shrink-0 flex items-center justify-center text-gray-400">
                                        Logo
                                    </div>
                                    <div className="ml-4">
                                        <h3 className="text-lg font-bold text-gray-900 leading-tight">{item.Title}</h3>
                                        <p className="text-sm text-green-600 font-semibold mt-1">${item.Price}</p>
                                    </div>
                                </div>

                                <p className="text-gray-600 text-sm mb-6 line-clamp-2">
                                    {item.Description}
                                </p>

                                <Link 
                                    href={route('show', item.id)} 
                                    className="w-full text-center py-2 bg-slate-800 text-white rounded-md font-medium hover:bg-slate-700 transition"
                                >
                                    View
                                </Link>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </Layout>
    );
}