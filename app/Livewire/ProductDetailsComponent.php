<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductDetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function addToCart($product){
        $product_id = $product['id'];
        $product_name = $product['name'];
        $product_price = $product['price'];


        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');

        flash()->success('Cart Item Added.');
        return redirect()->route('cart');
    }

    public function render()
    {
        $product_details = Product::where('slug', $this->slug)->first();

        $image = $product_details->image;
        $images = json_decode($product_details->images);
        array_splice($images, 0, 0, $image);

        $related_products = Product::where('category_id', $product_details->category_id)->get();
        $categories = Category::latest()->get();
        $nproducts = Product::latest()->take(3)->get();


        return view('livewire.product-details-component',[
            'product_details' => $product_details,
            'related_products' => $related_products,
            'categories' => $categories,
            'nproducts' => $nproducts,
            'images' => $images,
        ]);
    }
}
