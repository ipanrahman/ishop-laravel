<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Review;
use Auth;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Throwable;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws Throwable
     */
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
            return view('public', compact('category', 'product'))->renderSections()['content'];
        } else {
            return view('public', compact('category', 'product'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'rating' => 'required',
            'description' => 'required|max:255',
        ]);
        $review = new Review();
        $review->user_id = Auth::user()->id;
        $review->description = $request->input('description');
        $review->rating = $request->input('rating');
        $review->save();
        $id = $request->get('idproduct');
        $review->product()->attach($id);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $products = Product::findOrFail($id);
        $reviews = Review::all();
        $views = DB::select("UPDATE products SET view_count = view_count + 1 WHERE id=" . $products->id);
        return view('show', compact('products', 'reviews', 'views'));
    }
}
