<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with('bus')->get();

        return view('user.home', compact('jadwal'));
    }
}
