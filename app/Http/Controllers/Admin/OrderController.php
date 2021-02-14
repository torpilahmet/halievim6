<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrder;
use Cart;
use App\Model\Customer;
use App\Model\Dimension;
use App\Model\Order;
use App\Model\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all('id', 'sku');
        $dimensions = Dimension::all('id', 'name');
        $customers = Customer::all();

        return view('admin.orders.create', compact('products', 'dimensions', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder $request)
    {
        $data = $request->all();
        $data['session_id'] = time();

        $order = Order::create($data);
        return redirect()->route('admin.orders.show', $order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = Customer::all();
        $dimensions = Dimension::all();
        $products = Product::all();
        $order = Order::find($id);
//        return $order;
        $carts = Cart::session($order->session_id)->getContent();

        return view('admin.orders.show', compact('order', 'carts', 'customers', 'dimensions', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $products = Product::all('id', 'sku');
        $dimensions = Dimension::all('id', 'name');
        $customers = Customer::all();
        return view('admin.orders.update', compact('order', 'products', 'dimensions', 'customers'));
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
//        return $request;
        $order = Order::find($id);

        $input = $request->except('_token', '_method');
        $order->update($input);

        return redirect()->route('admin.orders.edit', $order->id)->with('success', 'Kayıt Başarıyla Düzenlendi');
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
