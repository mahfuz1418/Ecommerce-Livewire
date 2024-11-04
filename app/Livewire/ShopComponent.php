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
    public $min_price = 0;
    public $max_price = 1000;

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
            $products = Product::whereBetween('selling_price', [$this->min_price, $this->max_price])->orderBy('selling_price', 'asc')->paginate($this->perPage);
        } elseif ($this->orderBy === 'Price: High to Low') {
            $products = Product::whereBetween('selling_price', [$this->min_price, $this->max_price])->orderBy('selling_price', 'desc')->paginate($this->perPage);
        } elseif ($this->orderBy === 'Newest Product') {
            $products = Product::whereBetween('selling_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'desc')->paginate($this->perPage);
        } else {
            $products = Product::whereBetween('selling_price', [$this->min_price, $this->max_price])->paginate($this->perPage);
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
