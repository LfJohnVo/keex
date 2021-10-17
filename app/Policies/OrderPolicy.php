<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Order $order){
        if ($order->user_id == $user->id) {
            return true;
        }else{
            return false;
        }
    }

    public function payment(User $user, Order $order){
        if ($order->status == 1) {
            return true;
        }else{
            return false;
        }
    }
}
