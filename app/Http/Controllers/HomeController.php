<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::paginate(24);
        $category = Category::all();
        $filter_category = $request->get('filter_category');
        if ($filter_category) {
            $product = Product::with('category')->whereHas('category', function ($a) use ($filter_category) {
                $a->where('category_id', $filter_category);
            })->paginate(10);
        }
        $sorting = $request->get('sorting');
        if ($sorting == "best_seller") {
            $product = Product::withCount('review')->orderBy("review_count", "desc")
                ->paginate(10);
        } elseif ($sorting == "terbaik") {
            $product = Product::orderBy("sold", "desc")
                ->paginate(10);
        } elseif ($sorting == "termurah") {
            $product = Product::orderBy('price', 'asc')
                ->paginate(10);
        } elseif ($sorting == "termahal") {
            $product = Product::orderBy('price', 'desc')
                ->paginate(10);
        } elseif ($sorting == "terbaru") {
            $product = Product::orderBy('created_at', 'desc')
                ->paginate(10);
        } elseif ($sorting == 'dilihat') {
            $product = Product::where(['user_id' => Auth::user()->id])
                ->orderBy('view_count', 'desc')
                ->paginate(10);
        }
        if ($request->ajax()) {
            return view('home', compact('category', 'product'))->renderSections()['content'];
        } else {
            return view('home', compact('category', 'product'));
        }
    }
}
