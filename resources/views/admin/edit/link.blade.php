@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Éléments du site
                    </div>
                    <ul class="list-group list-group-flush">
                        @include('admin.blocks.navleft')
                    </ul>
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Editer un lien</h4></div>
                    <hr>
                    <div class="panel-body">

                        @include('blocks.errors')

                        @include('blocks.messages')

                        {!! Form::open() !!}

                        @foreach($link as $item)

                            {{ Form::hidden('id', $item->id) }}

                            <div class="form-group">
                                {!! Form::label('link_name', 'Nom du lien') !!}
                                <em> ( Obligatoire ) </em>
                                {!! Form::text('link_name', $item->link_name, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('link', 'Adresse du lien') !!}
                                <em> ( Obligatoire ) </em>
                                {!! Form::text('link', $item->link, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('link_title', 'Titre du lien') !!}
                                <em> ( Obligatoire ) </em>
                                {!! Form::text('link_title', $item->link_title, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                                <a class="btn btn-secondary" title="retour à la page précédente" href="{{ url('home/liens') }}">Annuler</a>
                            </div>

                        @endforeach

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
