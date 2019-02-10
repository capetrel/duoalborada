<?php
setlocale(LC_TIME, 'fr_FR.utf8','fra');
?>
<div class="dispatch-concerts">

    <a class="btn btn-primary" href="{{ route('add-concert', ['page' => $page]) }}" title="Ajouter un concert">
        Ajouter un concert
    </a>
    ,&nbsp;ou modifier un concert existant ci-dessous :
    <br>
    <br>
    @foreach($concerts as $year=>$concert)
        <div class="around-title">
            <h2>{{ $year }}</h2>

            @foreach($concerts[$year] as $concert)
                <p>
                    {!! Form::open(['url' => route('del-concert', ['page'=>$page, 'id' => $concert->id]),'method' => 'post',"style"=>"display:inline-block" ,"onsubmit" => "return confirm('êtes vous sur ?')"]) !!}
                        <button type="submit" class="btn btn-danger" title="supprimer le concert">
                            <i class="oi oi-trash"></i>
                        </button>
                    {!! Form::close() !!}
                    <a class="btn btn-info" href="{{ route('edit-concert', ['page'=>$page, 'id' => $concert->id]) }}" title="modifier le concert">
                        <span class="oi oi-pencil" title="modifier le concert"></span>
                    </a>

                    @if($concert->concert_date != "")
                        <strong>{{ Carbon\Carbon::parse($concert->concert_date)->formatLocalized('%a %d %b %Y') }}</strong>
                    @endif

                    @if($concert->concert_time != "")
                        &nbsp;à {{ \Carbon\Carbon::parse($concert->concert_time)->format('G\\hi') }},&nbsp;
                    @endif

                    @if($concert->concert_adress1 != "")
                        {{ $concert->concert_adress1 }},&nbsp;
                    @endif

                    @if($concert->concert_adress2 != "")
                        {{ $concert->concert_adress2 }},&nbsp;
                    @endif

                    {{ $concert->concert_city }} ({{ $concert->concert_postal_code }}).

                    @if($concert->concert_mail != "")
                        {{ $concert->concert_mail }},&nbsp;
                    @endif

                    @if($concert->informations != "")
                        {{ $concert->informations }}.
                    @endif
                </p>

            @endforeach
            <hr>
        </div>

    @endforeach

</div>
