<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function about()
    {
        return view('user.tentangKami.index');
    }
    public function contact()
    {
        return view('user.kontakKami.index');
    }
}