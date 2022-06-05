<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;

class WelcomeController extends Controller
{
    public function __invoke()
    {

        if (auth()->user()) {
            $pendientes = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();
            if ($pendientes) {
                $mensaje = "Usted tiene <span class='font-bold'>$pendientes</span> ordenes pendientes. <a class='px-5 py-3 text-sm font-medium tracking-wider text-purple-100 bg-purple-600 rounded-full shadow-lg hover:shadow-2xl hover:bg-purple-700' href='" . route('orders.index') . "?status=1'>Ir a pagar</a>";
                session()->flash('flash.banner', $mensaje);
            }
        }

        $categories = Category::get();

        return view('welcome', compact('categories'));
    }
}
