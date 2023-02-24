<?php

namespace App\Managers;

use App\Http\Requests\CartRequest;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Repositories\OrderDetailsRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\Type\Integer;

class CartManager
{
    public function __construct(protected ProductsRepository $productsRepository,
    protected OrderDetailsRepository $orderDetailsRepository)
    {

    }
    public function createOrUpdateCart(CartRequest $request): OrderDetails
    {
        $data = $request->all();
        $user = auth()->user();         // Siuo metu prisijunges vartotojas

        // Paimame vartotojo paskutinį krepšelį ir priskiriam i masyva saugojimui
        $data['order_id'] = $user->getLatestCart()->id;


//        $product = Product::find($request->product_id);
        $product=$this->productsRepository->getById($request->product_id);


        $data['product_name'] = $product->name;    // Paimame produkto pavadinima ir priskiriam i masyva saugojimui
        $data['price'] = $product->price;   // Paimame produkto kaina ir priskiriam i masyva saugojimui

//        $cart = OrderDetails::where([
//            'order_id' => $user->getLatestCart()->id,
//            'product_name' => $product->name,
//            'product_id' => $product->id
//        ])->get()->last();
        $cart=$this->orderDetailsRepository->where(
            'product_id', $product->id)->where(
            'order_id', $user->getLatestCart()->id)->get()->last();
        if ($cart != null) {
            switch ($request->action) {
                case 'subtract':
                    $cart->quantity -= $request->quantity;
                    $cart->save();
                    break;
                case 'change':
                    $cart->quantity = $request->quantity;
                    $cart->save();
                    break;
                default:
                    $cart->quantity += $request->quantity;
                    $cart->save();
                    break;
            }
        } else {
            $cart = OrderDetails::create($data);
        }
        return $cart;
    }
//    public function getOrders(): Collection
//    {
//        $orders = Order::query()->get();
//
//        return $orders;
//    }
//    public function updateOrder(OrderRequest $request, Order $order): Order
//    {
//        $order->update($request->all());
//
//        return $order;
//    }
//    public function deleteOrder(Order $order): void
//    {
//        $order->delete();
//    }
//
//    public function getLatestOrders(): Collection
//    {
//        $orders = Order::latest()->take(5)->get();
//        return $orders;
//    }
    public function getCartItemsWithTotals(): Collection
    {
        $user = auth()->user();
        $cartItems = OrderDetails::query()->where(['order_id' => $user->getLatestCart()->id])->get();
        foreach ($cartItems as $item) {
            $item['total'] = $item->price * $item->quantity;
        }
        return $cartItems;
    }

    public function getCartTotals(): array
    {
        $user = auth()->user();         // Siuo metu prisijunges vartotojas

        // Paimame vartotojo paskutinį krepšelį ir priskiriam i masyva saugojimui
        $cartItems = OrderDetails::where([
            'order_id' => $user->getLatestCart()->id,
        ])->get();
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item->price * $item->quantity;
        }

        $taxes = $totalPrice * 0.21;
        $totalPriceBeforeTaxes = $totalPrice - $taxes;
        return ['totalPrice' => $totalPrice, 'taxes' => $taxes, 'totalPriceBeforeTaxes' => $totalPriceBeforeTaxes];
    }
    public function getItemsCount(): int
    {
        return count($this->getCartItemsWithTotals());
    }
    public function deleteCartItem(OrderDetails $item){
        $item->delete();
    }
}
