<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::where('user_id', '=', Auth::user()->id)->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = session()->get('cart');
        if($cart)
        {
            return view('admin.orders.create');
        }
        else
        {
            return redirect('public')->with('success','Anda harus belanja terlebih dahulu');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cart = session()->get('cart');
        $total_price = 0;
        foreach($cart as $id => $product)
        {
            $total_price += $product['price'] * $product['quantity'];
        }
        
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->status = 'PENDING';
        $order->total_price = $request->input('total_price');
        $order->name = $request->input('name');
        $order->telp = $request->input('telp');
        $order->address = $request->input('address');
        $order->kec = $request->input('kec');
        $order->city = $request->input('city');
        $order->province = $request->input('province');
        $order->zip = $request->input('zip');
        $order->total_price = $total_price;
        $order->save();
        foreach($cart as $id => $product)
        {
            $s = 0;
            $sold = $product['stock'];
            $totalSold = $sold - $product['quantity'];
            $p = Product::findOrFail($id);
            $p->sold = $totalSold;
            $p->save();
        }
        foreach($cart as $id => $product)
        {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $id;
            $orderItem->quantity = $product['quantity'];
            $orderItem->price = $product['price'];
            $orderItem->save();
        }

        session()->forget('cart');

        return redirect('admin/orders/' . $order->id)->with('success','Order berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        if($order)
        {
            return view('admin.orders.show',compact('order'));
        }
        else
        {
            return redirect('admin/orders/')->with('errors','Order tidak ditemukan');
        }

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
