@extends('frontend.layouts.app2')

@section('title', $tourPackage->title)

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
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">{{ $tourPackage->title }}</h1>
                    <!-- end page title -->
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li><a href="{{ route('hazz.package') }}" class="text-white-hover">Tour Package</a></li>
                        <li>{{ $tourPackage->title }}</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <section id="position-open" class="wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            {{-- <div class="row justify-content-center">
                <div class="col-12 col-lg-5 col-sm-7 text-center margin-5-rem-bottom sm-margin-3-rem-bottom">
                    <h5 class="alt-font font-weight-500 text-extra-dark-gray d-inline-block letter-spacing-minus-1-half">Ticketing Title</h5>
                </div>
            </div> --}}
            <div class="container py-4">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="card-body ">
                            <img style="max-width: 100%; display: block; margin: auto;" class="img-fluid" src="{{ asset('storage/' . $tourPackage->featured_image) }}" alt="" data-no-retina="">
                        </div>
                    </div>
                </div><br><br>

                <div class="row">
                    {!! $tourPackage->details !!}
                </div>
            </div>
        </div>
    </section>

    
@endsection

@push('script')

@endpush
