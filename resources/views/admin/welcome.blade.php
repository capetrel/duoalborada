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
                <div class="card">
                    <div class="card-header">
                        <h4>Administer les textes</h4>
                    </div>

                    <div class="card-body">

                        @include('blocks.messages')

                        @foreach($page_content as $content)
                            <h5 class="card-title" >Titre de la page : {!! $content->menu_name  !!}</h5>
                            <p class="card-text">
                                <strong>Description de la page :</strong> {!! $content->head_title  !!}<br>

                                {!! $content->text ? $content->text : "Il n'y a pas de textes pour cette page"  !!}
                            </p>
                        @endforeach

                        <a class="btn btn-primary" href="#">
                            Modifier ces textes :
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

                        @if( url()->current() === url('home/concerts'))

                            @include('admin.concerts')

                        @else

                            <p>Il n'y a pas de contenu pour cette page.</p>

                        @endif

                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
