@extends('layouts.templateBuilder')

@includeIf('layouts.frontend.partials.css')

@section('title', 'Cart | BAZARBAG')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/ui/frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                $cart = session('cart');
                            @endphp
                            
                            @if (is_array($cart))
                            
                                @foreach ($cart as $id => $product)
                                    @php
                                        // Calculate the price based on discount if available
                                        $price = $product['discount'] > 0 ? ($product['price'] - ($product['price'] * $product['discount']) / 100) : $product['price'];
                            
                                        // Update the total based on the calculated price and quantity
                                        $total += $price * $product['quantity'];
                                    @endphp
                                {{-- @if (is_array($cart))
                                    @foreach ($cart as $id => $product)
                                        @php
                                            $total += $product['price'] * $product['quantity'];
                                        @endphp --}}
                                        <tr data-id="{{ $id }}">
                                            <td class="shoping__cart__item">
                                                <img src="{{ asset('storage/' . $product['image']) }}" alt="Product Image">
                                                <p>{{ $product['name'] }}</p>
                                            </td>
                                            <td class="shoping__cart__price" data-th="price">
                                                 <h5>&#2547; {{ $price }}</h5>
                                            </td>
                                            <td class="shoping__cart__quantity" data-th="quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input class="cart__update" type="number" value="{{ $product['quantity'] }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                ৳ {{ $price * $product['quantity'] }}
                                            </td>
                                            <td class="shoping__cart__item__close" data-th="">
                                                <span class="icon_close"></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    {{-- Handle the case when 'cart' is not an array --}}
                                    <tr>
                                        <td colspan="5">Cart is empty.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('shop.index') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="{{ route('cart.index') }}" class="primary-btn cart-btn cart-btn-right"><span
                                class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>৳ {{ $total }}</span></li>
                            <li>Total <span>৳ {{ $total }}</span></li>
                        </ul>
                        <a href="{{ route('checkout.index') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
@push('scripts')
    <script>
        $(".shoping__cart__quantity .cart__update").change(function(e) {
            e.preventDefault()
            var element = $(this);

            $.ajax({
                url: '{{ route('update_from_cart') }}',
                method: "PATCH",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: element.parents("tr").attr("data-id"),
                    quantity: element.parents("tr").find(".cart__update").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".icon_close").click(function(e) {
            e.preventDefault();

            var element = $(this);

            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: element.parents("tr").attr("data-id")
                },
                success: function(response) {
                    if (response.success) {
                        // Individual item removed successfully
                        // alert(response.message); // You can customize this part based on your needs
                        window.location.reload();
                    } else {
                        alert(response.message); // Show an error message to the user
                    }
                },
                error: function() {
                    alert('An error occurred'); // Handle AJAX error
                }
            });
        });
    </script>
@endpush
