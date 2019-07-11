<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('carts.index', compact('carts', $carts));
    }

    public function count()
    {
        $cartCount = Cart::where('user_id', Auth::user()->id)->sum('quantity');
        return response()->json([
            'cartCount' => $cartCount != null ? $cartCount : 0
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $productId = $request->get('product_id');

        $cart = Cart::where('product_id', '=', $productId)
            ->where('user_id', '=', $user->id)
            ->first();
        if (!$cart) {
            $cart = new Cart();
            $cart->quantity += 1;
            $product = Product::find($productId);
            $cart->user()->associate($user);
            $cart->product_name = $product->name;
            $cart->product_id = $product->id;
            $cart->product_price = $product->price;
            $cart->product_image_url = $product->images()->first()->image_src;
            $cart->total = $cart->quantity * $product->price;
            $cart->save();
        } else {
            $cart->quantity += 1;
            $cart->update();
        }
        return redirect('carts')->with('success', 'Product added to cart successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cart = Cart::findOrFail($request->get('id'));
        $cart->quantity = $request->get('quantity');
        $cart->total = $cart->quantity * $cart->product_price;
        $cart->update();
        return response()->json([
            'success' => 'Cart successfully updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return response()->json([
            'success' => 'Cart successfully deleted!'
        ]);
    }
}
