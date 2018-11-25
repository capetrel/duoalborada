@extends('layouts.app')

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
                            {!! Form::label('Nom du lien') !!}
                            <em> ( Obligatoire ) </em>
                            {!! Form::text('link_name', false,
                                array('required',
                                      'class'=>'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Adresse du lien') !!}
                            <em> ( Obligatoire ) </em>
                            {!! Form::text('link', false,
                                array('required',
                                      'class'=>'form-control' )) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Titre du lien') !!}
                            <em> ( Obligatoire ) </em>
                            {!! Form::text('link_title', false,
                                array('required',
                                      'class'=>'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Enregistrer',
                                array('class'=>'btn btn-primary')) !!}

                            <a class="btn btn-info" title="retour à la page précédente" href="{{ asset('/home/links') }}">Annuler</a>
                        </div>

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection