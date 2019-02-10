<a class="btn btn-primary" href="{{ route('add-link', ['page' => $page]) }}" title="Ajouter un concert">
    Ajouter un lien
</a>
,&nbsp;ou modifier un lien existant ci-dessous :
<br>
<br>
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
                {!! Form::open(['url' => route('del-link', ['page' => $page, 'id' => $link->id]), 'method' => 'post', "onsubmit" => "return confirm('êtes vous sur ?')"]) !!}
                    <button type="submit" class="btn btn-danger" title="supprimer le lien">
                        <i class="oi oi-trash"></i>
                    </button>
                {!! Form::close() !!}
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('edit-link', ['page' => $page, 'id' => $link->id]) }}" title="modifier le lien">
                        <span class="oi oi-pencil" aria-hidden="true" title="modifier le lien"></span>
                    </a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>


</div>
