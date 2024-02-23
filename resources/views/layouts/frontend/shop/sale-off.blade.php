<div class="product__discount">
    <div class="section-title product__discount__title">
        <h2>Sale Off</h2>
    </div>
    <div class="row">
        <div class="product__discount__slider owl-carousel">
            @foreach ($products as $product)
                <div class="col-lg-10">
                    <div class="product__discount__item">
                        <div class="product__discount__item__pic set-bg" data-setbg="#">
                            <div class="product__discount__percent">
                                <strong>{{ number_format($product->discount, 0) }}%</strong>
                            </div>
                            @if ($product->images->isNotEmpty())
                                <a href="{{-- {{ route('shop.details',['id'=>$product->id]) }} --}}">
                                    <!-- Display only the first image -->
                                    <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                        alt="">
                                </a>
                            @endif
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="{{ route('add_to_cart', $product->id) }}"><i
                                            class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__discount__item__text">
                            {{-- <span>{{$category->name == $product->category_name }}</span> --}}
                            <h6><a href="{{ route('shop.details', ['id' => $product->id]) }}">{{ $product->name }}</a>
                            </h6>
                            @if ($product->discount > 0)
                                <div>
                                    <span style="text-decoration: line-through;">&#2547; {{ $product->price }}</span>
                                    <p style="font-weight:bold;color: #7fad39">Discounted Price:
                                        &#2547;
                                        <strong>{{ $product->price - ($product->price * $product->discount) / 100 }}</strong>
                                    </p>
                                </div>
                            @else
                                <div>&#2547; {{ $product->price }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
