<ul>
    @foreach ($children as $child)
        <li>
            <a href="#">{{ $child->name }}</a>
            @if ($child->children->count() > 0)
                <!-- Recursive call to display children -->
                @include('layouts.frontend.partials.treeview_category', ['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>
