@extends('layouts.duoalborada')

@section('content')

    @foreach($text as $txt)
        <p>
            {{ $txt->text }}
        </p>
    @endforeach

    <div class="dispatch-concerts">
        @foreach($concerts as $year=>$concert)
            <div class="around-title{{ $year<=$limit_date ? " old" : "" }}">
                <h2>{{ $year }}</h2>

                @foreach($concerts[$year] as $concert)
                    <p>
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

            </div>

        @endforeach

    </div>

@endsection
