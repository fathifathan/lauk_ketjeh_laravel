<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $all_product = DB::table('menu')->get()->map(function ($item) {
            if (isset($item->product_img) && $item->product_img) {
                $item->image_src = 'data:image/jpeg;base64,' . base64_encode($item->product_img);
            } else {
                $item->image_src = asset('img/placeholder.png');
            }
            return $item;
        });

        $cart_count = session('cart_count', 0);

        return view('home', compact('all_product', 'cart_count'));
    }
}