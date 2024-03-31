<div class="container">
    <div class="row">
        {{-- <div class="col-lg-3">
            <div class="hero__categories shadow" style="border-radius: 10px;">
                <div class="hero__categories__all">
                    <i class="fa fa-bars"></i>
                    <span>All Categories</span>
                </div>
                <ul>
                    @foreach ($categories as $category)
                        @if ($category->parent_category_id === null)
                            <li>
                                <a href="#">{{ $category->name }}</a>
                                @if ($category->children->count() > 0)
                                    <!-- Recursive call to display children -->
                                    @include('layouts.frontend.partials.category_child', ['children' => $category->children])
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>  
        </div> --}}
        <div class="col-lg-3">
            <div class="hero__categories dropdown" id="hover-dropdown">
                <div class="hero__categories__all dropdown-toggle" type="button" id="dropdownMenuButton" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fa fa-bars"></i>
                    <span>All Categories</span>
                </div>
                {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach ($categories as $category)
                            @if ($category->parent_category_id === null)
                                <li>
                                    <a class="dropdown-item" href="#">{{ $category->name }}</a>
                                    @if ($category->children->count() > 0)
                                        <!-- Recursive call to display children -->
                                        @include('layouts.frontend.partials.treeview_category', ['children' => $category->children])
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul> --}}
                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                    @foreach ($categories as $category)
                        @if ($category->parent_category_id === null)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class=""><a class="dropdown-item" data-bs-toggle="collapse"
                                            href="#collapse{{ $category->id }}" aria-expanded="false"
                                            aria-controls="collapse{{ $category->id }}">{{ $category->name }}{{--  <span
                                                class="badge bg-primary rounded-pill">{{ $product->category_id }}</span> --}}</a></div>
                                    <div class="collapse" id="collapse{{ $category->id }}">
                                        @if ($category->children->count() > 0)
                                            <!-- Recursive call to display children -->
                                            @include('layouts.frontend.partials.treeview_category', [
                                                'children' => $category->children,
                                            ])
                                        @endif
                                    </div>
                                </div>

                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="hero__search">
                <div class="hero__search__form">
                    <form action="#">
                        <div class="hero__search__categories">
                            All Categories
                            <span class="arrow_carrot-down">
                            </span>
                        </div>
                        <input type="text" placeholder="What do yo u need?">
                        <button type="submit" class="site-btn">SEARCH</button>
                    </form>
                </div>
                <div class="hero__search__phone">
                    <div class="hero__search__phone__icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="hero__search__phone__text">
                        <h5>+880-1707833404</h5>
                        <span>Support 24/7 Time</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Add click event listener to the dropdown items to toggle collapse
    document.querySelectorAll('.dropdown-item').forEach(function(item) {
        item.addEventListener('click', function() {
            var targetId = this.getAttribute('href').substring(5); // Get target collapse id
            var targetCollapse = document.getElementById(targetId);

            // Toggle collapse state
            if (targetCollapse.classList.contains('show')) {
                targetCollapse.classList.remove('show');
            } else {
                // Hide all other open collapses in the dropdown
                document.querySelectorAll('.collapse.show').forEach(function(collapse) {
                    collapse.classList.remove('show');
                });
                targetCollapse.classList.add('show');
            }
        });
    });
</script>
