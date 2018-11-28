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
                    <div class="panel-heading"><h4>Ajouter un concert :</h4></div>
                    <hr>
                    <div class="panel-body">

                        @include('blocks.errors')

                        @include('blocks.messages')

                        {!! Form::open(['url' => url()->current().'/save','method' => 'post']) !!}

                            <div class="form-group">
                                {!! Form::label('Date du concert') !!}<em> ( Obligatoire ) </em>
                                {!! Form::date('concert_date', 'date du concert', [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Heure du concert') !!}
                                {!! Form::time('concert_time', 'heure du concert', [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Adresse :') !!}
                                {!! Form::text('concert_adress1', 'adresse', ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Complément d\'adresse :') !!}
                                {!! Form::text('concert_adress2', 'complément d\'adresse', ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('code postale :') !!}<em> ( Obligatoire ) </em>
                                {!! Form::number('concert_postal_code', 'code postale', [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Ville :') !!}<em> ( Obligatoire ) </em>
                                {!! Form::text('concert_city', 'ville', [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Information(s) :') !!}
                                {!! Form::text('informations', 'infos', ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Courriel :') !!}
                                {!! Form::text('concert_mail', 'email ou téléphone', ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                                <a class="btn btn-secondary" title="retour à la page précédente" href="{{ asset('/home/concerts') }}">Annuler</a>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
