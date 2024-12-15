<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;

class penukaranPoinController extends Controller
{
    public function index()
    {
        $rewards = Reward::latest()->get();
        return view('user.penukaranPoin.index', compact('rewards'));
    }
}