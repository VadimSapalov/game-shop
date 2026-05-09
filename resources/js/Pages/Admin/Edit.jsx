import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm, Link } from '@inertiajs/react';

export default function Edit({ auth, software }) {
    const { data, setData, put, processing, errors } = useForm({
        Title: software.Title || '',
        Description: software.Description || '',
        Price: software.Price || '',
    });

    const submit = (e) => {
        e.preventDefault();
        put(route('update', software.id));
    };

    return (
        <AuthenticatedLayout
            auth={auth}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Edit Item: {software.Title}</h2>}
        >
            <Head title="Edit Software" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                        <form onSubmit={submit} className="space-y-6">
                            {/* Назва */}
                            <div>
                                <label className="block font-medium text-sm text-gray-700">Title</label>
                                <input
                                    type="text"
                                    value={data.Title} // Зв'язуємо з даними форми
                                    onChange={(e) => setData('Title', e.target.value)}
                                    className="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                />
                                {errors.Title && <div className="text-red-600 text-sm">{errors.Title}</div>}
                            </div>

                            {/* Опис */}
                            <div>
                                <label className="block font-medium text-sm text-gray-700">Description</label>
                                <textarea
                                    value={data.Description}
                                    onChange={(e) => setData('Description', e.target.value)}
                                    className="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    rows="4"
                                />
                                {errors.Description && <div className="text-red-600 text-sm">{errors.Description}</div>}
                            </div>

                            {/* Ціна */}
                            <div>
                                <label className="block font-medium text-sm text-gray-700">Price ($)</label>
                                <input
                                    type="number"
                                    step="0.01"
                                    value={data.Price}
                                    onChange={(e) => setData('Price', e.target.value)}
                                    className="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                />
                                {errors.Price && <div className="text-red-600 text-sm">{errors.Price}</div>}
                            </div>

                            <div className="flex items-center gap-4">
                                <button
                                    type="submit"
                                    disabled={processing}
                                    className="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 disabled:opacity-50"
                                >
                                    Update Item
                                </button>
                                <Link href={route('index')} className="bg-stone-500 px-4 py-2 text-white rounded-md hover:bg-stone-600">
                                    Cancel
                                </Link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}