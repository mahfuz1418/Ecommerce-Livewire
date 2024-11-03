<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;

    public $perPage = 12;
    public $orderBy = 'Default Sorting';

    public function productPerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    public function orderedBy($orderBy)
    {
        $this->orderBy = $orderBy;
    }

    public function render()
    {
        if ($this->orderBy === 'Price: Low to High') {
            $products = Product::orderBy('selling_price', 'asc')->paginate($this->perPage);
        } elseif ($this->orderBy === 'Price: High to Low') {
            $products = Product::orderBy('selling_price', 'desc')->paginate($this->perPage);
        } elseif ($this->orderBy === 'Newest Product') {
            $products = Product::orderBy('created_at', 'desc')->paginate($this->perPage);
        } else {
            $products = Product::paginate($this->perPage);
        }

        $categories = Category::latest()->get();
        $nproducts = Product::latest()->take(3)->get();

        return view('livewire.shop-component', [
            'categories' => $categories,
            'products' => $products,
            'nproducts' => $nproducts,
        ]);
    }
}
