@extends('frontend.layouts.app2')

@section('title', 'Labar Diary')

    @push('css')

    @endpush

@section('content')

    <section class="wow animate__fadeIn bg-extra-dark-gray padding-25px-tb page-title-small">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <!-- start page title -->
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">Labar Diary
                    </h1>
                    <!-- end page title -->
                </div>
                <div
                    class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li>Labar Diary</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    @foreach ($labarDiaries as $key => $labarDiary)

        @if (($key + 1) % 2))
            <section class="bg-light-gray">
                <div class="container mt-40">
                    <div class="row">
                        <div class="col">
                            <h5>{{ $labarDiary->title }}</h5>
                            <p>{{ $labarDiary->short_description }}</p>
                        </div>
                        <div class="col">
                            {!! $labarDiary->video !!}
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            {!! $labarDiary->video !!}
                        </div>
                        <div class="col">
                            <h5>{{ $labarDiary->title }}</h5>
                            <p>{{ $labarDiary->short_description }}</p>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach

    <section class="parallax wow animate__fadeIn" data-parallax-background-ratio="0.5"
        style="background-image: url(&quot;images/home-corporate-img-05.jpg&quot;); visibility: visible; animation-name: fadeIn; background-position: 50% 70.8672px;">
        <div class="opacity-medium bg-dark-slate-blue"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-7 col-md-8 col-sm-10 text-center text-md-left sm-margin-30px-bottom">
                    <h4 class="alt-font font-weight-600 text-white mb-0">Gearing your company through an Innovative strategy
                    </h4>
                </div>
                <div class="col-12 col-xl-5 col-md-4 text-center text-md-right">
                    <a href="#" class="btn btn-large btn-gradient-shamrock-green-light-orange">Do something</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')

@endpush
