<?php
setlocale(LC_TIME, 'fr_FR.utf8','fra');
?>
@foreach($media_from_category as $cat=>$media)
    <div>
        <h2>{{ $cat }}</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        Titre
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Date
                    </th>
                    <th colspan="2">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="tab-content">
            @foreach($media_from_category[$cat] as $media)

                <tr>
                    <td>
                        {{ $media->media_title }}
                    </td>
                    <td>
                        <img style="width: 100px; height: auto" src="{{ asset($media->media_thumb) }}" alt="{{ asset($media->media_description) }}">
                    </td>
                    <td>
                        {!! $media->media_description !!}
                    </td>
                    <td>
                        {{ $media->media_date ? Carbon\Carbon::parse($media->media_date)->formatLocalized('%a %d %b %Y') : '' }}
                    </td>
                    <td>
                        {!! Form::open(['url' => route('del-media', ['page' => $page, 'id' => $media->id]), 'method' => 'post', "onsubmit" => "return confirm('êtes vous sur ?')"]) !!}
                        <button type="submit" class="btn btn-danger" title="supprimer le média">
                            <i class="oi oi-trash"></i>
                        </button>
                        {!! Form::close() !!}
                    </td>
                    <td>
                        <a href="{{ route('edit-media', ['page' => $page, 'id' => $media->id]) }}" class="btn btn-info">
                            <span class="oi oi-pencil" aria-hidden="true" title="modifier le média"></span>
                        </a>
                    </td>
                </tr>

            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <a href="{{ route('add-media', ['page' => $page, 'cat' => str_slug($cat)]) }}" class="btn btn-primary" title="Ajouter dans {{$cat}}">Ajouter dans {{ $cat }}</a>
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>
@endforeach
