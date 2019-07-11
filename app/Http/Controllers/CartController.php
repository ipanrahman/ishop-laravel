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
        $cart = Cart::where('user_id', Auth::user()->id)->with('products')->first();
        if ($cart) {
            return view('carts.index', compact('cart', $cart));
        } else {
            return abort(404);
        }
    }

    public function count()
    {
        $cartCount = Cart::where('user_id', Auth::user()->id)->with('products')->count();
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
        $cart = Cart::where('user_id', $user->id)->with('products')->first();
        $product = Product::find($request->get('product_id'));
        if (!$cart) {
            $cart = new Cart();
            $cart->user()->associate($user);
            $cart->products()->save($product);
            $cart->quantity = $cart->quantity + 1;
            $cart->save();
        } else {
            $cart->products()->save($product);
            $cart->quantity = $cart->quantity + 1;
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
