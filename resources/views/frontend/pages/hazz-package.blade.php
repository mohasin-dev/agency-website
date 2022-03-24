@extends('frontend.layouts.app2')

@section('title', 'Hazz Package')

    @push('css')

    @endpush

@section('content')
    <!-- start page title -->
    <section class="wow animate__fadeIn bg-extra-dark-gray padding-25px-tb page-title-small">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <!-- start page title -->
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">Hazz Package
                    </h1>
                    <!-- end page title -->
                </div>
                <div
                    class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li>Hazz Package</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <section class="big-section bg-light-gray">
        <div class="container">
            {{-- <div class="row justify-content-center"> 
                <div class="col-md-12 text-center margin-three-bottom">
                    <h6 class="mb-0 alt-font text-extra-dark-gray font-weight-500">Hazz Package</h6>
                </div>
            </div> --}}
            <div class="row row-cols-1 row-cols-lg-3 row-cols-sm-2 justify-content-center">
                <!-- start services item -->
                @foreach ($hazzPackages as $hazzPackage)
                    <div style="margin-bottom: 30px;" class="col md-margin-30px-bottom sm-margin-30px-bottom">
                        <div class="services-box-style-01 bg-extra-dark-gray box-shadow-large">
                            <div class="imagex-box position-relative overflow-hidden">
                                <img src="{{ asset('storage/' . $hazzPackage->featured_image) }}" alt="" />
                                <div class="services-box-hover align-items-center justify-content-center d-flex">
                                    <div class="services-icon">
                                        <a href="{{ route('hazz.package.details', [$hazzPackage->id, Str::slug($hazzPackage->title)]) }}"
                                            class="rounded-circle bg-white"><i
                                                class="fas fa-arrow-right text-dark-charcoal"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="position-relative text-center bg-white last-paragraph-no-margin padding-3-rem-tb padding-3-half-rem-lr">
                                <span
                                    class="alt-font font-weight-500 text-dark-charcoal text-uppercase d-block margin-5px-bottom">{{ $hazzPackage->title }}</span>
                                <p>Lorem ipsum consectetur adipiscing elit do eiusmod tempor incididunt.</p>
                                <div class="w-100 h-4px bg-fast-blue position-absolute left-0px bottom-0px d-block"></div>
                            </div>
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
