import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm, Link } from '@inertiajs/react';
import PrimaryButton from '@/Components/PrimaryButton';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import InputError from '@/Components/InputError';

export default function Create({ auth, genres }) {

    const { data, setData, post, processing, errors } = useForm({
        Title: '',
        Description: '',
        Price: '',
        ReleaseDate: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('store'));
    };

    return (
        <AuthenticatedLayout
            auth={auth}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Add new Software item</h2>}
        >
            <Head title="Add Software" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            
                            <form onSubmit={submit} className="space-y-6">
                                {/* Назва */}
                                <div>
                                    <InputLabel htmlFor="Title" value="Name" />
                                    <TextInput
                                        id="Title"
                                        name="Title"
                                        value={data.Title}
                                        className="mt-1 block w-full"
                                        isFocused={true}
                                        onChange={(e) => setData('Title', e.target.value)}
                                        required
                                    />
                                    <InputError message={errors.Title} class="mt-2" />
                                </div>

                                {/* Опис */}
                                <div>
                                    <InputLabel htmlFor="Description" value="Description" />
                                    <textarea
                                        id="Description"
                                        name="Description"
                                        value={data.Description}
                                        className="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        rows="4"
                                        onChange={(e) => setData('Description', e.target.value)}
                                        required
                                    />
                                    <InputError message={errors.Description} class="mt-2" />
                                </div>
                                <div>
                                    <InputLabel htmlFor="genre_id" value="Genre" />
                                    <select
                                        id="genre_id"
                                        className="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        value={data.genre_id}
                                        onChange={(e) => setData('genre_id', e.target.value)}
                                        required
                                    >
                                        <option value="">Select a genre</option>
                                        {genres.map((genre) => (
                                            <option key={genre.id} value={genre.id}>
                                                {genre.name}
                                            </option>
                                        ))}
                                    </select>
                                    <InputError message={errors.genre_id} className="mt-2" />
                                </div>

                                <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    {/* Ціна */}
                                    <div>
                                        <InputLabel htmlFor="Price" value="Price" />
                                        <TextInput
                                            id="Price"
                                            name="Price"
                                            type="number"
                                            step="0.01"
                                            value={data.Price}
                                            className="mt-1 block w-full"
                                            onChange={(e) => setData('Price', e.target.value)}
                                            required
                                        />
                                        <InputError message={errors.Price} class="mt-2" />
                                    </div>

                                    {/* Дата релізу */}
                                    <div>
                                        <InputLabel htmlFor="ReleaseDate" value="Release Date" />
                                        <TextInput
                                            id="ReleaseDate"
                                            name="ReleaseDate"
                                            type="date"
                                            value={data.ReleaseDate}
                                            className="mt-1 block w-full"
                                            onChange={(e) => setData('ReleaseDate', e.target.value)}
                                            required
                                        />
                                        <InputError message={errors.ReleaseDate} class="mt-2" />
                                    </div>
                                </div>

                                <div className="flex items-center gap-4 pt-4 border-t">
                                    <PrimaryButton disabled={processing}>
                                        Save
                                    </PrimaryButton>

                                    <Link
                                        href={route('index')}
                                        className="text-sm text-gray-600 hover:text-gray-900 underline transition"
                                    >
                                        Cancel
                                    </Link>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}