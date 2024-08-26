<?php

namespace App\Services\Penjualan;
use App\Models\Penjualan;

class PenjualanService
{
    public function dataIndex(?string $search = null): array
    {
        $penjualan = Penjualan::when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->whereRelation('marketing', 'name', 'like', "%{$search}%")
                        ->orWhere('transaction_number', 'like', "%{$search}%")
                        ->orWhere('date', 'like', "%{$search}%")
                        ->orWhere('cargo_fee', 'like', "%{$search}%")
                        ->orWhere('total_balance', 'like', "%{$search}%")
                        ->orWhere('grand_total', 'like', "%{$search}%");
                });
            })
            ->with(['marketing' => fn ($query) => $query->select('id', 'name')])
            ->paginate(10)
            ->withQueryString();

        $penjualan->map(function ($penjualan) {
            $penjualan->cargo_fee = number_format($penjualan->cargo_fee, 0, ',', '.');
            $penjualan->total_balance = number_format($penjualan->total_balance, 0, ',', '.');
            $penjualan->grand_total = number_format($penjualan->grand_total, 0, ',', '.');
        });

        return [
            'penjualan' => $penjualan,
        ];
    }
}
