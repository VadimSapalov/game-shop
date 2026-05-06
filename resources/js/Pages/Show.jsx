import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Show({ auth, software, isOwned, status, error }) {
    const Layout = auth.user ? AuthenticatedLayout : GuestLayout;
    
    // Використовуємо хук useForm для обробки покупки
    const { post, processing } = useForm();

    const handlePurchase = (e) => {
        e.preventDefault();
        post(route('purchase', software.id));
    };

    // Форматування дати (аналог Carbon)
    const releaseDate = new Date(software.ReleaseDate).toLocaleDateString('uk-UA');

    return (
        <Layout
            auth={auth}
            header={
                <div className="flex justify-between items-center">
                    <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                        Showing: {software.Title}
                    </h2>
                    <Link
                        href={auth.user?.is_admin ? route('index') : route('home')}
                        className="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition"
                    >
                        &larr; Back to the list
                    </Link>
                </div>
            }
        >
            <Head title={`Software - ${software.Title}`} />

            {/* Повідомлення про статус */}
            <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
                {status && (
                    <div className="p-4 bg-green-100 text-green-700 rounded-lg shadow-sm">
                        {status}
                    </div>
                )}
                {error && (
                    <div className="p-4 bg-red-100 text-red-700 rounded-lg shadow-sm">
                        {error}
                    </div>
                )}
            </div>

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                                {/* Ліва колонка */}
                                <div className="space-y-4">
                                    <div>
                                        <h3 className="text-sm font-medium text-gray-500 uppercase tracking-wider">Software name</h3>
                                        <p className="mt-1 text-lg font-semibold text-gray-900">{software.Title}</p>
                                    </div>

                                    <div>
                                        <h3 className="text-sm font-medium text-gray-500 uppercase tracking-wider">Description</h3>
                                        <p className="mt-1 text-gray-700 leading-relaxed text-justify">
                                            {software.Description}
                                        </p>
                                    </div>
                                </div>

                                {/* Права колонка (Характеристики) */}
                                <div className="bg-gray-50 p-6 rounded-xl border border-gray-100 space-y-4">
                                    <div className="flex justify-between items-center border-b border-gray-200 pb-2">
                                        <span className="text-gray-600 font-medium">Item ID:</span>
                                        <span className="text-gray-900 font-mono">{software.id}</span>
                                    </div>

                                    <div className="flex justify-between items-center border-b border-gray-200 pb-2">
                                        <span className="text-gray-600 font-medium">Price:</span>
                                        <span className="text-2xl font-bold text-green-600">
                                            {parseFloat(software.Price).toFixed(2)} $
                                        </span>
                                    </div>

                                    <div className="flex justify-between items-center border-b border-gray-200 pb-2">
                                        <span className="text-gray-600 font-medium">Release date:</span>
                                        <span className="text-gray-900">{releaseDate}</span>
                                    </div>

                                    <div className="pt-4 flex space-x-3">
                                        {auth.user ? (
                                            auth.user.is_admin ? (
                                                <Link 
                                                    href={route('edit', software.id)} 
                                                    className="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white text-center py-2 rounded-lg font-semibold"
                                                >
                                                    Edit
                                                </Link>
                                            ) : isOwned ? (
                                                <Link 
                                                    href={route('library')} 
                                                    className="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-center py-2 rounded-md font-semibold"
                                                >
                                                    View in library
                                                </Link>
                                            ) : (
                                                <form onSubmit={handlePurchase} className="flex-1">
                                                    <button 
                                                        type="submit" 
                                                        disabled={processing}
                                                        className="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition font-semibold disabled:opacity-50"
                                                    >
                                                        {processing ? 'Processing...' : 'Buy Now'}
                                                    </button>
                                                </form>
                                            )
                                        ) : (
                                            <button 
                                                className="flex-1 bg-indigo-600 text-white text-center py-2 rounded-lg opacity-50 cursor-not-allowed font-semibold" 
                                                disabled
                                            >
                                                Login to buy
                                            </button>
                                        )}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
}