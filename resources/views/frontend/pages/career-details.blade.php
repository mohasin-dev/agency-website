@extends('frontend.layouts.app2')

@section('title', $career->job_title)

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
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">{{ $career->job_title }}</h1>
                    <!-- end page title -->
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li><a href="{{ route('career') }}" class="text-white-hover">Career</a></li>
                        <li>{{ $career->job_title }}</li>
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
                    <h5 class="alt-font font-weight-500 text-extra-dark-gray d-inline-block letter-spacing-minus-1-half">Job title</h5>
                </div>
            </div> --}}
            <div class="container py-4">
                <div class="row mb-2">
                    <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <strong>Job Responsibilities</strong>
                                </div>
                                <div class="card-body">
                                    {!! $career->job_responsibilities !!}
                                </div>
                            </div>
                           
                            @if ($career->educational_requirements)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <strong>Educational Requirements</strong>
                                </div>
                                <div class="card-body">
                                    {!! $career->educational_requirements !!}
                                </div>
                            </div>
                            @endif
                            @if ($career->experience_requirements)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <strong>Experience Requirements</strong>
                                </div>
                                <div class="card-body">
                                    {!! $career->experience_requirements !!}
                                </div>
                            </div>
                            @endif
                           
                            @if ($career->additional_requirements)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <strong>Additional Requirements</strong>
                                </div>
                                <div class="card-body">
                                    {!! $career->additional_requirements !!}
                                </div>
                            </div>
                            @endif

                            @if ($career->compensation_benefits)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <strong>Compensation And Other Benefits</strong>
                                </div>
                                <div class="card-body">
                                    {!! $career->compensation_benefits !!}
                                </div>
                            </div>
                            @endif
                            
                            @if ($career->apply_instruction)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <strong>Apply Instruction</strong>
                                </div>
                                <div class="card-body">
                                    {!! $career->apply_instruction !!}
                                </div>
                            </div>
                            @endif
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Job Summery</strong>
                            </div>
                            <div class="card-body ">
                                <p class="mb-0"><strong>Location</strong> : {{ $career->job_location }}</p>
                                <p class="mb-0"><strong>Deadline</strong>: {{ $career->deadline }}</p>
                                <p class="mb-0"><strong>Vacancy</strong>: {{ $career->vacancy }}</p>
                                <p class="mb-0"><strong>Salary</strong>: {{ $career->salary }}</p>
                                <p class="mb-0"><strong>Employment Status</strong>: {{ $career->employment_status }}</p>
                                <p class="mb-0"><strong>Published Date</strong>: {{ $career->created_at->toDateString() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

@push('script')

@endpush
