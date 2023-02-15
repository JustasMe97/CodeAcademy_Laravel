<?php

namespace App\Managers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;

class OrderManager
{
    public function createOrder(OrderRequest $request): Order
    {
        $order = Order::create($request->all()
            + [
                'status_id' => Status::query()->where(['type' => 'order', 'name' => 'Naujas'])->first()->id,
            ]);

        return $order;
    }
    public function getOrders(): Collection
    {
        $orders = Order::query()->get();

        return $orders;
    }
    public function updateOrder(OrderRequest $request, Order $order): Order
    {
        $order->update($request->all());

        return $order;
    }
    public function deleteOrder(Order $order): void
    {
        $order->delete();
    }

    public function getLatestOrders(): Collection
    {
        $orders = Order::latest()->take(5)->get();
        return $orders;
    }
}
