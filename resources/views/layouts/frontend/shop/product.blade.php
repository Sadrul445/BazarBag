<div class="row">
    @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item">
                <div class="product__item__pic set-bg">
                    @if ($product->images->isNotEmpty())
                        <a href="{{ route('shop.details',['id'=>$product->id]) }}"><img
                                src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt=""></a>
                    @endif
                    <ul class="product__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="{{ route('add_to_cart', $product->id) }}"><i
                                    class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="{{ route('shop.details', ['id' => $product->id]) }}">{{ $product->name }}</a></h6>
                    <h5>&#2547; {{ $product->price }}</h5>
                </div>
            </div>
        </div>
    @endforeach
</div>
