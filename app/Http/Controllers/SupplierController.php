<?php

// app/Http/Controllers/SupplierController.php
namespace App\Http\Controllers;

use App\Models\Leverancier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $supplierTypes = Leverancier::select('leverancier_type')->distinct()->pluck('leverancier_type');
        $query = Leverancier::with('contacts');

        if ($request->has('leverancier_type') && $request->leverancier_type != '') {
            $query->where('leverancier_type', $request->leverancier_type);
        }

        $leveranciers = $query->get();

        return view('suppliers.index', compact('leveranciers', 'supplierTypes'));
    }
}
