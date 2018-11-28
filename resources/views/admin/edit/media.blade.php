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
                    <div class="panel-heading"><h4>Editer un média</h4></div>
                    <hr>
                    <div class="panel-body">

                        @include('blocks.errors')

                        @include('blocks.messages')

                        {!! Form::open(['url' => url()->current().'/image','method' => 'post', 'file' => true]) !!}

                        @foreach($media as $item)

                            {{ Form::hidden('id', $item->id) }}

                            <div class="form-group">
                                {!! Form::label('Nom du media') !!}<em> ( Obligatoire ) </em>
                                {!! Form::text('media_title', $item->media_title, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Image') !!}<em> ( Obligatoire ) </em>
                                <img class="thumbnail img-thumbnail" src="{{asset($item->media_thumb)}}" alt="">
                                {!! Form::hidden('media_thumb', $item->media_thumb, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                                {!! Form::file('photo', ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Lien') !!}
                                {!! Form::text('media_link', $item->media_link, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Description') !!}
                                {!! Form::text('media_description', $item->media_description, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Date du média') !!}
                                {!! Form::date('media_date', $item->media_date, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Catégorie :') !!}<em> ( Obligatoire ) </em>
                                {!! Form::select('categories_id', $categories, null,[
                                    'required',
                                    'class'=>'form-control',
                                    'placeholder' => $item->categories_id
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                                <a class="btn btn-secondary" title="retour à la page précédente" href="{{ asset('/home/medias') }}">Annuler</a>
                            </div>

                        @endforeach

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
