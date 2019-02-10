@foreach($bottom_menu as $item)
    @if($item->url_name !== 'login')
        <li class="list-unstyled">
            <a href="{{ url($item->url_name) }}" title="{{ $item->menu_name }}">{{ $item->menu_name }}</a>
        </li>
    @endif
@endforeach
@auth
    <li class="list-unstyled">
        <a href="{{ route('admin') }}">{{ __('skeleton.Home') }}</a>
    </li>
@else
    <li class="list-unstyled">
        <a href="{{ route('login') }}">{{ __('login.Master') }}</a>
    </li>
@endauth
