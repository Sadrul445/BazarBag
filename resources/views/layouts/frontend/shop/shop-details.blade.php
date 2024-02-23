@extends('layouts.templateBuilder')

@includeIf('layouts.frontend.partials.css')

@section('title', 'Shop Details | BazarBag')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/ui/frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        {{-- <h2>Brands’s Package</h2> --}}
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <a href="#">{{ $category->name }}</a>
                            <span>{{ $product->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    @if ($product)
        <!-- Product Details Section Begin -->
        <section class="product-details spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__pic">
                            <div class=" product_details_discount__item__pic shadow">
                                <!-- Default large image -->
                                <div class=" product__discount__percent ">
                                    <strong>{{ number_format($product->discount, 0) }}%</strong>
                                </div>
                                @if ($product->images->isNotEmpty())
                                    <a href="{{ asset('storage/' . $product->images->first()->image_path) }}">
                                        <img id="largeImage" class="product__details__pic__item--large"
                                            src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                            alt="">
                                    </a>
                                @endif
                            </div>
                            <div class="product__details__pic__slider owl-carousel">
                                <!-- Loop through each image associated with the product -->
                                @foreach ($product->images as $image)
                                    {{-- <div class="item"> --}}
                                    <!-- Thumbnail images -->
                                    <img style="padding: 2px;background-color:#ffffff;border-radius:15px"
                                        class="thumbnail-image" src="{{ asset('storage/' . $image->image_path) }}"
                                        alt="Product Image">
                                    {{-- </div> --}}
                                @endforeach
                            </div>
                            <div class="hero__search__delivery shadow">
                                <div class="hero__search__delivery__icon">
                                    <img s src="{{ asset('assets/ui/frontend/img/logo/delivery-icon.svg') }}" alt=""
                                        srcset="" width="32px" height="32px">
                                </div>
                                <div class="hero__search__delivery__text">
                                    <h5>Fast Delivery</h5>
                                    <span>Guaranteed</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">
                            <h3>{{ $product->name }}</h3>
                            <div class="product__details__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <span>(18 reviews)</span>
                            </div>
                            <div class="product__details__price">
                                @if ($product->discount > 0)
                                    <div>
                                        <span style="text-decoration: line-through;">&#2547; {{ $product->price }}</span>
                                        <p style="font-weight:700;color: #7fad39;font-size:20px">Discounted Price:
                                            &#2547;
                                            <strong>{{ $product->price - ($product->price * $product->discount) / 100 }}</strong>
                                        </p>
                                    </div>
                                @else
                                    <div>&#2547; {{ $product->price }}</div>
                                @endif
                            </div>
                            <p>{{ $product->description }}</p>
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" value="1" min="1" name="quantity">
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('add_to_cart', $product->id) }}" class="primary-btn">ADD TO CART</a>
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            <button href="#" class="b-btn">BUY NOW</button>

                            <ul>
                                <li><b>Availability</b> <span>{{ $product->status }}</span></li>
                                <li><b>Shipping</b> <span>01 day shipping. <samp>Free Delivery Inside
                                            Chittagong</samp></span></li>
                                <li><b>Weight</b> <span>150ML</span></li>
                                <li><b>Share on</b>
                                    <div class="share">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                        aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                        aria-selected="false">Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                        aria-selected="false">Reviews <span>(1)</span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <h6>Products Infomation</h6>
                                        <p>{{ $product->description }}</p>

                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-2" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <h6>Products Infomation</h6>
                                        <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                            Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                            Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                            sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                            eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                            Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                            sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                            diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                            ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                            Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                            Proin eget tortor risus.</p>
                                        <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                            ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                            elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                            porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                            nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-3" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <h6>Products Infomation</h6>
                                        <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                            Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                            Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                            sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                            eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                            Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                            sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                            diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                            ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                            Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                            Proin eget tortor risus.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Details Section End -->
    @else
        <p>Product Not Found</p>
    @endif

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Set default large image
            var defaultLargeImageSrc = $('#largeImage').attr('src');

            // When a thumbnail image is clicked
            $('.thumbnail-image').click(function() {
                // Get the source of the clicked thumbnail
                var clickedImageSrc = $(this).attr('src');

                // Set the large image source to the clicked thumbnail source
                $('#largeImage').attr('src', clickedImageSrc);
            });

            // Restore default large image when clicked on it
            $('#largeImage').click(function() {
                $('#largeImage').attr('src', defaultLargeImageSrc);
            });
        });
    </script>
@endpush
