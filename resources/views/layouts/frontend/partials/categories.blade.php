<section class="categories mt-3">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach ($categories as $category)
                <div class="col-lg-11">
                    <div class="categories__item set-bg" data-setbg="#">
                        <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image"
                        width="70">
                        <h5><a href="#">{{ $category->name }}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
