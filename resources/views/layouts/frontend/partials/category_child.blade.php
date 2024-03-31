<ul class="header__menu__dropdown">
    @foreach ($children as $child)
        <li>
            <a class="child_dropdown" href="#">{{ $child->name }}</a>
            @if ($child->children->count() > 0)
                <!-- Recursive call to display children -->
                @include('layouts.frontend.partials.category_child', ['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>