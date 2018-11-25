
@foreach($left_menu->merge($bottom_menu) as $item)

    @if( url()->current() === url('home/'.$item->url_name.''))
        <li class="list-group-item">
            <span class="item-menu-active">{{ $item->menu_name }}</span>
        </li>

    @else
        <li class="list-group-item">
            <a href="{{ url('home/'.$item->url_name.'') }}" title="Aller à {{ $item->menu_name }}">{{ $item->menu_name }}</a>
        </li>

    @endif

@endforeach
