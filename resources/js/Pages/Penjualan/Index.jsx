import Searchinput from '@/Components/Searchinput';
import Pagination from '@/Components/Pagination';
import MainLayout from '@/Layouts/MainLayout';
import { Head } from '@inertiajs/react';

export default function IndexPenjualan({ penjualan }) {
    return (
        <MainLayout>
            <Head title="Semua Penjualan" />

            <div className="pt-8 pb-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h2 className="font-semibold text-xl mb-6">Semua Penjualan</h2>

                        <div className="flex w-full justify-end mb-4">
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
                                            Transaction Number
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Marketing
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Date
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Cargo Fee
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Total Balance
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Grand Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {penjualan.data.map((item, index) => (
                                        <tr key={item.id} className="bg-white border-b">
                                            <td className="px-6 py-4">
                                                {penjualan.from + index}
                                            </td>
                                            <th scope="row" className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {item.transaction_number}
                                            </th>
                                            <th scope="row" className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {item.marketing?.name}
                                            </th>
                                            <td className="px-6 py-4">
                                                {item.date}
                                            </td>
                                            <td className="px-6 py-4">
                                                {item.cargo_fee}
                                            </td>
                                            <td className="px-6 py-4">
                                                {item.total_balance}
                                            </td>
                                            <td className="px-6 py-4">
                                                {item.grand_total}
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>

                            <Pagination data={penjualan} />
                        </div>
                    </div>
                </div>
            </div>
        </MainLayout>
    );
}
