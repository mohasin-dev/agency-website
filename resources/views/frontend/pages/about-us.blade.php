@extends('frontend.layouts.app2')

@section('title', 'About Us')

    @push('style')
        <style>
            .page-content img {
                max-width: 100%;
                padding: 20px;
            }
        </style>
    @endpush

@section('content')
    <!-- start page title -->
    <section class="wow animate__fadeIn bg-extra-dark-gray padding-25px-tb page-title-small">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <!-- start page title -->
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">About Us</h1>
                    <!-- end page title -->
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li>About Us</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="bg-light-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 text-center margin-2-half-rem-bottom sm-margin-1-half-rem-bottom">
                    <h5 class="alt-font font-weight-600 text-extra-dark-gray margin-5px-bottom">{{ $aboutUs->page_title }}</h5>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="row mb-2">
                <div class="col page-content">
                    {!! $aboutUs->page_content !!}
                </div>
            </div>
        </div>
    </section>
    
@endsection

@push('script')

@endpush
