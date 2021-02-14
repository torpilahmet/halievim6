<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Customer;
use App\Model\Order;
use Illuminate\Http\Request;
use Cart;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::all();
//        $items = Cart::session('1')->getContent();
        $items = Cart::session(1603876218)->get(1);
        $hazirlik = $orders->where('status',1);
        $baski = $orders->where('status',2);
        $kargo = $orders->where('status',3);
        $teslim = $orders->where('status',4);
        $iptal = $orders->where('status',5);
        $customers = Customer::all();
        return view('admin.dashboard',compact('orders', 'hazirlik', 'customers', 'kargo', 'teslim', 'baski', 'iptal'));
    }
}
