@auth
    <a href="{{ url('/home') }}">{{ __('skeleton.Home') }}</a>
@else
    <a href="{{ route('login') }}">{{ __('login.Login') }}</a>
@endauth
