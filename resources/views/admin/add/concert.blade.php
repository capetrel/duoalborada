@extends('layouts.admin')

@section('content')

    @push('css')
        <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
    @endpush

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

                        {!! Form::open(['url' => route('save-concert', ['pages' => $page]), 'method' => 'post']) !!}

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('concert_date', 'Date du concert') !!}<em> ( Obligatoire ) </em>
                                    {!! Form::date('concert_date', \Carbon\Carbon::now(), [
                                        'required',
                                        'class'=>'form-control',
                                        'id'=>'flat-date'
                                        ])
                                    !!}
                                </div>

                                <div class="form-group col-md-6">
                                    {!! Form::label('concert_time', 'Heure du concert') !!}<em> ( Obligatoire ) </em>
                                    {!! Form::time('concert_time', null, [
                                        'required',
                                        'class'=>'form-control',
                                        'id'=>'flat-time'
                                        ])
                                    !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('concert_adress1', 'Adresse :') !!}
                                {!! Form::text('concert_adress1', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('concert_adress2', 'Complément d\'adresse :') !!}
                                {!! Form::text('concert_adress2', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    {!! Form::label('concert_postal_code', 'code postale :') !!}<em> ( Obligatoire, 2 chiffres ) </em>
                                    {!! Form::number('concert_postal_code', null, [
                                        'required',
                                        'min' => "0",
                                        'max' => "100",
                                        'class'=>'form-control'
                                        ])
                                    !!}
                                </div>

                                <div class="form-group col-md-8">
                                    {!! Form::label('concert_city', 'Ville :') !!}<em> ( Obligatoire ) </em>
                                    {!! Form::text('concert_city', null, [
                                        'required',
                                        'class'=>'form-control'
                                        ])
                                    !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('informations', 'Information(s) :') !!}
                                {!! Form::text('informations', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('concert_mail', 'Courriel :') !!}
                                {!! Form::text('concert_mail', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                                <a class="btn btn-secondary" title="retour à la page précédente" href="{{ route('page', ['pages' => $page]) }}">Annuler</a>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/datepicker.js') }}"></script>
    @endpush

@endsection
