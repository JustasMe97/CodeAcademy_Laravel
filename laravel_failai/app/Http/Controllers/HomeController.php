<?php

namespace App\Http\Controllers;

use App\Managers\ProductManager;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(protected ProductManager $manager){

    }
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function __invoke(Request $request)
    {
        $products=$this->manager->getLatestProducts();
        return view('welcome',compact('products',));
    }
}
