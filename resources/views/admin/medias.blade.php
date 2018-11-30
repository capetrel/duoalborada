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
                        <button class="btn btn-danger">
                            <span class="oi oi-delete" aria-hidden="true" title="supprimer le média"></span>
                        </button>
                    </td>
                    <td>
                        <a href="{{ url()->current().'/edit-media/'.$media->id }}" class="btn btn-info">
                            <span class="oi oi-pencil" aria-hidden="true" title="modifier le média"></span>
                        </a>
                    </td>
                </tr>

            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <a href="{{ url()->current().'/add/media' }}" class="btn btn-primary" title="Ajouter dans {{$cat}}">Ajouter dans {{ $cat }}</a>
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>
@endforeach
