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
                    <div class="slide">
                        <a href="{{ asset($media->media_link) }}">
                            <img src="{{ asset($media->media_thumb) }}" alt="{{ asset($media->media_description) }}">
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
        @if(count((array)$media) > 1)
            <div class="btn-center">
                <button class="prev-{{ str_slug($cat) }} btn-slider">prev</button>
                <button class="next-{{ str_slug($cat) }} btn-slider">next</button>
            </div>
        @else
            <div class="bnt-center">
                <p>Cette section est vide pour l'instant.</p>
            </div>
        @endif

    @endforeach

    @push('scripts')
        <script src="{{ asset('js/vendor/siema.min.js') }}"></script>
        <script src="{{ asset('js/slider.js') }}"></script>
    @endpush

@endsection
