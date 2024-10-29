<div>
    <div class="header-action-icon-2">
        <a class="mini-cart-icon" href="{{ route('cart') }}">
            <img alt="Surfside Media" src="{{ asset('assets') }}/imgs/theme/icons/icon-cart.svg">
            <span class="pro-count blue">{{ Cart::instance('cart')->count() }}</span>
        </a>
        <div class="cart-dropdown-wrap cart-dropdown-hm2">
            <ul>
                @forelse (Cart::instance('cart')->content() as $item)
                    <li>
                        <div class="shopping-cart-img">
                            <a href="product-details.html"><img alt="Surfside Media"
                                    src="{{ asset($item->model->image) }}"></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="product-details.html">{{ ucwords(Str::substr($item->model->name, 0, 12)) }}</a></h4>
                            <h4><span>{{ $item->qty }} × </span>${{ $item->subtotal() }}</h4>
                        </div>
                        <div class="shopping-cart-delete">
                            <a wire:click.prevent="destory('{{ $item->rowId }}')"><i class="fi-rs-cross-small"></i></a>
                        </div>
                    </li>
                @empty
                <li>
                    <div class="shopping-cart-title">
                        <h4 >No Cart Item Added</h4>
                    </div>

                </li>
                @endforelse

            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    <h4>Total <span>${{ Cart::instance('cart')->total() }}</span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="{{ route('cart') }}" class="outline">View cart</a>
                    <a href="checkout.html">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
