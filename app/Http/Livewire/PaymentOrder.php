<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PaymentOrder extends Component
{
    use AuthorizesRequests;

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
        $this->authorize('author', $this->order);
        $this->authorize('payment', $this->order);

        $items = json_decode($this->order->content);

        return view('livewire.payment-order', compact('items'));
    }
}
