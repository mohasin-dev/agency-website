@extends('frontend.layouts.app2')

@section('title', 'Photo Gallery')

    @push('css')
        
    @endpush

@section('content')
    <!-- start page title -->
    <section class="wow animate__fadeIn bg-extra-dark-gray padding-25px-tb page-title-small">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <!-- start page title -->
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">Photo Gallery</h1>
                    <!-- end page title -->
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li>Photo Gallery</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <section class="padding-ten-lr lg-no-padding-lr">
        <div class="container-fluid">
            {{-- <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-six-bottom">
                    <h6 class="alt-font text-extra-dark-gray font-weight-500">Image gallery style 01</h6>
                </div>
            </div> --}}
            <div class="row justify-content-center">
                <div class="col-12">
                    <ul class="portfolio-overlay portfolio-wrapper grid grid-loading grid-4col xl-grid-4col lg-grid-4col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large text-center">
                        <li class="grid-sizer"></li>
                        <!-- start lightbox gallery item -->
                        @foreach ($photos as $photo)
                            <li class="grid-item wow animate__fadeIn">
                                <a href="{{ asset('storage/' . $photo->photo) }}" title="{{ $photo->photo_title }}" data-group="lightbox-gallery" class="lightbox-group-gallery-item">
                                    <div class="portfolio-box">
                                        <div class="portfolio-image bg-gradient-sky-blue-pink">
                                            <img src="{{ asset('storage/' . $photo->photo) }}" alt="" />
                                            <div class="portfolio-hover justify-content-end d-flex flex-column padding-50px-tb lg-padding-30px-tb xs-padding-15px-tb">
                                                <i class="feather icon-feather-zoom-in portfolio-plus-icon font-weight-300 text-white absolute-middle-center icon-small move-top-bottom"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                        <!-- end lightbox gallery item -->
                    </ul>
                </div>
            </div>
        </div>
    </section>

    
@endsection

@push('script')

@endpush
