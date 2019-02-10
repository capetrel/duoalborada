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
                    <div class="panel-heading"><h4>Editer un média</h4></div>
                    <hr>
                    <div class="panel-body">

                        @include('blocks.errors')

                        @include('blocks.messages')

                        {!! Form::open(['url' => route('update-media', ['pages'=>$page, 'id'=>$id]), 'method' => 'post', 'files' => true]) !!}

                        @foreach($media as $item)

                            {{ Form::hidden('id', $item->id) }}

                            <div class="form-group">
                                {!! Form::label('media_title', 'Nom du media') !!}<em> ( Obligatoire ) </em>
                                {!! Form::text('media_title', $item->media_title, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-row">
                                <div class="form-group col-mb-3">
                                    <div>Image actuelle</div>
                                    <img class="img-fluid img-thumbnail float-left" src="{{asset($item->media_thumb)}}" alt="{{ $item->media_description }}">
                                </div>
                                <div class="form-group col-mb-9">
                                    {!! Form::label('media_thumb', 'Changer d\'image') !!}
                                    {!! Form::hidden('media_thumb_old', $item->media_thumb) !!}
                                    {!! Form::hidden('media_fullsize', $item->media_fullsize) !!}
                                    {!! Form::file('media_thumb', ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('media_link', 'Lien') !!}
                                {!! Form::text('media_link', $item->media_link, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('media_description', 'Description') !!}
                                {!! Form::text('media_description', $item->media_description, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('media_date', 'Date du média (Cliquez sur le champ)') !!}
                                {!! Form::date('media_date', $item->media_date, [
                                    'class'=>'form-control',
                                    'id'=>'flat-date'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('categories_id', 'Catégorie :') !!}<em> ( Obligatoire ) </em>
                                <!-- select('size', ['L' => 'Large', 'S' => 'Small'], 'S'); -->
                                {!! Form::select('categories_id', $categories, $cat_id, [
                                    'required',
                                    'class'=>'form-control',
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                                <a class="btn btn-secondary" title="retour à la page précédente" href="{{ route('page', ['pages'  => $page]) }}">Annuler</a>
                            </div>

                        @endforeach

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
