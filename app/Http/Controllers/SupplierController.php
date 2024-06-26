<?php

namespace App\Http\Controllers;

use App\Models\Leverancier;
use App\Models\Product;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $supplierTypes = Leverancier::select('leverancier_type')->distinct()->pluck('leverancier_type');
        $leverancierType = $request->leverancier_type;

        $query = Leverancier::with('contacts');

        if ($leverancierType) {
            $query->where('leverancier_type', $leverancierType)
                ->whereHas('products');
        }

        $leveranciers = $query->get();

        return view('suppliers.index', compact('leveranciers', 'supplierTypes', 'leverancierType'));
    }


    public function showProducts($id)
    {
        $leverancier = Leverancier::with('products')->findOrFail($id);
        return view('suppliers.products', compact('leverancier'));
    }

    public function editProduct($leverancierId, $productId)
    {
        $product = Product::findOrFail($productId);
        return view('suppliers.edit-product', compact('leverancierId', 'product'));
    }

    public function updateProduct(Request $request, $leverancierId, $productId)
    {
        $request->validate([
            'houdbaarheidsdatum' => 'required|date|after_or_equal:today'
        ]);

        $product = Product::findOrFail($productId);
        $newDate = $request->houdbaarheidsdatum;
        $currentDate = $product->houdbaarheidsdatum;

        if (strtotime($newDate) > strtotime($currentDate) + 7 * 24 * 60 * 60) {
            return back()->withErrors(['houdbaarheidsdatum' => 'De houdbaarheidsdatum mag met maximaal 7 dagen worden verlengd']);
        }

        $product->houdbaarheidsdatum = $newDate;
        $product->save();

        return redirect()->route('suppliers.showProducts', $leverancierId)->with('success', 'De houdbaarheidsdatum is gewijzigd');
    }
}
