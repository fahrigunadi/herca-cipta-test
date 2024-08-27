import MainLayout from '@/Layouts/MainLayout';
import { Head } from '@inertiajs/react';
import CreateModalPembayaranPenjualan from './Partials/CreateModal';

export default function IndexPembayaranPenjualan({ marketing, total_paid, remaining_balance, penjualan, details }) {
    return (
        <MainLayout>
            <Head title="Semua Pembayaran" />

            <div className="pt-8">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h2 className="font-semibold text-xl mb-6">Detail Penjualan</h2>

                        <p className="text-lg">Transaction Number: {penjualan.transaction_number}</p>
                        <p className="text-lg">Marketing: {marketing}</p>
                        <p className="text-lg">Date: {penjualan.date}</p>
                        <p className="text-lg">Cargo Fee: {penjualan.cargo_fee}</p>
                        <p className="text-lg">Total Balance: {penjualan.total_balance}</p>
                        <p className="text-lg">Grand Total: {penjualan.grand_total}</p>
                        <br />
                        <p className="text-lg">Total Paid: {total_paid}</p>
                        <p className="text-lg">Remaining Balance: {remaining_balance}</p>
                    </div>
                </div>
            </div>

            <div className="pt-4 pb-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h2 className="font-semibold text-xl mb-6">Semua Pembayaran</h2>

                        <div className="flex mb-4">
                            <CreateModalPembayaranPenjualan penjualan={penjualan} />
                        </div>

                        <div className="relative overflow-x-auto">
                            <table className="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead className="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" className="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Payment Date
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Amount Paid
                                        </th>
                                        <th scope="col" className="px-6 py-3">
                                            Remaining Balance
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {details.map((item, index) => (
                                        <tr key={item.id} className="bg-white border-b">
                                            <td className="px-6 py-4">
                                                {index + 1}
                                            </td>
                                            <th scope="row" className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {item.payment_date}
                                            </th>
                                            <th scope="row" className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {item.amount_paid}
                                            </th>
                                            <td className="px-6 py-4">
                                                {item.remaining_balance}
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
