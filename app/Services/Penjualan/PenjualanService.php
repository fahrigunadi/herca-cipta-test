<?php

namespace App\Services\Penjualan;

use Carbon\Carbon;
use App\Models\Penjualan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

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

    public function dataKomisiPenjualan()
    {
        $komisi = Penjualan::query()
            ->select(
                DB::raw('marketing_id'),
                DB::raw('DATE_FORMAT(date, "%Y-%m") as month'),
                DB::raw('SUM(grand_total) as omzet'),
            )
            ->with('marketing')
            ->groupBy('marketing_id', 'month')
            ->orderBy('month')
            ->orderBy('marketing_id')
            ->get();

        $result = $komisi->map(function ($item) {
            $pecentage = $this->getCommissionPersentage($item->omzet);
            $commission = $this->getCommission($item->omzet, $pecentage);

            return [
                'marketing' => $item->marketing->name,
                'month' => Carbon::parse($item->month)->format('F Y'),
                'omzet' => number_format($item->omzet, 0, ',', '.'),
                'commission_percentage' => $pecentage,
                'commission' => number_format($commission, 0, ',', '.'),
            ];
        });

        return [
            'komisi' => $result,
        ];
    }

    private function getCommissionPersentage(int $omzet): float
    {
        return match (true) {
            $omzet <= 100_000_000 => 0,
            $omzet <= 200_000_000 => 2.5,
            $omzet <= 500_000_000 => 5,
            default => 10,
        };
    }

    private function getCommission($omzet, $persentage): int
    {
        if ($persentage === 0) {
            return 0;
        }

        return ($persentage / 100) * $omzet;
    }

    public function dataIndexPembayaran(Penjualan $penjualan): array
    {
        $pembayaran = $penjualan->pembayaran;
        $totalPaid = $pembayaran->sum('amount_paid');
        $remainingBalance = $pembayaran->last()->remaining_balance ?? $penjualan->grand_total;

        return [
            'marketing' => $penjualan->marketing?->name,
            'total_paid' => $totalPaid,
            'remaining_balance' => $remainingBalance,
            'penjualan' => $penjualan->withoutRelations(),
            'details' => $penjualan->pembayaran()->get(),
        ];
    }

    public function storePembayaran(Penjualan $penjualan, int $amountPaid): Pembayaran
    {
        DB::beginTransaction();
        try {
            Penjualan::where('id', $penjualan->id)->lockForUpdate()->first();

            $remainingBalance = $penjualan->grand_total - ($amountPaid + $penjualan->pembayaran()->sum('amount_paid'));

            if ($remainingBalance < 0 && $remainingBalance + $amountPaid < 0) {
                throw ValidationException::withMessages([
                    'amount_paid' => 'Jumlah pembayaran melebihi total penjualan',
                ]);
            }

            $pembayaran = $penjualan->pembayaran()->create([
                'payment_date' => now()->toDateTimeString(),
                'amount_paid' => $amountPaid,
                'remaining_balance' => $remainingBalance,
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            throw_if($th instanceof ValidationException, $th);

            abort(500);
        }

        return $pembayaran;
    }
}
