<?php

namespace App\Http\Controllers;

use App\Models\Leverancier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $leveranciers = Leverancier::all();
        return view('suppliers.homepage', compact('leveranciers'));
    }
}
