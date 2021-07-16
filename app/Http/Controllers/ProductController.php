<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        $data = Product::all();
        return view('product', ['products' => $data]);
    }

    function detail($id)
    {
        $product = Product::find($id);
        return view('detail', ['product' => $product]);
    }

    function addToCart(Request $req)
    {
        if ($req->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')->id;
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('');
        }
        return redirect('login');
    }

    static function cartItem()
    {
        $user_id = Session::get('user')->id;
        return Cart::where('user_id', $user_id)->count();
    }

    function cartList()
    {
        $user_id = Session::get('user')->id;
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $user_id)
            ->select('products.*', 'cart.id as cart_id')
            ->get();

        return view('cartlist', ['products' => $products]);
    }

    function remove($id)
    {
        Cart::destroy($id);
        return redirect('cart-list');
    }

    function checkout()
    {
        $user_id = Session::get('user')->id;
        $sum = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $user_id)
            ->select('products.*', 'cart.id as cart_id')
            ->sum('products.price');
        return view('checkout', ['total' => $sum]);
    }

    function order(Request $req)
    {
        $userID = Session::get('user')->id;
        $cart = Cart::where('user_id', $userID)->get();
        foreach ($cart as $cartitem) {
            $order = new Order;
            $order->product_id = $cartitem->product_id;
            $order->user_id = $cartitem->user_id;
            $order->status = 'pending';
            $order->payment_method = $req->payment;
            $order->payment_status = 'pending';
            $order->address = $req->address;
            $order->save();
            $cart = Cart::where('user_id', $userID)->delete();
        }
        return redirect('/');
    }

    function orderList()
    {
        $user_id = Session::get('user')->id;
        $products = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $user_id)
            ->get();
        return view('orderlist', ['products' => $products]);
    }

    function cancel($id)
    {
        $userID = Session::get('user')->id;
        $order = Order::where('user_id', $userID)->where('product_id', $id);
        $order->delete();
        return redirect('order-list');
    }
}
