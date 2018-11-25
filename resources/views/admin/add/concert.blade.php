@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <ul class="list-unstyled">
                    @include('auth.blocks.navleft')
                </ul>
            </div>

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Tableau de bord</div>

                    <div class="panel-body">

                        @include('blocks.errors')

                        @include('blocks.messages')

                        {!! Form::open(['url' => url()->current().'/save','method' => 'post']) !!}


                            <div class="form-group">
                                {!! Form::label('Date du concert') !!}
                                <em> ( Obligatoire ) </em>
                                {!! Form::date('concert_date', 'date du concert',
                                    array('required',
                                          'class'=>'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Heure du concert') !!}
                                {!! Form::time('concert_time', 'heure du concert',
                                    array('required',
                                          'class'=>'form-control' )) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Adresse :') !!}
                                {!! Form::text('concert_adress1', 'adresse',
                                    array('class'=>'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Complément d\'adresse :') !!}
                                {!! Form::text('concert_adress2', 'complément d\'adresse',
                                    array('class'=>'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('code postale :') !!}
                                <em> ( Obligatoire ) </em>
                                {!! Form::number('concert_postal_code', 'code postale',
                                    array('required',
                                          'class'=>'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Ville :') !!}
                                <em> ( Obligatoire ) </em>
                                {!! Form::text('concert_city', 'ville',
                                    array('required',
                                          'class'=>'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Information(s) :') !!}
                                {!! Form::text('informations', 'infos',
                                    array('class'=>'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Courriel :') !!}
                                {!! Form::text('concert_mail', 'email ou téléphone',
                                    array('class'=>'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Enregistrer',
                                    array('class'=>'btn btn-primary')) !!}

                                <a class="btn btn-info" title="retour à la page précédente" href="{{ asset('/home/concerts') }}">Annuler</a>

                            </div>

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
