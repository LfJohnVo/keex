<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class PaymentOrder extends Component
{
    public $order;

    protected $listeners = ['payOrder'];

    public function payOrder()
    {
        $this->order->status = 2;
        $this->order->save();

        return redirect()->route('orders.show', $this->order);
    }

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        $items = json_decode($this->order->content);

        return view('livewire.payment-order', compact('items'));
    }
}
