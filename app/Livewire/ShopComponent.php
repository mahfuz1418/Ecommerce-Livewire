<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;


    public function render()
    {
        $categories = Category::latest()->get();
        $products = Product::paginate(12);
        $nproducts = Product::latest()->take(3)->get();

        return view('livewire.shop-component', [
            'categories' => $categories,
            'products' => $products,
            'nproducts' => $nproducts,
        ]);
    }
}
