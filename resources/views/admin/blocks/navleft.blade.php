@foreach($left_menu->merge($bottom_menu) as $item)

    @if(  starts_with(url()->current(), url('admin/' . $item->url_name)))
        <li class="list-group-item active">
            {{ $item->menu_name }}
        </li>
    @else
        <li class="list-group-item">
            <a class="nav-link" href="{{ url('admin/' . $item->url_name) }}" title="Aller à la page : {{ $item->menu_name }}">{{ $item->menu_name }}</a>
        </li>
    @endif

@endforeach
