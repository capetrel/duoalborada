<div class="custom-title">

    @foreach($head_title as $title)
        <h1>
            {{ $title->menu_name }}
        </h1>
    @endforeach

</div>
<div class="logo">
    <img class="img-responsive" src="{{ asset('svg/logo-duoalborada.svg') }}" alt="Logo du Duo Alborada">
</div>
