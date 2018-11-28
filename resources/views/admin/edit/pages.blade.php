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
                    <div class="panel-heading"><h4>Editer les textes de la page</h4></div>
                    <hr>
                    <div class="panel-body">

                        @include('blocks.errors')

                        {!! Form::open(['url' => url()->current().'/update','method' => 'post']) !!}

                        @foreach($page_content as $content)

                            <div class="form-group">
                                {!! Form::label('Titre de la page :') !!}
                                <em> ( Nom qui apparait dans les menus du site ) </em>
                                {!! Form::text('menu_name', $content->menu_name, [
                                    'required',
                                    'class'=>'form-control'])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Nom de la page dans l\'url :') !!}
                                <em> ( Pas d'accents ni majuscule ) </em>
                                {!! Form::text('url_name', $content->url_name, [
                                    'required',
                                    'class'=>'form-control' ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Description de la page :') !!}
                                <em> ( Titre dans l'onglet du navigateur ) </em>
                                {!! Form::text('head_title', $content->head_title, [
                                    'required',
                                    'class'=>'form-control'])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Contenu :') !!}
                                {!! Form::textarea('text', $content->text, ['class'=>'form-control' ]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                                <a class="btn btn-secondary" title="retour à la page précédente" href="{{url('/home/'.$content->url_name)}}">Annuler</a>
                            </div>

                        @endforeach

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
