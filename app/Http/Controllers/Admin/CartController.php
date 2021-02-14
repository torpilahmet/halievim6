<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\CartDetails;
use App\Model\Customer;
use App\Model\Dimension;
use App\Model\Order;
use App\Model\Product;
use Illuminate\Http\Request;
use Cart;
use Session;
use Illuminate\Support\Str;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $carts = Cart::session(1603367916)->getContent();

        return view('admin.carts.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
{

    $products = Product::all('id', 'sku');
    $dimensions = Dimension::all('id', 'name');
    $customers = Customer::all();

    return view('admin.carts.create', compact('products', 'dimensions', 'customers', 'order'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::find($request->order_id);

//        return $request;
//        return $order;

        $cartCollection = Cart::session($order->session_id)->getContent();
        $id =Str::random(8);
        $dimension = Dimension::find($request->dimension_id);
        $product = Product::find($request->product_id);

        Cart::session($order->session_id)->add(array(
            'id' =>  $id,
            'name' => $product->sku,
            'price' => $dimension->price,
            'quantity' => $request->piece,
            'attributes' => array(
                'dimension' => $dimension->name,
            ),
            'associatedModel' => $product
        ));

        $item = Cart::get($id);

        $cart_detail = new CartDetails;

        $cart_detail->order_id = $order->id;
        $cart_detail->product = $product->sku;
        $cart_detail->dimension = $dimension->name;
        $cart_detail->price = $dimension->price;
        $cart_detail->piece = $request->piece;
        $cart_detail->product_data = $item->associatedModel;

        $cart_detail->save();

        $order->update(['total_price'=>Cart::getTotal()]);

//        return $cartCollection;
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
    public function update(Request $request, $id)
    {
//        return $request;
        $order = Order::find($request->order_id);

        $session_id = $order->session_id;
        if ($request->piece >= 1) {
            Cart::session($session_id)->update($id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->piece
                ),
            ));
        } else {
            Cart::session($session_id)->remove($id);
        }
        Cart::session($session_id)->getContent();
        $order->update(['total_price'=>Cart::getTotal()]);

        return redirect()->route('admin.orders.show', $order->id)->with('success', 'Sipariş adedi değiştirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $order = Order::where('session_id',$request->session_id);
        Cart::session($request->session_id)->remove($id);
        $order->update(['total_price'=>Cart::getTotal()]);
        return redirect()->back()->with('success', 'Sipariş adedi değiştirildi');
    }

    public function export()
    {

    }
}
