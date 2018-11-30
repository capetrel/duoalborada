@extends('layouts.duoalborada')

@section('content')

    @foreach($text as $txt)
        <p>
            {!! $txt->text  !!}
        </p>
    @endforeach

    {!! Form::open(['action' => 'ContactController@contact']) !!}

    @include('blocks.errors')

    @include('blocks.messages')

    <div class="field-group">
        {!! Form::label('name', 'Votre Nom') !!}
        {!! Form::text('name', null, [
            'required',
            'class'=>'input-control',
            'placeholder'=>'Nom'
                  ])
        !!}
    </div>

    <div class="field-group">
        {!! Form::label('email', 'Votre courriel') !!}
        {!! Form::email('email', null,[
            'required',
            'class'=>'input-control',
            'placeholder'=>'courriel'
            ])
        !!}
    </div>

    <div class="field-group">
        {!! Form::label('message', 'Votre message') !!}
        {!! Form::textarea('message', null,[
            'required',
            'class'=>'input-control',
            'placeholder'=>'message'
            ])
        !!}
    </div>

    <div class="field-group">
        {!! Form::submit('Envoyer', ['class'=>'albo-button']) !!}
    </div>
    {!! Form::close() !!}

@endsection
