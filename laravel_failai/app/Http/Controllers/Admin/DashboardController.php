<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Managers\DashboardManager;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct(protected DashboardManager $manager){

    }
    public function __invoke()
    {
        $latestOrders=$this->manager->getOrders();
        $latestProducts=$this->manager->getProducts();
        $latestUsers=$this->manager->getUsers();

        return view('admin.dashboard', compact('latestOrders', 'latestProducts', 'latestUsers'));
    }
}
