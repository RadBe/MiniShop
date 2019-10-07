<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Список заказов.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order.index', [
            'orders' => Order::with('products')->paginate(50),
            'calcSum' => function (Order $order) {
                $sum = 0;
                foreach ($order->products as $product)
                {
                    $sum += $product->pivot->price;
                }

                return $sum;
            }
        ]);
    }

    public function show(Order $order)
    {
        return view('admin.order.show', [
            'order' => $order
        ]);
    }

    public function approve(Order $order)
    {
        if ($order->status != Order::STATUS_WAIT) {
            return back();
        }

        $order->status = Order::STATUS_APPROVED;
        foreach ($order->products as $product)
        {
            $product->reserved += $product->pivot->amount;
            $product->update();
        }

        $order->update();

        return back()->with('success_message', 'Заказ был подтвержден.');
    }

    public function done(Order $order)
    {
        if ($order->status == Order::STATUS_DONE) {
            return back();
        }

        $order->status = Order::STATUS_DONE;
        foreach ($order->products as $product)
        {
            $product->amount -= $product->pivot->amount;
            $product->reserved -= $product->pivot->amount;
            $product->buy_count += $product->pivot->amount;
            $product->update();
        }

        $order->update();

        return back()->with('success_message', 'Заказ был выполнен.');
    }

    public function remove(Order $order)
    {
        if ($order->status == Order::STATUS_DONE) {
            return back();
        }

        if ($order->status == Order::STATUS_APPROVED) {
            foreach ($order->products as $product)
            {
                $product->reserved -= $product->pivot->amount;
                $product->update();
            }
        }

        $order->delete();

        return redirect()->route('admin.order.index')->with('success_message', 'Заказ был удален.');
    }
}
