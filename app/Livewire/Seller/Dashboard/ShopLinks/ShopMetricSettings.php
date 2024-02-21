<?php

namespace App\Livewire\Seller\Dashboard\ShopLinks;

use App\Models\SellerShopMetrics;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class ShopMetricSettings extends Component
{
    use LivewireAlert;

    #[Validate('required')]
    public $targetSales;

    #[Locked]
    public $shopMetricsId;

    public $currentTargetSales;


    public function mount()
    {
        $shopMetrics = User::findOrFail(Auth::user()->id)->seller->shopMetrics->first() ?? 0;

        $this->shopMetricsId = $shopMetrics->id;

        // dd($shopMetrics->target_sales);
        $this->currentTargetSales = $shopMetrics->target_sales ?? 0;
    }

    public function render()
    {
        return view('livewire.seller.dashboard.shop-links.shop-metric-settings');
    }

    public function submit()
    {
        $validator = $this->validate([
            'targetSales' => 'required',
        ]);

        // dd($this->shopMetricsId);

        $shopMetyricsUpdate = SellerShopMetrics::findOrFail($this->shopMetricsId);

        try {
            $shopMetyricsUpdate->update([
                'target_sales' => $this->targetSales,
            ]);

            $this->alert('success', 'Shop Target Sales Metrics Updated', [
                'position' => 'center',
                'toast' => false,
            ]);

            $this->mount();

        } catch (Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }
}
