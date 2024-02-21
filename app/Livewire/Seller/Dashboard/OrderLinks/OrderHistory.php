<?php

namespace App\Livewire\Seller\Dashboard\OrderLinks;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class OrderHistory extends Component
{
    public function render()
    {
        return view('livewire..seller.dashboard.order-links.order-history');
    }
}
