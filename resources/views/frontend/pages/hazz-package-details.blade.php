@extends('frontend.layouts.app2')

@section('title', $hazzPackage->title)

    @push('css')
    
    @endpush

@section('content')
    <!-- start page title -->
    <section class="wow animate__fadeIn bg-extra-dark-gray padding-25px-tb page-title-small">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <!-- start page title -->
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">{{ $hazzPackage->title }}</h1>
                    <!-- end page title -->
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li><a href="{{ route('hazz.package') }}" class="text-white-hover">Hazz Package</a></li>
                        <li>{{ $hazzPackage->title }}</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <section id="position-open" class="pt-0 wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            {{-- <div class="row justify-content-center">
                <div class="col-12 col-lg-5 col-sm-7 text-center margin-5-rem-bottom sm-margin-3-rem-bottom">
                    <h5 class="alt-font font-weight-500 text-extra-dark-gray d-inline-block letter-spacing-minus-1-half">Packge Title</h5>
                </div>
            </div> --}}
            <div class="container py-4">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="card-body ">
                            <img style="max-width: 100%; display: block; margin: auto;" class="img-fluid" src="{{ asset('storage/' . $hazzPackage->featured_image) }}" alt="" data-no-retina="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
        .tab-style-06 .nav-tabs>li.nav-item {
            width: 16%;
            padding: 0;
        }
        .tab-style-06 .nav-tabs>li.nav-item>a.nav-link {
            padding: 0 0px 22px;
            color: #232323;
            font-weight: 600;
            border-width: 3px;
        }
    </style>
    <section class="pt-0 big-section wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row">
                <div class="col-12 tab-style-06 wow animate__fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                    <!-- start tab navigation -->
                    <ul class="nav nav-tabs text-center justify-content-center">
                        <li class="nav-item"><a class="alt-font nav-link text-uppercase active" data-toggle="tab" href="#monday">Package overview</a></li>
                        <li class="nav-item"><a class="alt-font nav-link text-uppercase" data-toggle="tab" href="#tuesday">Itinerary</a></li>
                        <li class="nav-item"><a class="alt-font nav-link text-uppercase" data-toggle="tab" href="#wednesday">Hotel details</a></li>
                        <li class="nav-item"><a class="alt-font nav-link text-uppercase" data-toggle="tab" href="#thursday">Notes</a></li>
                        <li class="nav-item"><a class="alt-font nav-link text-uppercase" data-toggle="tab" href="#friday">Policy</a></li>
                        <li class="nav-item"><a class="alt-font nav-link text-uppercase" data-toggle="tab" href="#fridayy">Rate & dates</a></li>
                    </ul>
                    <!-- end tab navigation -->                        
                    <div class="tab-content">
                        <!-- start tab content -->
                        <div class="tab-pane med-text fade in active show" id="monday">
                            <div class="panel-group time-table">
                                <div class="panel border-color-black-transparent">
                                    <div class="panel-heading">
                                        {!! $hazzPackage->package_overview !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane med-text fade in" id="tuesday">
                            <div class="panel-group time-table">
                                <div class="panel border-color-black-transparent">
                                    <div class="panel-heading">
                                        {!! $hazzPackage->itinerary !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane med-text fade in" id="wednesday">
                            <div class="panel-group time-table">
                                <div class="panel border-color-black-transparent">
                                    <div class="panel-heading">
                                        {!! $hazzPackage->hotel_details !!}
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane med-text fade in" id="thursday">
                            <div class="panel-group time-table">
                                <div class="panel border-color-black-transparent">
                                    <div class="panel-heading">
                                        {!! $hazzPackage->notes !!}
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane med-text fade in" id="friday">
                            <div class="panel-group time-table">
                                <div class="panel border-color-black-transparent">
                                    <div class="panel-heading">
                                        {!! $hazzPackage->policy !!}
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane med-text fade in" id="fridayy">
                            <div class="panel-group time-table">
                                <div class="panel border-color-black-transparent">
                                    <div class="panel-heading">
                                        {!! $hazzPackage->rate_and_dates !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

@push('script')

@endpush
