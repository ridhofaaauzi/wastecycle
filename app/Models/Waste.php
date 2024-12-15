<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_sampah',
        'poin',
        'image',
    ];

    public function transactionWaste()
    {
        return $this->hasMany(TransactionWaste::class)->latest();
    }
}