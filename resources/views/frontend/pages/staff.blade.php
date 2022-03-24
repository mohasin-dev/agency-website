@extends('frontend.layouts.app2')

@section('title', 'Staff Info')

    @push('css')
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
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">Staff Info</h1>
                    <!-- end page title -->
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li>Staff Info</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <section class="big-section border-bottom border-color-extra-light-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-six-bottom">
                    <h6 class="alt-font text-extra-dark-gray font-weight-500">Meet Our Team</h6>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center">
                <!-- start team member -->
                @foreach ($staffs as $staff)
                    <div class="col team-style-01 text-center md-margin-30px-bottom xs-margin-15px-bottom">
                    <figure class="border-radius-5px">
                        <div class="team-member-image">
                            @if ($staff->image)
                                <img alt="" src="{{ asset('storage/' . $staff->image) }}">
                            @else
                                <img alt="" src="{{ asset('assets/frontend/images/home-events-conference-img-11.jpg') }}">
                            @endif
                            <div class="team-overlay bg-transparent-gradient-shamrock-green-light-orange border-radius-5px"></div>
                        </div>
                        <figcaption class="align-items-center justify-content-center d-flex flex-column padding-20px-lr padding-30px-tb">
                            <span class="team-title d-block alt-font text-white">{{ $staff->name }}</span>
                            <span class="team-sub-title text-small d-block text-white text-uppercase">{{ $staff->designation }}</span>
                            <div class="social-icon w-100 position-absolute bottom-30px left-0px">
                                @if ($staff->facebook_url)
                                <a href="{{ $staff->facebook_url }}" target="_blank" class="text-white"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if ($staff->twitter_url)
                                <a href="{{ $staff->twitter_url }}" target="_blank" class="text-white"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if ($staff->linkedin_url)
                                <a href="{{ $staff->linkedin_url }}" target="_blank" class="text-white"><i class="fab fa-linkedin"></i></a>
                                @endif
                                @if ($staff->instagram_url)
                                <a href="{{ $staff->instagram_url }}" target="_blank" class="text-white"><i class="fab fa-instagram"></i></a>
                                @endif
                            </div>
                        </figcaption>
                    </figure>
                
                </div>
                @endforeach
                <!-- end team member -->
            </div>
        </div>
    </section>
    
@endsection

@push('script')

@endpush
