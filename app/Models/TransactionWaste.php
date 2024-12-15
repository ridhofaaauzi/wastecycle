<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionWaste extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pengambilan',
        'berat_sampah',
        'total_poin',
        'catatan',
        'user_id',
        'waste_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function waste()
    {
        return $this->belongsTo(Waste::class);
    }
}