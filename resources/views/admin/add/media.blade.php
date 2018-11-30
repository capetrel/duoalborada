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
                    <div class="panel-heading"><h4>Ajouter un média</h4></div>
                    <hr>
                    <div class="panel-body">

                        @include('blocks.errors')

                        {!! Form::open([
                            'url' => url()->current().'/save',
                            'method' => 'post',
                            'files' => true
                            ])
                        !!}

                        <div class="form-group">
                            {!! Form::label('media_title', 'Titre du média') !!}<em> ( Obligatoire ) </em>
                            {!! Form::text('media_title', null, [
                                'required',
                                'class'=>'form-control'
                                ])
                            !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('media_thumb', 'Image') !!}
                            {!! Form::file('media_thumb', ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('media_link', 'Lien :') !!}
                            {!! Form::text('media_link', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('media_description', 'Description :') !!}
                            {!! Form::text('media_description', null, ['class'=>'form-control']) !!}
                        </div>

                        <!-- select category -->

                        <div class="form-group">
                            {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                            <a class="btn btn-secondary" title="retour à la page précédente" href="{{ url('/home/medias') }}">Annuler</a>
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
