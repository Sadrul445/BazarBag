<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i>info.bazarbag@gmail.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="{{ asset('assets/ui/frontend/img/language.png') }}" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">English</a></li>
                                <li><a href="#">Bangla</a></li>
                            </ul>
                        </div>                 
                        <div class="header__top__right__auth">

                            @if (Route::has('login'))
                                @auth
                                    <a class="username" href="#"> <strong> {{ auth()->user()->name }}</strong><span class="arrow_carrot-down"></span></a> 
                                    <ul class="rounded">
                                     
                                        @if (auth()->user()->role === 'customer')
                                            <li><a href="{{ route('customer.dashboard',['name' => auth()->user()->name]) }}">Profile</a></li>
                                            {{-- <li><a href="{{ route('logout') }}">Logout</a></li> --}}
                                        @else
                                            <li><a href="{{ route('admin.dashboard') }}">Profile</a></li>
                                            {{-- <li><a href="{{ route('logout') }}">Logout</a></li> --}}
                                        @endif
                                    </ul>
                                @else
                                    <a class="" href="{{ route('login') }}"><i class="fa fa-user"></i>Login</a>
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/ui/frontend/img/light-logo.svg') }}"
                            alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 mt-3">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('shop.index') }}">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="#">Shop Details</a></li>
                                <li><a href="{{-- {{ route('cart.index') }} --}}">Shoping Cart</a></li>
                                <li><a href="{{ route('checkout.index') }}">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                        <li><a href="{{ url('/contact-us') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 mt-2">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><!-- Vertically centered modal -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#cartModal">
                                <i class="fa fa-shopping-bag"></i> <span
                                    class="bg-danger">{{ count((array) session('cart')) }}</span>
                            </a>

                            <!-- Cart Modal -->
                            <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Cart content goes here -->
                                            <div class="cart-item">

                                                {{-- @if (session('cart') && count(session('cart')) > 0) --}}
                                                @if (session('cart') && is_array(session('cart')) && count(session('cart')) > 0)
                                                    @foreach (session('cart') as $id => $product)
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <img src="{{ asset('storage/' .$product['image']) }}" alt="Product Image"
                                                                    class="cart-item-image">
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <a href="{{ route('shop.details', ['id' => $id]) }}">
                                                                    <h5>{{ $product['name'] }}</h5>
                                                                    <p>Price: ৳ {{ $product['price'] }}</p>
                                                                </a>
                                                                <p class="count">Quantity:{{ $product['quantity'] }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <hr>
                                                    <div class="cart-item">
                                                        <div class="row">
                                                            <div class="col-sm-3">Sub Total:</div>
                                                            <div class="col-sm-4"></div>
                                                            @php $total = 0 @endphp
                                                            @foreach ((array) session('cart') as $id => $product)
                                                                @php
                                                                    $total += $product['price'] * $product['quantity'];
                                                                @endphp
                                                            @endforeach
                                                            <div class="col-sm-5">৳ {{ $total }}</div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <p class="text-center">Your Cart is Empty</p>
                                                    @php $total = 0 @endphp <!-- Initialize $total for an empty cart -->
                                                @endif
                                            </div>
                                        </div>

                                        <div class="text-center">Product item: <span>৳ {{ $total }}</span></div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a class="btn btn-success" type="submit"
                                                href="{{ route('cart.index') }}">View Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="{{ route('cart.index') }}"></a>
                        </li>
                    </ul>
                    <div class="header__cart__price">item: <span>৳ {{ $total }}</span></div>
                </div>
            </div>
            
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
