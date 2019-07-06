<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('carts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        $product = Product::with('images')->find($id);
        if(!$product)
        {
            abort(404);
        }

        $cart = session()->get('cart');

        if(!$cart)
        {
            $cart = 
            [
                $id =>
                [
                    "name" => $product->name,
                    "quantity" => 1,
                    "stock"=> $product->stock,
                    "sold" => $product->sold,
                    "price" => $product->price,
                    "image_url" => $product->images()->first()->image_src
                ]
            ];

            session()->put('cart',$cart);

            return redirect('carts')->with('success','Product added to cart successfully!');
        }

        if(isset($cart[$id]))
        {
            $cart[$id]['quantity']++;
            
            session()->put('cart',$cart);

            return redirect('carts')->with('success','Product added to cart successfully!');
        }

        $cart[$id] =
        [
            "name" => $product->name,
            "quantity" => 1,
            "stock"=> $product->stock,
            "price" => $product->price,
            "sold" => $product->sold,
            "image_url" => $product->images()->first()->image_src
        ];

        session()->put('cart',$cart);

        return redirect('carts')->with('success','Product added to cart successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart',$cart);

            session()->flash('success','Cart updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        if($request->id)
        {
            $cart = session()->get('cart');

            if(isset($cart[$request->id]))
            {
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }

            session()->flash('success','Product removed succesfully');
        }
    }
}
