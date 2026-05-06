import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, router } from '@inertiajs/react';

export default function Index({ auth, softwares, session }) {
    
    // Функція для видалення елемента
    const handleDelete = (id) => {
        if (confirm('Are you sure you want to delete this item?')) {
            router.delete(route('destroy', id));
        }
    };

    return (
        <AuthenticatedLayout
            auth={auth}
            header={
                <div className="flex justify-between items-center">
                    <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                        List of Software items
                    </h2>
                    <Link
                        href={route('create')}
                        className="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition"
                    >
                        Add new Item
                    </Link>
                </div>
            }
        >
            <Head title="Admin - Software List" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    
                    {/* Flash-повідомлення про успіх (отримуємо через props session) */}
                    {session?.success && (
                        <div className="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm" role="alert">
                            <p className="font-bold">Success!</p>
                            <p>{session.success}</p>
                        </div>
                    )}

                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <div className="overflow-x-auto">
                                <table className="min-w-full divide-y divide-gray-200">
                                    <thead className="bg-gray-50">
                                        <tr>
                                            <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                            <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th className="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody className="bg-white divide-y divide-gray-200">
                                        {softwares.length > 0 ? (
                                            softwares.map((item) => (
                                                <tr key={item.id}>
                                                    <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {item.id}
                                                    </td>
                                                    <td className="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {item.Title}
                                                    </td>
                                                    <td className="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                                        {/* Кнопка перегляду */}
                                                        <Link 
                                                            href={route('show', item.id)} 
                                                            className="text-indigo-600 hover:text-indigo-900 bg-indigo-50 px-3 py-1 rounded-md transition inline-block"
                                                        >
                                                            Show
                                                        </Link>
                                                        
                                                        {/* Кнопка редагування */}
                                                        <Link 
                                                            href={route('edit', item.id)} 
                                                            className="text-yellow-600 hover:text-yellow-900 bg-yellow-50 px-3 py-1 rounded-md transition inline-block"
                                                        >
                                                            Edit
                                                        </Link>

                                                        {/* Кнопка видалення */}
                                                        <button 
                                                            onClick={() => handleDelete(item.id)}
                                                            className="text-red-600 hover:text-red-900 bg-red-50 px-3 py-1 rounded-md transition"
                                                        >
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            ))
                                        ) : (
                                            <tr>
                                                <td colSpan="3" className="text-center py-8 text-gray-500">
                                                    List is empty
                                                </td>
                                            </tr>
                                        )}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}