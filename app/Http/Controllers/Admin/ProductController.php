<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::paginate(10);
        $sortingBy = $request->input('sortingBy');
        if ($sortingBy == 'best_seller') {
            $products = Product::where(['user_id' => Auth::user()->id])
                ->withCount('review')->orderBy('review_count', 'desc')
                ->paginate(10);
        } elseif ($sortingBy == 'terbaik') {
            $products = Product::where(['user_id' => Auth::user()->id])
                ->orderBy('sold', 'desc')
                ->paginate(10);
        } elseif ($sortingBy == 'termurah') {
            $products = Product::where(['user_id' => Auth::user()->id])
                ->orderBy('price', 'asc')
                ->paginate(10);
        } elseif ($sortingBy == 'termahal') {
            $products = Product::where(['user_id' => Auth::user()->id])
                ->orderBy('price', 'desc')
                ->paginate(10);
        } elseif ($sortingBy == 'terbaru') {
            $products = Product::where(['user_id' => Auth::user()->id])
                ->orderBy('created_at', 'desc')
                ->paginate(10);

        }
        if ($request->ajax()) {
            return view('admin.products.index', compact('products'))->renderSections()['content'];
        } else {
            return view('admin.products.index', compact('products'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);
        $product = new Product();
        $product->user_id = Auth::user()->id;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->description = $request->input('description');

        $product->save();
        $category = $request->input('category');
        $product->category()->attach($category);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $image = new Image();
                $image->image_src = $file->getClientOriginalName();
                $product->images()->save($image);
                $file->move(public_path() . '/images', $image->image_src);
            }
        }
        return redirect('admin/products')->with('success', 'Produk berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //fungsi show sesuai id yang di pilih
        $products = Product::find($id);

        return view('admin.products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //fungsi edit untuk mengambil data ecommerce sesuai id yang dipilih
        $categories = Category::all();
        $products = Product::find($id);
        return view('admin.products.edit', compact('categories', 'products'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //fungsi update berdasarkan id
        $this->validate(request(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);
        $product = Product::findOrFail($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->category()->sync($request->get('category'));
        $product->save();
        if ($request->hasFile('images')) {
            $product->images()->delete();
            foreach ($request->file('images') as $file) {
                $image = new Image();
                $image->image_src = $file->getClientOriginalName();
                $product->images()->save($image);
                $file->move(public_path() . '/images', $image->image_src);
            }
        }
        return redirect('admin/products')->with('success', 'Produk berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //fungsi delete berdasarkan id
        $product = Product::find($id);
        $product->delete();

        return redirect('admin/products')->with('success', 'Produk berhasil di hapus');
    }
}
