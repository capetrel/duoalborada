@extends('layouts.duoalborada')

@section('content')

    @foreach($text as $txt)
        <p>
            {!! $txt->text  !!}
        </p>
    @endforeach

    <div class="custom-links">

        @foreach($links as $link)

            <a href="{{ $link->link }}" title="{{ $link->link_title }}">
                {{ $link->link_name }}
            </a>
            <br>

        @endforeach

    </div>

@endsection
