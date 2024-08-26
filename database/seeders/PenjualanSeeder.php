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
                'marketing_id' => 1,
                'date' => '2023-05-22',
                'cargo_fee' => $cargoFee = 25_000,
                'total_balance' => $totalBalance =  3_000_000,
                'grand_total' => $totalBalance + $cargoFee,
            ],
            [
                'marketing_id' => 3,
                'date' => '2023-05-22',
                'cargo_fee' => $cargoFee = 25_000,
                'total_balance' => $totalBalance =  320_000,
                'grand_total' => $totalBalance + $cargoFee,
            ],
            [
                'marketing_id' => 1,
                'date' => '2023-05-22',
                'cargo_fee' => $cargoFee = 0,
                'total_balance' => $totalBalance =  65_000_000,
                'grand_total' => $totalBalance + $cargoFee,
            ],
            [
                'marketing_id' => 1,
                'date' => '2023-05-23',
                'cargo_fee' => $cargoFee = 10_000,
                'total_balance' => $totalBalance =  70_000_000,
                'grand_total' => $totalBalance + $cargoFee,
            ],
            [
                'marketing_id' => 2,
                'date' => '2023-05-23',
                'cargo_fee' => $cargoFee = 10_000,
                'total_balance' => $totalBalance =  80_000_000,
                'grand_total' => $totalBalance + $cargoFee,
            ],
            [
                'marketing_id' => 3,
                'date' => '2023-05-23',
                'cargo_fee' => $cargoFee = 12_000,
                'total_balance' => $totalBalance =  44_000_000,
                'grand_total' => $totalBalance + $cargoFee,
            ],
            [
                'marketing_id' => 1,
                'date' => '2023-06-01',
                'cargo_fee' => $cargoFee = 0,
                'total_balance' => $totalBalance =  75_000_000,
                'grand_total' => $totalBalance + $cargoFee,
            ],
            [
                'marketing_id' => 2,
                'date' => '2023-06-02',
                'cargo_fee' => $cargoFee = 0,
                'total_balance' => $totalBalance =  85_000_000,
                'grand_total' => $totalBalance + $cargoFee,
            ],
            [
                'marketing_id' => 2,
                'date' => '2023-06-01',
                'cargo_fee' => $cargoFee = 0,
                'total_balance' => $totalBalance =  175_000_000,
                'grand_total' => $totalBalance + $cargoFee,
            ],
            [
                'marketing_id' => 3,
                'date' => '2023-06-01',
                'cargo_fee' => $cargoFee = 0,
                'total_balance' => $totalBalance =  75_000_000,
                'grand_total' => $totalBalance + $cargoFee,
            ],
            [
                'marketing_id' => 2,
                'date' => '2023-06-01',
                'cargo_fee' => $cargoFee = 0,
                'total_balance' => $totalBalance =  750_020_000,
                'grand_total' => $totalBalance + $cargoFee,
            ],
            [
                'marketing_id' => 3,
                'date' => '2023-06-01',
                'cargo_fee' => $cargoFee = 0,
                'total_balance' => $totalBalance =  130_000_000,
                'grand_total' => $totalBalance + $cargoFee,
            ],
        ])->each(fn ($penjualan) => Penjualan::create($penjualan));
    }
}
