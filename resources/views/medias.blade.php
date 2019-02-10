@extends('layouts.duoalborada')

@section('content')

    @push('css')
        <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    @endpush

    @foreach($text as $txt)
        <p>
            {!! $txt->text  !!}
        </p>
    @endforeach

    @foreach($media_from_category as $cat=>$media)

        <div class="around-title">
            <h2>{{ $cat }}</h2>
            <div class="siema-{{ str_slug($cat) }}">
                @foreach($media_from_category[$cat] as $media)
                    <!-- TODO revoir cette condition une balise a sans href c'est bof -->
                    <div class="slide ih-item square effect6 from_top_and_bottom">
                        @if($media->media_link)
                            <a href="{{ $media->media_link }}" target="_blank">
                        @else
                            <a class="work"> <!-- href=" asset($media->media_fullsize) " -->
                        @endif
                            <div class="img">
                                <img id="imgSrc" src="{{ asset($media->media_thumb) }}" alt="{{ $media->media_title }}">
                            </div>
                            <div class="info">
                                <h3 id="imgTitle">{{ $media->media_title }}</h3>
                                <p id="imgDesc" class="portfolio-desc">{{ $media->media_description }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>

        @if(count((array)$media) > 1)
            <div class="btn-center">
                <button class="prev-{{ str_slug($cat) }} btn-slider"><</button>
                <button class="next-{{ str_slug($cat) }} btn-slider">></button>
            </div>
        @else
            <div class="bnt-center">
                <p>Cette section est vide pour l'instant.</p>
            </div>
        @endif

    @endforeach

    <div id="modal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImg">
        <h3 id="modalTitle"></h3>
        <div id="modalDesc"></div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/vendor/siema.min.js') }}"></script>
        <script src="{{ asset('js/slider.js') }}"></script>
    @endpush

@endsection
