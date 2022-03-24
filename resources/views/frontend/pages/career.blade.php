@extends('frontend.layouts.app2')

@section('title', 'Career')

    @push('style')
    |<style type="text/css">
    .responsibilities p {
        display: inline!important;
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
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">Career</h1>
                    <!-- end page title -->
                </div>
                <div
                    class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li>Career</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <section id="position-open" class="wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    @foreach ($careers as $career)
                        <div class="card-header">
                                <div>
                                    <a style="text-decoration: none" href="{{ route('career.details', [$career->id, Str::slug($career->job_title)]) }}">
                                    <span style="color: #348334" class="text-blod h4">{{ $career->job_title }}</span>
                                    </a>
                                    <small class="float-right">{{ $career->created_at->diffForHumans() }}</small>
                                </div>
                                <div class="responsibilities mt-2">
                                    @if (strlen($career->job_responsibilities) >= 120)
                                    <strong>Job Responsibilities</strong>: {!! Str::limit($career->job_responsibilities,
                                    200) !!}...
                                    @else
                                        <strong>Job Responsibilities</strong>: {!! $career->job_responsibilities !!}
                                    @endif
                                </div>
                                <p class="mb-0"><i class="fas fa-map-marker pr-2"></i><strong>Job Location</strong>: {{ $career->job_location }}</p>
                                <p class="mb-0"><i class="fas fa-briefcase pr-2"></i><strong>Vacancy</strong>: {{ $career->vacancy }}</p>
                                <p class="mb-0"><i class="fas fa-calendar-alt pr-2"></i><strong>Deadline</strong>: {{ $career->deadline }}</p>
                        </div><br>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')

@endpush
