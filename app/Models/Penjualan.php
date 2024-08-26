<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;

    public static function generateTransactionNumber()
    {
        $lastTransaction = self::latest('transaction_number')->first();

        if (!$lastTransaction) {
            return 'TRX001';
        }

        $lastNumber = (int)substr($lastTransaction->transaction_number, 3);
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        return "TRX$newNumber";
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->transaction_number ??= self::generateTransactionNumber();
        });
    }

    protected $table = 'penjualan';

    protected $guarded = [];

    public function marketing(): BelongsTo
    {
        return $this->belongsTo(Marketing::class, 'marketing_id');
    }
}
