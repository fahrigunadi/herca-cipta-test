import MainLayout from '@/Layouts/MainLayout';
import { Head } from '@inertiajs/react';

export default function IndexKomisiPenjualan({ komisi }) {
    return (
        <MainLayout>
            <Head title="Komisi Penjualan" />

            <div className="pt-8 pb-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h2 className="font-semibold text-xl mb-6">Komisi Penjualan</h2>

                        <div className="relative overflow-x-auto">
                            <table className="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead className="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" className="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Marketing
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Bulan
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Omzet
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Komisi
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Komisi Nominal
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {komisi.map((item, index) => (
                                        <tr key={index} className="bg-white border-b">
                                            <td className="px-6 py-4">
                                                {index + 1}
                                            </td>
                                            <th scope="row" className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {item.marketing}
                                            </th>
                                            <td className="px-6 py-4">
                                                {item.month}
                                            </td>
                                            <td className="px-6 py-4">
                                                {item.omzet}
                                            </td>
                                            <td className="px-6 py-4">
                                                {item.commission_percentage}%
                                            </td>
                                            <td className="px-6 py-4">
                                                {item.commission}
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </MainLayout>
    );
}
