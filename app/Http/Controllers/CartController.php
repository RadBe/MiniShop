<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Services\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Cart $cart)
    {
        $result = [];
        $sum = 0;

        if (!$cart->isEmpty()) {
            $products = Product::enabled()->find($cart->getProductIds());
            foreach ($products as $product)
            {
                $amount = $cart->getAmount($product->id);
                $product->_cartAmount = $amount;
                if ($product->amount - $product->reserved >= $amount) {
                    $sum += ($amount / $product->weight) * $product->price;
                }
                $result[] = $product;
            }
        }

        return view('cart', [
            'products' => $result,
            'sum' => $sum
        ]);
    }

    public function add(Request $request, Product $product, Cart $cart)
    {
        $this->validate($request, [
            'amount' => 'required|integer|min:' . $product->weight . '|max:' . ($product->amount - $product->reserved)
        ]);

        if (!$product->isBuyable()) {
            return back()->withErrors('К сожалению, товар закончился.');
        }

        $amount = (int) $request->post('amount');
        if ($amount % $product->weight !== 0) {
            return back()->withErrors('Выбрано неправильное количество товара.');
        }

        $cart->put($product->id, $amount);
        $cart->save();

        return back();
    }

    public function remove(Product $product, Cart $cart)
    {
        $cart->remove($product->id);
        $cart->save();

        return back();
    }

    public function clear(Cart $cart)
    {
        $cart->clear();
        $cart->save();

        return back();
    }

    public function order(OrderRequest $request, Cart $cart)
    {
        if ($cart->isEmpty()) {
            return back()->withErrors('Корзина пуста!');
        }

        $productsList = [];
        $products = Product::enabled()->find($cart->getProductIds());
        foreach ($products as $product)
        {
            $amount = $cart->getAmount($product->id);
            if ($product->amount - $product->reserved >= $amount && $amount % $product->weight === 0) {
                $price = ($amount / $product->weight) * $product->price;
                $productsList[] = [$product, $amount, $price];
            }
        }

        if (empty($productsList)) {
            return back();
        }

        $order = new Order($request->validated());
        $order->save();

        foreach ($productsList as $item)
        {
            [$product, $amount, $price] = $item;

            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product->id;
            $orderProduct->amount = $amount;
            $orderProduct->price = $price;
            $orderProduct->save();
        }

        $cart->clear();
        $cart->save();

        return back();
    }
}
