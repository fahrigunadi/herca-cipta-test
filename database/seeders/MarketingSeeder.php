<?php

namespace Database\Seeders;

use App\Models\Marketing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'Alfandy',
            ],
            [
                'name' => 'Mery',
            ],
            [
                'name' => 'Danang',
            ],
        ])->each(fn ($marketing) => Marketing::create($marketing));
    }
}
