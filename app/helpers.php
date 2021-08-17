<?php

use App\Models\Size;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

//calculate stock of product
function quantity($product_id, $color_id = null, $size_id = null)
{
    $product = Product::find($product_id);

    if ($size_id) {
        $size = Size::find($size_id);

        $quantity = $size->colors->find($color_id)->pivot->quantity;
    } elseif ($color_id) {
        $quantity = $product->colors->find($color_id)->pivot->quantity;
    } else {
        $quantity = $product->quantity;
    }

    return $quantity;
}

//calculate total of added items
function qty_added($product_id, $color_id = null, $size_id = null)
{
    $cart = Cart::content();

    $item = $cart->where('id', $product_id)->where('options.color_id', $color_id)
        ->where('options.size_id', $size_id)->first();

    if ($item) {
        return $item->qty;
    } else {
        return 0;
    }
}

function qty_available($product_id, $color_id = null, $size_id = null)
{
    return quantity($product_id, $color_id, $size_id) - qty_added($product_id, $color_id, $size_id);
}
