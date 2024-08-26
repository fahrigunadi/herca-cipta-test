import CreateModalMarketing from './Partials/CreateModal';
import Searchinput from '@/Components/Searchinput';
import Pagination from '@/Components/Pagination';
import MainLayout from '@/Layouts/MainLayout';
import { Head } from '@inertiajs/react';

export default function IndexMarketing({ marketing }) {
    return (
        <MainLayout>
            <Head title="Semua Marketing" />

            <div className="pt-8 pb-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h2 className="font-semibold text-xl mb-6">Semua Marketing</h2>

                        <div className="flex w-full justify-between mb-4">
                            <CreateModalMarketing />

                            <Searchinput />
                        </div>

                        <div className="relative overflow-x-auto">
                            <table className="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead className="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" className="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Nama
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {marketing.data.map((item, index) => (
                                        <tr key={item.id} className="bg-white border-b">
                                            <td className="px-6 py-4">
                                                {marketing.from + index}
                                            </td>
                                            <th scope="row" className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {item.name}
                                            </th>
                                            <td className="px-6 py-4"></td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>

                            <Pagination data={marketing} />
                        </div>
                    </div>
                </div>
            </div>
        </MainLayout>
    );
}
