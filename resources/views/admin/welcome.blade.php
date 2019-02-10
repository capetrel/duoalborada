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
                <div class="card">
                    <div class="card-header"><h4>Administer la page :</h4></div>

                    <div class="card-body">

                        @foreach($page_content as $content)
                            <h5 class="card-title" >Titre de la page : {!! $content->menu_name  !!}</h5>
                            <p class="card-text">
                                <strong>Description de la page :</strong> {!! $content->head_title  !!}<br>
                                {!! $content->text ? $content->text : "Il n'y a pas de textes pour cette page"  !!}
                            </p>
                        @endforeach

                        <a class="btn btn-primary" href="{{ route( 'edit-page', ['page' => $page]) }}">
                            Modifier la page :
                        </a>

                    </div>

                </div>
                <br>
                <hr>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Administer le contenu</h4>
                    </div>
                    <div class="panel-body">

                        @if( url()->current() === url('admin/concerts'))

                            @include('admin.concerts')

                        @elseif( url()->current() === url('admin/medias'))

                            @include('admin.medias')

                        @elseif( url()->current() === url('admin/liens'))

                            @include('admin.links')

                        @else

                            <p>Il n'y a pas de contenu pour cette page.</p>

                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
