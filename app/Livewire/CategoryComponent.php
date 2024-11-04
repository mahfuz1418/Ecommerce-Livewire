<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination;

    public $perPage = 12;
    public $orderBy = 'Default Sorting';
    public $min_price = 0;
    public $max_price = 1000;
    public $slug;


    public function productPerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    public function orderedBy($orderBy)
    {
        $this->orderBy = $orderBy;
    }

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $category = Category::where('slug', $this->slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        if ($this->orderBy === 'Price: Low to High') {
            $products = Product::where('category_id', $category_id)->whereBetween('selling_price', [$this->min_price, $this->max_price])->orderBy('selling_price', 'asc')->paginate($this->perPage);
        } elseif ($this->orderBy === 'Price: High to Low') {
            $products = Product::where('category_id', $category_id)->whereBetween('selling_price', [$this->min_price, $this->max_price])->orderBy('selling_price', 'desc')->paginate($this->perPage);
        } elseif ($this->orderBy === 'Newest Product') {
            $products = Product::where('category_id', $category_id)->whereBetween('selling_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'desc')->paginate($this->perPage);
        } else {
            $products = Product::where('category_id', $category_id)->whereBetween('selling_price', [$this->min_price, $this->max_price])->paginate($this->perPage);
        }

        $categories = Category::latest()->get();
        $nproducts = Product::latest()->take(3)->get();

        return view('livewire.category-component', [
            'categories' => $categories,
            'products' => $products,
            'nproducts' => $nproducts,
            'category_name' => $category_name
        ]);
    }
}
