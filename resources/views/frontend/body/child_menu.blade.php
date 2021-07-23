@foreach ($childs as $child)
    <li><a href="/shop/category/{{ $child->id }}">{{ $child->name }}
            @if (count($child->childs))
                <span class="caret"></span>
            @endif
        </a>
        @if (count($child->childs))
            <ul class="dropdown-menu">
                @include('frontend.body.child_menu',['childs' => $child->childs])
            </ul>
        @endif
    </li>
@endforeach
