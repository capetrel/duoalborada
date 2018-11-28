@auth
    <li class="list-unstyled">
        <a href="{{ url('/home') }}">{{ __('skeleton.Home') }}</a>
    </li>
@else
    <li class="list-unstyled">
        <a href="{{ route('login') }}">{{ __('login.Master') }}</a>
    </li>
@endauth
@foreach($bottom_menu as $item)
    @if($item->url_name !== 'login')
        <li class="list-unstyled">
            <a href="{{ asset($item->url_name) }}" title="{{ $item->menu_name }}">{{ $item->menu_name }}</a>
        </li>
    @endif
@endforeach
