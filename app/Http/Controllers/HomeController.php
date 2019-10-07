<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'products' => Product::with('category')->enabled()->latest('id')->paginate(30),
            'cart' => session()->get('cart', []),
            'reviews' => Review::random(3)->get()
        ]);
    }
}
