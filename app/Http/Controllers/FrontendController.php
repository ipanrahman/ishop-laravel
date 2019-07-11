<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('web', compact('categories', $categories), compact('products',$products));
    }
}
