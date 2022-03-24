@extends('frontend.layouts.app2')

@section('title', 'Overseas Job')

    @push('css')
        
    @endpush

@section('content')
    <!-- start page title -->
    <section class="wow animate__fadeIn bg-extra-dark-gray padding-25px-tb page-title-small">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <!-- start page title -->
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">Overseas Job</h1>
                    <!-- end page title -->
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li>Overseas Job</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <section class="big-section">
        <div class="container">
            {{-- <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-four-bottom">
                    <h6 class="mb-0 alt-font text-extra-dark-gray font-weight-500">Overseas Job</h6>
                </div>
            </div> --}}
            <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 justify-content-center">
                <!-- start services item -->
                @foreach ($overseasJobs as $overseasJob)
                    <div style="margin-bottom: 30px;" class="col md-margin-30px-bottom xs-margin-15px-bottom wow animate__fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <img src="{{ asset('storage/' . $overseasJob->featured_image) }}" alt="" data-no-retina="">
                    <div class="bg-white box-shadow-small padding-3-rem-all">
                        <span class="text-extra-dark-gray alt-font d-block font-weight-500 margin-10px-bottom">{{ $overseasJob->job_title }}</span>
                        <p>Lorem ipsum dolor sit amet, adipiscing elit sed do eiusmod incididunt.</p>
                        <div class="h-1px bg-medium-light-gray margin-25px-bottom w-100"></div>
                        <a class="text-small text-extra-dark-gray font-weight-500 text-uppercase alt-font d-block" href="{{ route('overseas.job.details', [$overseasJob->id, Str::slug($overseasJob->job_title)]) }}">more info<i class="ti-arrow-right float-right"></i></a>
                    </div>
                </div>
                @endforeach
                <!-- end services item -->
            </div>
        </div>
    </section>
    
@endsection

@push('script')

@endpush
