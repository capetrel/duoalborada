@extends('layouts.duoalborada')

@section('content')

    @foreach($text as $txt)
        <p>
            {!! $txt->text  !!}
        </p>
    @endforeach

@endsection
