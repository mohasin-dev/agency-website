@extends('frontend.layouts.app2')

@section('title', $overseasJob->job_title)

    @push('css')

    @endpush

@section('content')
    <!-- start page title -->
    <section class="wow animate__fadeIn bg-extra-dark-gray padding-25px-tb page-title-small">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <!-- start page title -->
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">
                        {{ $overseasJob->job_title }}</h1>
                    <!-- end page title -->
                </div>
                <div
                    class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li><a href="{{ route('overseas.job') }}" class="text-white-hover">Overseas Job</a></li>
                        <li>{{ $overseasJob->job_title }}</li>
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
                    <h5 class="alt-font font-weight-500 text-extra-dark-gray d-inline-block letter-spacing-minus-1-half">{{ $overseasJob->job_title }}</h5>
                </div>
            </div> --}}
            <div class="container py-4">
                <div class="row mb-2">
                    <div class="col-md-8">
                        <div class="card-header">
                            <strong>Job Details</strong>
                        </div>
                        <div class="card-body ">
                            <img src="{{ asset('storage/' . $overseasJob->featured_image) }}" alt="" data-no-retina="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-header">
                            <strong>Job Summary</strong>
                        </div>
                        <div class="card-body ">
                            <p class="mb-0"><strong>Country</strong> : {{ $overseasJob->country->name }}</p>
                            <p class="mb-0"><strong>Company Name</strong>: {{ $overseasJob->company_name }}</p>
                            <p class="mb-0"><strong>Trade</strong>: {{ $overseasJob->trade }}</p>
                            <p class="mb-0"><strong>Visa Type</strong>: {{ $overseasJob->visa_type }}</p>
                            <p class="mb-0"><strong>Deadline</strong>: {{ $overseasJob->deadline }}</p>
                            <p class="mb-0"><strong>Working hour</strong>: {{ $overseasJob->working_hour }}</p>
                            <p class="mb-0"><strong>Contact duration</strong>: {{ $overseasJob->contact_duration }}</p>
                            <p class="mb-0"><strong>Salary</strong>: {{ $overseasJob->salary }}</p>
                        </div>
                    </div>
                </div><br><br>
                <div class="row">
                    <p class="text-center">{!! $overseasJob->details !!}</p>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')

@endpush
