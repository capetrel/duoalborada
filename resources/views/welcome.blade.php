@extends('layouts.duoalborada')

@section('content')

    @foreach($text as $txt)
        <blockquote>
            {!! $txt->text  !!}
        </blockquote>
    @endforeach

@endsection
