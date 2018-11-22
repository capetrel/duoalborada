<div class="bg-menu">

    <div role="navigation" class="item-menu">
        @foreach($left_menu as $item)

            @if( url()->current() === asset($item->url_name))
                <span class="item-menu-active">{{ $item->menu_name }}</span>
            @else
                <a href="{{ asset($item->url_name) }}" title="Aller à {{ $item->menu_name }}">{{ $item->menu_name }}</a>
            @endif

        @endforeach
    </div>

    <div class="footer">
        @include('blocks.bottomnav')
    </div>

</div>

<nav role="navigation" class="open-slide">
    <div id="menuToggle">
        <input type="checkbox" />

        <span></span>
        <span></span>
        <span></span>

        <ul id="menu">
            @foreach($left_menu as $k => $item)

                @if( url()->current() === asset($item->url_name))
                    <a href="javascript:void(0)" class="item-menu-active">{{ $item->menu_name }}</a>
                @else
                    <a href="{{ asset($item->url_name) }}" title="Aller à {{ $item->menu_name }}">{{ $item->menu_name }}</a>
                @endif

            @endforeach
        </ul>
    </div>
</nav>
