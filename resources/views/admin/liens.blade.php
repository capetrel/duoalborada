<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>
                Nom
            </th>
            <th>
                Titre
            </th>
            <th>
                Lien
            </th>
            <th colspan="2">
                Actions
            </th>
        </tr>
        </thead>
        <tbody class="tab-content">
        @foreach($links as $link)

            <tr>
                <td>
                    {{ $link->link_name }}
                </td>
                <td>
                    {{ $link->link_title }}
                </td>
                <td>
                   {{ $link->link }}
                </td>
                <td>
                {!! Form::open(['url' => url()->current().'/del/link/'.$link->id,'method' => 'post']) !!}
                {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" title="supprimer le lien">
                        <i class="fa fa-times-circle"></i>
                    </button>
                    {!! Form::close() !!}
                </td>
                <td>
                    <a class="btn btn-info" href="{{url()->current()}}/edit-link/{{$link->id}}" title="modifier le lien">
                        <span class="fa fa-pencil" aria-hidden="true" title="modifier le lien"></span>
                    </a>
                </td>
            </tr>

        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="5">
                <a href="{{url()->current()}}/add/link" class="btn btn-primary" title="Ajouter un lien">Ajouter un lien</a>
            </td>
        </tr>
        </tfoot>
    </table>


</div>