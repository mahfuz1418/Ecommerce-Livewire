<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class CartComponent extends Component
{

    public function increaseQty($rowId)
    {
        $cart_item = Cart::instance('cart')->get($rowId);
        $increment = $cart_item->qty + 1;
        Cart::instance('cart')->update($rowId, ['qty' => $increment]);
        $this->dispatch('increased_quantity');
    }

    public function decreaseQty($rowId)
    {
        $cart_item = Cart::instance('cart')->get($rowId);
        $decrement = $cart_item->qty - 1;
        Cart::instance('cart')->update($rowId, ['qty' => $decrement]);
        $this->dispatch('decreased_quantity');
    }

    public function removeItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);

        flash()->success('Cart Item Removed.');
        $this->dispatch('remove_item');

    }

    public function removeAll()
    {
        Cart::instance('cart')->destroy();

        flash()->success('All Cart Items Removed.');
        $this->dispatch('remove_all_items');

    }

    #[On('remove_item_two')]
    public function render()
    {
        return view('livewire.cart-component');
    }
}
