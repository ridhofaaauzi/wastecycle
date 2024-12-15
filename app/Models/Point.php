<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_poin',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class)->latest();
    }
}