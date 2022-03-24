@extends('frontend.layouts.app2')

@section('title', 'Tour Package')

    @push('css')
        
    @endpush

@section('content')
    <!-- start page title -->
    <section class="wow animate__fadeIn bg-extra-dark-gray padding-25px-tb page-title-small">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <!-- start page title -->
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">Tour Package</h1>
                    <!-- end page title -->
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li>Tour Package</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-cream padding-75px-lr xl-padding-30px-lr lg-padding-15px-lr sm-no-padding-lr">
        {{-- <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 text-center margin-2-half-rem-bottom sm-margin-1-half-rem-bottom">
                    <h5 class="alt-font font-weight-600 text-extra-dark-gray margin-5px-bottom">Latest article</h5>
                    <p>Explore our blog for insightful articles</p>
                </div>
            </div>
        </div> --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 blog-content">
                    <ul class="blog-grid blog-wrapper grid grid-5col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large" style="position: relative; height: 1524.8px;">
                        <li class="grid-sizer"></li>
                        <!-- start blog item -->
                        @foreach ($tourPackages as $tourPackage)
                        <li class="grid-item" style="position: absolute; left: 0%; top: 0px; animation: 0s ease 0s 1 normal none running none;">
                            <div class="blog-post bg-white box-shadow-medium">
                                <div class="blog-post-image bg-medium-slate-blue">
                                    <a href="{{ route('tour.package.details', [$tourPackage->id, Str::slug($tourPackage->title)]) }}" title=""><img src="{{ asset('storage/' . $tourPackage->featured_image) }}" alt="" data-no-retina=""></a>
                                    {{-- <a href="blog-masonry.html" class="blog-category alt-font">Creative</a> --}}
                                </div>
                                <div class="post-details padding-3-rem-lr xl-padding-2-rem-lr padding-2-half-rem-tb last-paragraph-no-margin">
                                    <a href="#" class="alt-font text-small d-inline-block margin-10px-bottom text-yellow-ochre-hover">{{ \Carbon\Carbon::parse($tourPackage->created_at)->format('d F Y') }}</a>
                                    <a href="{{ route('tour.package.details', [$tourPackage->id, Str::slug($tourPackage->title)]) }}" class="alt-font font-weight-500 text-extra-medium text-extra-dark-gray text-yellow-ochre-hover margin-15px-bottom d-block">{{ $tourPackage->title }}</a>
                                    <p>Lorem ipsum is simply dummy text printing typesetting industry lorem been dummy...</p>
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
