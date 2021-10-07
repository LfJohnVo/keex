<?php

use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Livewire\Shoppingcart;
use App\Http\Livewire\CreateOrder;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WebhooksController;
use App\Http\Livewire\PaymentOrder;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', WelcomeController::class);
Route::get('search', SearchController::class)->name('search');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('shopping-cart', Shoppingcart::class)->name('shopping-cart');
Route::get('orders/create', CreateOrder::class)->middleware('auth')->name('orders.create');

Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');

Route::get('orders/{order}/payment', PaymentOrder::class)->name('orders.payment');
Route::get('orders/{order}/pay', [OrderController::class, 'pay'])->name('orders.pay');

Route::post('webhooks', WebhooksController::class);
