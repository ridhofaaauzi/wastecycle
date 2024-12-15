<?php

namespace App\Http\Controllers;

use App\Models\TransactionWaste;
use Illuminate\Http\Request;

class TransactionWasteController extends Controller
{
    public function index()
    {
        $transactionWastes = TransactionWaste::latest()->get();
        return view('admin.penukaranSampah.index', compact('transactionWastes'));
    }
}