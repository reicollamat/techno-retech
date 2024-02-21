<?php

namespace App\Livewire\Wishlist;

use App\Models\Bookmark;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[lazy]
class Wishitems extends Component
{
    public string|int|null $user_id;

    public $bookmark;

    public function placeholder()
    {
        return <<<'HTML'
            <div>
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        HTML;
    }

    public function mount($bookmark_id)
    {

        $this->user_id = Auth::id();

        //        $this->bookmark = $bookmark_id->id;

        //        $this->bookmark = Bookmark::where('id', $bookmark_id->id)->get();
        $this->bookmark = Bookmark::where('id', $bookmark_id)->first();

        //
        // dd($this->bookmark);
    }

    public function render()
    {
        //        dd($this->bookmark);
        //        sleep(3);
        return view('livewire..wishlist.wishitems');
    }

    public function remove()
    {
        $this->dispatch('wishlist-item-change');

        $this->dispatch('wishlist-item-remount', id: $this->bookmark->product_id);
    }
}
