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
                    <div class="card-header"><h4>Tableau de bord</h4></div>

                    <div class="card-body">

                        @include('admin.blocks.session')

                        <h5 class="card-title" >Bonjour Maître {{ $user_data[0]->firstname }} {{ $user_data[0]->lastname }}</h5>
                        <p class="card-text">
                            <strong>Les informations vous concernant :</strong>
                        </p>
                        @foreach($user_data as $data)
                            <ul class="card-text">
                                <li>Prénom : {{ $data->firstname }}</li>
                                <li>Nom : {{ $data->lastname }}</li>
                                <li>Email : {{ $data->email }}</li>
                            </ul>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
