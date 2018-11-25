@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <ul class="list-unstyled">
                    @include('admin.blocks.navleft')
                </ul>
            </div>

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Tableau de bord</div>

                    <div class="panel-body">

                        @include('blocks.errors')

                        {!! Form::open(['url' => url()->current().'/update','method' => 'post']) !!}

                        @foreach($page_content as $content)

                            <div class="form-group">
                                {!! Form::label('Titre de la page :') !!}
                                <em> ( Nom qui apparait dans les menus du site ) </em>
                                {!! Form::text('menu_name', $content->menu_name,
                                    array('required',
                                          'class'=>'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Nom de la page dans l\'url :') !!}
                                <em> ( Pas d'accents ni majuscule ) </em>
                                {!! Form::text('url_name', $content->url_name,
                                    array('required',
                                          'class'=>'form-control' )) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Description de la page :') !!}
                                <em> ( Titre dans l'onglet du navigateur ) </em>
                                {!! Form::text('head_title', $content->head_title,
                                    array('required',
                                          'class'=>'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Contenu :') !!}
                                {!! Form::textarea('text', $content->text,
                                    array('class'=>'form-control' )) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Enregistrer',
                                    array('class'=>'btn btn-primary')) !!}

                                <a class="btn btn-info" title="retour à la page précédente" href="{{url('/home/'.$content->url_name)}}">Annuler</a>
                            </div>

                        @endforeach

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>



        </div>
    </div>

@endsection
