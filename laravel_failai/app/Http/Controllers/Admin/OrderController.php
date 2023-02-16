<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Managers\OrderManager;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct(protected OrderManager $manager)
    {
        $this->authorizeResource(Order::class);
    }
    public function index()
    {
        $orders=$this->manager->getOrders();
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        return view('order.create');
    }

    public function store(OrderRequest $request)
    {
        $order=$this->manager->createOrder($request);
        return redirect()->route('orders.show', $order);
    }

    public function show(Order $order)
    {
        return view('order.show', ['order' => $order]);
    }

    public function edit(Order $order)
    {
        return view('order.edit', compact('order'));
    }

    public function update(OrderRequest $request, Order $order)
    {
        $order=$this->manager->updateOrder($request,$order);
        return redirect()->route('orders.show', $order);
    }

    public function destroy(Order $order)
    {
        $this->manager->deleteOrder($order);
        return redirect()->route('orders.index');
    }
}
