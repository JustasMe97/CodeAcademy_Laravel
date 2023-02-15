<?php

namespace App\Managers;

use Illuminate\Database\Eloquent\Collection;

class DashboardManager
{
    public function __construct(
        protected OrderManager $orderManager,
        protected ProductManager $productManager,
        protected UserManager $userManager
    ) {
    }

    public function getOrders(): Collection
    {
        $orders = $this->orderManager->getLatestOrders();
        return $orders;
    }

    public function getProducts(): Collection
    {
        $products = $this->productManager->getLatestProducts();
        return $products;
    }

    public function getUsers(): Collection
    {
        $users = $this->userManager->getLatestUsers();
        return $users;
    }
}
