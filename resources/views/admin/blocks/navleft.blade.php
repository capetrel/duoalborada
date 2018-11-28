@foreach($left_menu->merge($bottom_menu) as $item)

    @if(  starts_with(url()->current(), url('home/' . $item->url_name)))
        <li class="list-group-item active">
            {{ $item->menu_name }}
        </li>
    @else
        <li class="list-group-item">
            <a class="nav-link" href="{{ url('home/'.$item->url_name.'') }}" title="Aller à {{ $item->menu_name }}">{{ $item->menu_name }}</a>
        </li>
    @endif

@endforeach
