<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function search(Request $request)
    {
        $qSearch = $request->query('q');
        $qType = $request->query('qType');

        $products = Product::where('name', 'ILIKE', '%' . $qSearch . '%')->paginate(10);
        if ($qType == 'best_seller') {
            $products = Product::count('review')->orderBy('review_count', 'desc')->paginate(10);
        } elseif ($qType == 'expensive_product') {

        }
        return view('products.index', compact('products', $products));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product', $product));
    }
}
