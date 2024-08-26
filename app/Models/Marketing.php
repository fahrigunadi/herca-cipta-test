<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marketing extends Model
{
    use HasFactory;

    protected $table = 'marketing';
    protected $fillable = ['name'];

    public function penjualan(): HasMany
    {
        return $this->hasMany(Marketing::class, 'marketing_id');
    }
}
