@extends('frontend.layouts.app2')

@section('title', $countyServices->name)

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
                    <h1 class="alt-font text-white font-weight-400 no-margin-bottom text-center text-lg-left">
                    </h1>
                    <!-- end page title -->
                </div>
                <div
                    class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li><a href="#" class="text-white-hover">Business Countries</a></li>
                        <li></li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <section id="position-open" class="wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-5 col-sm-7 text-center">
                    <h5 class="alt-font font-weight-400 text-extra-dark-gray d-inline-block letter-spacing-minus-1-half">
                        {{ $countyServices->name }}</h5>
                </div>
            </div>
            <div class="container py-4">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="card-body ">
                            <img style="max-width: 100%; display: block; margin: auto;" class="img-fluid"
                                src="{{ asset('storage/' . $countyServices->image) }}" alt="" data-no-retina="">
                        </div>
                    </div>
                </div><br><br>

                <div class="row">
                    <div class="col-md-12">

                        <section class="big-section bg-light-gray">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-12 text-center margin-four-bottom">
                                        <h5 class="alt-font text-extra-dark-gray font-weight-600">Our services</h5>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    @if (count($countyServices->hazzPackages) > 0)
                                        <div class="col-12 col-xl-12 col-lg-12 col-md-12">
                                            <h6 class="text-extra-dark-gray alt-font font-weight-400">Hazz Package</h6>
                                            <ul class="list-style-01 text-extra-dark-gray">
                                                @foreach ($countyServices->hazzPackages as $hazzPackage)
                                                    <li><i class="fas fa-check text-extra-medium-gray"></i>
                                                        <a
                                                            href="{{ route('hazz.package.details', [$hazzPackage->id, Str::slug($hazzPackage->title)]) }}">
                                                            {{ $hazzPackage->title }}
                                                        </a>
                                                        <span
                                                            class="list-hover bg-white box-shadow-small border-radius-5px"></span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif


                                    <!-- Overseas Job======================= -->
                                    @if (count($countyServices->overseasJob) > 0)
                                        <div class="col-12 col-xl-12 col-lg-12 col-md-12">
                                            <h6 class="text-extra-dark-gray alt-font font-weight-400">Overseas Job</h6>
                                            <ul class="list-style-01 text-extra-dark-gray">
                                                @foreach ($countyServices->overseasJob as $overseasJob)
                                                    <li><i class="fas fa-check text-extra-medium-gray"></i>
                                                        <a
                                                            href="{{ route('overseas.job.details', [$overseasJob->id, Str::slug($overseasJob->job_title)]) }}">
                                                            {{ $overseasJob->job_title }}
                                                        </a>
                                                        <span
                                                            class="list-hover bg-white box-shadow-small border-radius-5px"></span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <!-- End Overseas Job======================= -->

                                    <!-- Ticketing ======================= -->
                                    @if (count($countyServices->ticketing) > 0)
                                        <div class="col-12 col-xl-12 col-lg-12 col-md-12">
                                            <h6 class="text-extra-dark-gray alt-font font-weight-400">Ticketing</h6>
                                            <ul class="list-style-01 text-extra-dark-gray">
                                                @foreach ($countyServices->ticketing as $ticketing)
                                                    <li><i class="fas fa-check text-extra-medium-gray"></i>
                                                        <a
                                                            href="{{ route('tour.package.details', [$ticketing->id, Str::slug($ticketing->title)]) }}">
                                                            {{ $ticketing->title }}
                                                        </a>
                                                        <span
                                                            class="list-hover bg-white box-shadow-small border-radius-5px"></span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <!-- End Ticketing======================= -->

                                    <!-- Gamca ======================= -->
                                    @if (count($countyServices->gamca) > 0)
                                        <div class="col-12 col-xl-12 col-lg-12 col-md-12">
                                            <h6 class="text-extra-dark-gray alt-font font-weight-400">Gamca</h6>
                                            <ul class="list-style-01 text-extra-dark-gray">
                                                @foreach ($countyServices->gamca as $gamca)
                                                    <li><i class="fas fa-check text-extra-medium-gray"></i>
                                                        <a
                                                            href="{{ route('gamca.details', [$gamca->id, Str::slug($gamca->title)]) }}">
                                                            {{ $gamca->title }}
                                                        </a>
                                                        <span
                                                            class="list-hover bg-white box-shadow-small border-radius-5px"></span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <!-- End Gamca======================= -->

                                    <!-- OrgContact ======================= -->
                                    @if (count($countyServices->orgcontact) > 0)
                                        <div class="col-12 col-xl-12 col-lg-12 col-md-12">
                                            <h6 class="text-extra-dark-gray alt-font font-weight-400">OrgContact</h6>
                                            <ul class="list-style-01 text-extra-dark-gray">
                                                @foreach ($countyServices->orgcontact as $orgcontact)
                                                    <li><i class="fas fa-check text-extra-medium-gray"></i>
                                                        <a
                                                            href="{{ route('org.contact.details', [$orgcontact->id, Str::slug($orgcontact->title)]) }}">
                                                            {{ $orgcontact->title }}
                                                        </a>
                                                        <span
                                                            class="list-hover bg-white box-shadow-small border-radius-5px"></span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <!-- End OrgContact======================= -->
                                </div>
                            </div>
                        </section>



                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')

@endpush
