@extends('layouts.duoalborada')

@section('content')

    @foreach($text as $txt)

        {!! $txt->text  !!}

    @endforeach

@endsection
