<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class CarticonComponent extends Component
{

    public function destory($rowId){
        Cart::instance('cart')->remove($rowId);
        flash()->success('Cart Item Removed.');
        $this->dispatch('remove_item_two');
    }

    #[On('increased_quantity')]
    #[On('decreased_quantity')]
    #[On('remove_item')]
    #[On('remove_all_items')]
    public function render()
    {
        return view('livewire.carticon-component');
    }
}
