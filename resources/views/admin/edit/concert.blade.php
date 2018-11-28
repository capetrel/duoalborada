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
                    <div class="panel-heading"><h4>Modifier le concert :</h4></div>
                    <hr>
                    <div class="panel-body">

                        @include('blocks.errors')

                        @include('blocks.messages')

                        {!! Form::open() !!}

                        @foreach($concert as $item)

                            {{ Form::hidden('id', $item->id) }}

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Date du concert') !!}<em> ( Obligatoire ) </em>
                                {!! Form::date('concert_date', $item->concert_date, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group col-md-6">
                                {!! Form::label('Heure du concert') !!}
                                {!! Form::time('concert_time', $item->concert_time, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Adresse :') !!}
                            {!! Form::text('concert_adress1', $item->concert_adress1, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Complément d\'adresse :') !!}
                            {!! Form::text('concert_adress2', $item->concert_adress2, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label('code postale :') !!}<em> ( Obligatoire ) </em>
                                {!! Form::number('concert_postal_code', $item->concert_postal_code, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group col-md-8">
                                {!! Form::label('Ville :') !!}<em> ( Obligatoire ) </em>
                                {!! Form::text('concert_city', $item->concert_city, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Information(s) :') !!}
                            {!! Form::text('informations', $item->informations, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Courriel :') !!}
                            {!! Form::text('concert_mail', $item->concert_mail, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                            <a class="btn btn-secondary" title="retour à la page précédente" href="{{ asset('/home/concerts') }}">Annuler</a>
                        </div>

                        @endforeach

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
