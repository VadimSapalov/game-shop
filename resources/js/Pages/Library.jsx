import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';

export default function Library({ auth, softwares }) {
    return (
        <AuthenticatedLayout
            auth={auth}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">My Library</h2>}
        >
            <Head title="My Library" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    
                    <h1 className="text-2xl font-bold text-gray-800 mb-6 px-4 sm:px-0">Purchased Software</h1>

                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        {softwares && softwares.length > 0 ? (
                            softwares.map((item) => (
                                <div key={item.id} className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 border border-gray-200 flex flex-col justify-between transition hover:shadow-md">
                                    <div>
                                        <h3 className="text-lg font-bold text-gray-900">{item.Title}</h3>
                                        <p className="text-sm text-gray-600 line-clamp-2 mb-4">
                                            {item.Description}
                                        </p>
                                    </div>
                                    
                                    <div className="flex justify-between items-center mt-4">
                                        <Link 
                                            href={route('show', item.id)} 
                                            className="text-blue-600 hover:underline font-medium"
                                        >
                                            Details
                                        </Link>
                                        
                                        <button 
                                            className="bg-gray-300 text-gray-500 cursor-not-allowed opacity-60 shadow-none px-4 py-2 rounded-md text-sm font-semibold"
                                            disabled
                                        >
                                            Download
                                        </button>
                                    </div>
                                </div>
                            ))
                        ) : (
                            <div className="col-span-full p-12 text-center bg-white rounded-lg shadow-sm border border-gray-200">
                                <p className="text-gray-500 text-lg italic">No software items found in your library.</p>
                                <Link href={route('home')} className="mt-4 inline-block text-blue-600 hover:underline">
                                    Browse the store
                                </Link>
                            </div>
                        )}
                    </div>

                </div>
            </div>
        </AuthenticatedLayout>
    );
}