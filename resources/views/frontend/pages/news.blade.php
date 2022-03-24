@extends('frontend.layouts.app2')

@section('title', 'News')

    @push('css')

    @endpush

@section('content')

    <section class="wow animate__fadeIn bg-extra-dark-gray padding-25px-tb page-title-small">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <!-- start page title -->
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">News</h1>
                    <!-- end page title -->
                </div>
                <div
                    class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li>News</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    {{-- <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 text-center margin-2-half-rem-bottom sm-margin-1-half-rem-bottom">
                    <h5 class="alt-font font-weight-600 text-extra-dark-gray margin-5px-bottom">Latest News</h5>
                    <p>Explore our blog for insightful articles</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 blog-content padding-5px-lr sm-padding-15px-lr">
                    <ul class="blog-metro blog-wrapper grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-large"
                        style="position: relative; height: 1483px;">
                        <li class="grid-sizer"></li>
                        @foreach ($news as $item)
                            <li class="grid-item last-paragraph-no-margin"
                                style="position: absolute; left: 75%; top: 1112.25px;">
                                <div class="blog-post">
                                    <div class="blog-post-image bg-dark-slate-blue">
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt="" data-no-retina="">
                                        <div class="blog-overlay"></div>
                                    </div>
                                    <div
                                        class="post-details d-flex flex-column align-item-start padding-3-half-rem-all xl-padding-2-rem-all">
                                        <div class="mb-auto w-100">
                                            <a href="#" class="blog-category alt-font">Creativity</a>
                                        </div>
                                        <div class="align-self-end w-100">
                                            <a href="{{ route('news.details', [$item->id, Str::slug($item->title)]) }}"
                                                class="alt-font font-weight-500 text-small d-inline-block text-white text-uppercase opacity-6 margin-10px-bottom">30
                                                April 2019</a>
                                            <a href="{{ route('news.details', [$item->id, Str::slug($item->title)]) }}"
                                                class="alt-font text-white mb-0 d-block w-85 xl-w-100">{{ $item->short_description }}</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}

    <section style="padding-top: 90px">
        <div class="container-fluid">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6 text-center margin-2-half-rem-bottom sm-margin-1-half-rem-bottom">
                        <h5 class="alt-font font-weight-600 text-extra-dark-gray margin-5px-bottom">Latest News</h5>
                        <p>Explore our blog for insightful articles</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 blog-content padding-5px-lr sm-padding-15px-lr">
                    <ul class="blog-metro blog-wrapper grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-large"
                        style="position: relative; height: 1483px;">
                        <li class="grid-sizer"></li>
                        <!-- start blog item -->
                        @foreach ($news as $item)
                            <li class="grid-item last-paragraph-no-margin"
                                style="position: absolute; left: 0%; top: 1112.25px;">
                                <div class="blog-post">
                                    <div class="blog-post-image bg-dark-slate-blue">
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt="" data-no-retina="">
                                        <div class="blog-overlay"></div>
                                    </div>
                                    <div
                                        class="post-details d-flex flex-column align-item-start padding-3-half-rem-all xl-padding-2-rem-all">
                                        <div class="mb-auto w-100">
                                            <a href="blog-grid.html" class="blog-category alt-font">Concept</a>
                                        </div>
                                        <div class="align-self-end w-100">
                                            <a href="{{ route('news.details', [$item->id, Str::slug($item->title)]) }}"
                                                class="alt-font font-weight-500 text-small d-inline-block text-white text-uppercase opacity-6 margin-10px-bottom">{{ \Carbon\Carbon::parse($item->published_date)->format('d F Y') }}</a>
                                            <a href="{{ route('news.details', [$item->id, Str::slug($item->title)]) }}"
                                                class="alt-font text-white text-extra-large mb-0 d-block w-85 xl-w-100">{{ $item->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        <!-- end blog item -->
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')

@endpush
