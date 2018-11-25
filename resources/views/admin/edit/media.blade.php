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

                        {!! Form::open(['url' => url()->current().'/image','method' => 'post', 'file' => true]) !!}

                        @foreach($media as $item)

                            {{ Form::hidden('id', $item->id) }}

                            <div class="form-group">
                                {!! Form::label('Nom du media') !!}
                                <em> ( Obligatoire ) </em>
                                {!! Form::text('media_title', $item->media_title,
                                    array('required',
                                          'class'=>'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Image :') !!}
                                <em> ( Obligatoire ) </em>
                                <img class="thumbnail img-thumbnail" src="{{asset($item->media_thumb)}}" alt="">

                                {!! Form::hidden('media_thumb', $item->media_thumb,
                                    array('required',
                                          'class'=>'form-control' )) !!}

                                {!! Form::file('photo', array('class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Lien') !!}
                                {!! Form::text('media_link', $item->media_link,
                                    array('class'=>'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Description') !!}
                                {!! Form::text('media_description', $item->media_description,
                                    array('class'=>'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Date du média') !!}
                                {!! Form::date('media_date', $item->media_date,
                                    array('class'=>'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Catégorie :') !!}
                                <em> ( Obligatoire ) </em>
                                {!! Form::select('categories_id', $categories, null,['required', 'class'=>'form-control', 'placeholder' => $item->categories_id]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Enregistrer',
                                    array('class'=>'btn btn-primary')) !!}

                                <a class="btn btn-info" title="retour à la page précédente" href="{{ asset('/home/medias') }}">Annuler</a>

                            </div>


                        @endforeach

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>



        </div>
    </div>

@endsection