<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'transaction_number' => 'TRX001',
                'marketing_id' => 1,
                'date' => '2023-05-22',
                'cargo_fee' => 25_000,
                'total_balance' => 3_000_000,
                'grand_total' => 3_025_000,
            ],
            [
                'transaction_number' => 'TRX002',
                'marketing_id' => 3,
                'date' => '2023-05-22',
                'cargo_fee' => 25_000,
                'total_balance' => 320_000,
                'grand_total' => 345_000,
            ],
            [
                'transaction_number' => 'TRX003',
                'marketing_id' => 1,
                'date' => '2023-05-22',
                'cargo_fee' => 0,
                'total_balance' => 65_000_000,
                'grand_total' => 65_000_000,
            ],
            [
                'transaction_number' => 'TRX004',
                'marketing_id' => 1,
                'date' => '2023-05-23',
                'cargo_fee' => 10_000,
                'total_balance' => 70_000_000,
                'grand_total' => 70_010_000,
            ],
            [
                'transaction_number' => 'TRX005',
                'marketing_id' => 2,
                'date' => '2023-05-23',
                'cargo_fee' => 10_000,
                'total_balance' => 80_000_000,
                'grand_total' => 80_010_000,
            ],
            [
                'transaction_number' => 'TRX006',
                'marketing_id' => 3,
                'date' => '2023-05-23',
                'cargo_fee' => 12_000,
                'total_balance' => 44_000_000,
                'grand_total' => 44_012_000,
            ],
            [
                'transaction_number' => 'TRX007',
                'marketing_id' => 1,
                'date' => '2023-06-01',
                'cargo_fee' => 0,
                'total_balance' => 75_000_000,
                'grand_total' => 75_000_000,
            ],
            [
                'transaction_number' => 'TRX008',
                'marketing_id' => 2,
                'date' => '2023-06-02',
                'cargo_fee' => 0,
                'total_balance' => 85_000_000,
                'grand_total' => 85_000_000,
            ],
            [
                'transaction_number' => 'TRX009',
                'marketing_id' => 2,
                'date' => '2023-06-01',
                'cargo_fee' => 0,
                'total_balance' => 175_000_000,
                'grand_total' => 175_000_000,
            ],
            [
                'transaction_number' => 'TRX010',
                'marketing_id' => 3,
                'date' => '2023-06-01',
                'cargo_fee' => 0,
                'total_balance' => 75_000_000,
                'grand_total' => 75_000_000,
            ],
            [
                'transaction_number' => 'TRX011',
                'marketing_id' => 2,
                'date' => '2023-06-01',
                'cargo_fee' => 0,
                'total_balance' => 750_020_000,
                'grand_total' => 750_020_000,
            ],
            [
                'transaction_number' => 'TRX012',
                'marketing_id' => 3,
                'date' => '2023-06-01',
                'cargo_fee' => 0,
                'total_balance' => 130_000_000,
                'grand_total' => 120_000_000,
            ],
        ])->each(fn ($penjualan) => Penjualan::create($penjualan));
    }
}
