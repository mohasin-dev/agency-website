@extends('frontend.layouts.app')

@section('title', 'Home Page')

    @push('css')

    @endpush

@section('content')
    <section class="p-0">
        <div class="container-fluid position-relative">
            <div class="row">
                <div class="swiper-container white-move full-screen md-h-650px sm-h-500px swiper-container-initialized swiper-container-horizontal"
                    data-slider-options="{ &quot;slidesPerView&quot;: 1, &quot;loop&quot;: true, &quot;autoplay&quot;: { &quot;delay&quot;: 4500, &quot;disableOnInteraction&quot;: false },  &quot;pagination&quot;: { &quot;el&quot;: &quot;.swiper-pagination&quot;, &quot;clickable&quot;: true }, &quot;navigation&quot;: { &quot;nextEl&quot;: &quot;.swiper-button-next-nav&quot;, &quot;prevEl&quot;: &quot;.swiper-button-previous-nav&quot; }, &quot;keyboard&quot;: { &quot;enabled&quot;: true, &quot;onlyInViewport&quot;: true }, &quot;effect&quot;: &quot;slide&quot; }"
                    style="height: 396px;">
                    <div class="swiper-wrapper"
                        style="transition-duration: 0ms; transform: translate3d(-4749px, 0px, 0px);">
                        <div class="swiper-slide cover-background swiper-slide-duplicate swiper-slide-duplicate-active"
                            style="background-image: url(&quot;{{ asset('assets/frontend/images/home-travel-agency-slider-img02.jpg') }}&quot;); width: 1583px;"
                            data-swiper-slide-index="2">
                            <div class="container h-100">
                                <div class="row justify-content-center h-100">
                                    <div
                                        class="col-12 col-xl-6 col-sm-7 d-flex flex-column justify-content-center text-center h-100">
                                        <span
                                            class="alt-font font-weight-500 text-extra-medium letter-spacing-2px text-white text-uppercase d-block margin-35px-bottom sm-margin-15px-bottom">Package
                                            start only $250</span>
                                        <h1
                                            class="alt-font font-weight-800 title-large text-white text-uppercase letter-spacing-minus-4px margin-45px-bottom sm-letter-spacing-minus-1px sm-margin-30px-bottom text-shadow-large sm-no-text-shadow xs-w-70 mx-auto">
                                            Summer season</h1>
                                        <a href="#"
                                            class="btn btn-fancy btn-large btn-dark-gray btn-box-shadow align-self-center">Discover
                                            Tour</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- start slider item -->
                        @foreach ($sliders as $slider)
                            <div class="swiper-slide cover-background swiper-slide-duplicate-next"
                                style="background-image: url(&quot;{{ asset('storage/' . $slider->file) }}&quot;); width: 1583px;"
                                data-swiper-slide-index="0">
                                <div class="container h-100">
                                    <div class="row justify-content-center h-100">
                                        <div
                                            class="col-12 col-xl-6 col-sm-7 d-flex flex-column justify-content-center text-center h-100">
                                            <span
                                                class="alt-font font-weight-500 text-extra-medium letter-spacing-2px text-white text-uppercase d-block margin-35px-bottom sm-margin-15px-bottom">{{ $slider->sub_heading }}</span>
                                            <h1
                                                class="alt-font font-weight-800 title-large text-white text-uppercase letter-spacing-minus-4px margin-45px-bottom sm-letter-spacing-minus-1px sm-margin-30px-bottom text-shadow-large sm-no-text-shadow xs-w-90 mx-auto">
                                                {{ $slider->heading }}</h1>
                                            @php
                                                $actionButtons = json_decode($slider->action_button);
                                            @endphp

                                            @foreach ($actionButtons->title as $key => $actionButton)
                                                @if ($actionButton)
                                                    <a href="{{ $actionButtons->url[$key] }}"
                                                        class="btn btn-fancy btn-large btn-dark-gray btn-box-shadow align-self-center">{{ $actionButton }}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- end slider item -->
                        <div class="swiper-slide cover-background swiper-slide-duplicate swiper-slide-next"
                            style="background-image: url(&quot;{{ asset('assets/frontend/images/home-travel-agency-slider-img03.jpg') }}&quot;); width: 1583px;"
                            data-swiper-slide-index="0">
                            <div class="container h-100">
                                <div class="row justify-content-center h-100">
                                    <div
                                        class="col-12 col-xl-6 col-sm-7 d-flex flex-column justify-content-center text-center h-100">
                                        <span
                                            class="alt-font font-weight-500 text-extra-medium letter-spacing-2px text-white text-uppercase d-block margin-35px-bottom sm-margin-15px-bottom">Package
                                            start only $250</span>
                                        <h1
                                            class="alt-font font-weight-800 title-large text-white text-uppercase letter-spacing-minus-4px margin-45px-bottom sm-letter-spacing-minus-1px sm-margin-30px-bottom text-shadow-large sm-no-text-shadow xs-w-90 mx-auto">
                                            Deserts discovery</h1>
                                        <a href="#"
                                            class="btn btn-fancy btn-large btn-dark-gray btn-box-shadow align-self-center">Discover
                                            Tour</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- start slider pagination -->
                    <div
                        class="swiper-pagination swiper-light-pagination d-sm-none swiper-pagination-clickable swiper-pagination-bullets">
                        <span class="swiper-pagination-bullet" tabindex="0" role="button"
                            aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0"
                            role="button" aria-label="Go to slide 2"></span><span
                            class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button"
                            aria-label="Go to slide 3"></span>
                    </div>
                    <!-- end slider pagination -->
                    <!-- start slider navigation -->
                    <div class="swiper-button-next-nav swiper-button-next rounded-circle slider-navigation-style-07 d-none d-sm-flex"
                        tabindex="0" role="button" aria-label="Next slide"><i class="feather icon-feather-arrow-right"></i>
                    </div>
                    <div class="swiper-button-previous-nav swiper-button-prev rounded-circle slider-navigation-style-07 d-none d-sm-flex"
                        tabindex="0" role="button" aria-label="Previous slide"><i
                            class="feather icon-feather-arrow-left"></i></div>
                    <!-- end slider navigation -->
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
        </div>
    </section>
    <!-- start section -->
    <section class="big-section bg-light-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-three-bottom">
                    <h6 class="mb-0 alt-font text-extra-dark-gray font-weight-500">Overseas Job</h6>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-3 row-cols-sm-2 justify-content-center">
                <!-- start services item -->
                @foreach ($overseasJobs as $overseasJob)
                    <div class="col md-margin-30px-bottom sm-margin-30px-bottom">
                        <div class="services-box-style-01 bg-extra-dark-gray box-shadow-large">
                            <div class="imagex-box position-relative overflow-hidden">
                                <img src="{{ asset('storage/' . $overseasJob->featured_image) }}" alt="" />
                                <div class="services-box-hover align-items-center justify-content-center d-flex">
                                    <div class="services-icon">
                                        <a href="{{ route('overseas.job.details', [$overseasJob->id, Str::slug($overseasJob->job_title)]) }}"
                                            class="rounded-circle bg-white"><i
                                                class="fas fa-arrow-right text-dark-charcoal"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="position-relative text-center bg-white last-paragraph-no-margin padding-3-rem-tb padding-3-half-rem-lr">
                                <span
                                    class="alt-font font-weight-500 text-dark-charcoal text-uppercase d-block margin-5px-bottom">{{ $overseasJob->job_title }}</span>
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

    <section class="big-section bg-dark-slate-blue border-top border-color-medium-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-seven-bottom">
                    <h6 class="alt-font text-white font-weight-500">Business Countries</h6>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-12">
                    <div class="swiper-container black-move swiper-container-initialized swiper-container-horizontal"
                        data-slider-options="{ &quot;slidesPerView&quot;: 1, &quot;loop&quot;: true, &quot;spaceBetween&quot;: 30, &quot;autoplay&quot;: { &quot;delay&quot;: 3000, &quot;disableOnInteraction&quot;: false }, &quot;navigation&quot;: { &quot;nextEl&quot;: &quot;.swiper-button-next-nav&quot;, &quot;prevEl&quot;: &quot;.swiper-button-previous-nav&quot; }, &quot;keyboard&quot;: { &quot;enabled&quot;: true, &quot;onlyInViewport&quot;: true }, &quot;breakpoints&quot;: { &quot;992&quot;: { &quot;slidesPerView&quot;: 2 } }, &quot;effect&quot;: &quot;slide&quot; }">
                        <div class="swiper-wrapper"
                            style="transition-duration: 0ms; transform: translate3d(-3510px, 0px, 0px);">

                            <!-- start services item -->
                            @foreach ($countries as $country)
                                <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0"
                                    style="width: 555px; margin-right: 30px;">
                                    <div class="row m-0 h-100">
                                        <div class="col-12 col-sm-6 cover-background xs-h-200px"
                                            style="background: url({{ asset('storage/' . $country->image) }});">
                                        </div>
                                        <div
                                            class="col-12 col-sm-6 d-flex padding-4-rem-all bg-white lg-padding-2-half-rem-all xs-padding-4-rem-all">
                                            <div class="align-self-center">
                                                <span
                                                    class="alt-font font-weight-500 text-uppercase text-slate-blue margin-10px-bottom d-block">{{ $country->name }}</span>
                                                <p>{{ $country->short_description }}</p>
                                                <a href="{{ route('country.details', [$country->id]) }}"
                                                    class="btn btn-fancy btn-very-small btn-slate-blue">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- end services item -->
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <!-- start slider navigation -->
                    <div class="swiper-button-previous-nav swiper-button-prev light slider-navigation-style-07 rounded-circle box-shadow-double-large"
                        tabindex="0" role="button" aria-label="Previous slide"><i
                            class="feather icon-feather-arrow-left"></i></div>
                    <div class="swiper-button-next-nav swiper-button-next light slider-navigation-style-07 rounded-circle box-shadow-double-large"
                        tabindex="0" role="button" aria-label="Next slide"><i class="feather icon-feather-arrow-right"></i>
                    </div>
                    <!-- end slider navigation -->
                </div>
            </div>
        </div>
    </section>




    <section class="big-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-four-bottom">
                    <h6 class="mb-0 alt-font text-extra-dark-gray font-weight-500">Hazz Package</h6>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 justify-content-center">
                <!-- start services item -->
                @foreach ($hazzPackages as $hazzPackage)
                    <div class="col md-margin-30px-bottom xs-margin-15px-bottom wow animate__fadeInUp"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <img src="{{ asset('storage/' . $hazzPackage->featured_image) }}" alt="" data-no-retina="">
                        <div class="bg-white box-shadow-small padding-3-rem-all">
                            <span
                                class="text-extra-dark-gray alt-font d-block font-weight-500 margin-10px-bottom">{{ $hazzPackage->title }}</span>
                            <p>{{ $hazzPackage->short_description }}</p>
                            <div class="h-1px bg-medium-light-gray margin-25px-bottom w-100"></div>
                            <a class="text-small text-extra-dark-gray font-weight-500 text-uppercase alt-font d-block"
                                href="{{ route('hazz.package.details', [$hazzPackage->id, Str::slug($hazzPackage->title)]) }}">more
                                info<i class="ti-arrow-right float-right"></i></a>
                        </div>
                    </div>
                @endforeach
                <!-- end services item -->
            </div>
        </div>
    </section>

    <section class="big-section bg-dark-slate-blue border-top border-color-medium-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-seven-bottom">
                    <h6 class="alt-font text-white font-weight-500">Tour Package</h6>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-12">
                    <div class="swiper-container black-move swiper-container-initialized swiper-container-horizontal"
                        data-slider-options="{ &quot;slidesPerView&quot;: 1, &quot;loop&quot;: true, &quot;spaceBetween&quot;: 30, &quot;autoplay&quot;: { &quot;delay&quot;: 3000, &quot;disableOnInteraction&quot;: false }, &quot;navigation&quot;: { &quot;nextEl&quot;: &quot;.swiper-button-next-nav&quot;, &quot;prevEl&quot;: &quot;.swiper-button-previous-nav&quot; }, &quot;keyboard&quot;: { &quot;enabled&quot;: true, &quot;onlyInViewport&quot;: true }, &quot;breakpoints&quot;: { &quot;992&quot;: { &quot;slidesPerView&quot;: 2 } }, &quot;effect&quot;: &quot;slide&quot; }">
                        <div class="swiper-wrapper"
                            style="transition-duration: 0ms; transform: translate3d(-3510px, 0px, 0px);">
                            <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2"
                                style="width: 555px; margin-right: 30px;">
                                <div class="row m-0 h-100">
                                    <div class="col-12 col-sm-6 cover-background xs-h-200px"
                                        style="background: url({{ asset('assets/frontend/images/gym-img-25.jpg') }});">
                                    </div>
                                    <div
                                        class="col-12 col-sm-6 d-flex padding-4-rem-all bg-white lg-padding-2-half-rem-all xs-padding-4-rem-all">
                                        <div class="align-self-center">
                                            <span
                                                class="alt-font font-weight-500 text-uppercase text-slate-blue margin-10px-bottom d-block">Sculpturing</span>
                                            <p>Lorem ipsum dolor amet consectetur adipiscing eiusmod tempor.</p>
                                            <a href="#" class="btn btn-fancy btn-very-small btn-slate-blue">Join classes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev"
                                data-swiper-slide-index="3" style="width: 555px; margin-right: 30px;">
                                <div class="row m-0 h-100">
                                    <div class="col-12 col-sm-6 cover-background xs-h-200px"
                                        style="background: url({{ asset('assets/frontend/images/gym-img-26.jpg') }});">
                                    </div>
                                    <div
                                        class="col-12 col-sm-6 d-flex padding-4-rem-all bg-white lg-padding-2-half-rem-all xs-padding-4-rem-all">
                                        <div class="align-self-center">
                                            <span
                                                class="alt-font font-weight-500 text-uppercase text-slate-blue margin-10px-bottom d-block">Cycling</span>
                                            <p>Lorem ipsum dolor amet consectetur adipiscing eiusmod tempor.</p>
                                            <a href="#" class="btn btn-fancy btn-very-small btn-slate-blue">Join classes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- start services item -->
                            @foreach ($tourPackages as $tourPackage)
                                <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0"
                                    style="width: 555px; margin-right: 30px;">
                                    <div class="row m-0 h-100">
                                        <div class="col-12 col-sm-6 cover-background xs-h-200px"
                                            style="background: url({{ asset('storage/' . $tourPackage->featured_image) }});">
                                        </div>
                                        <div
                                            class="col-12 col-sm-6 d-flex padding-4-rem-all bg-white lg-padding-2-half-rem-all xs-padding-4-rem-all">
                                            <div class="align-self-center">
                                                <span
                                                    class="alt-font font-weight-500 text-uppercase text-slate-blue margin-10px-bottom d-block">{{ $tourPackage->title }}</span>
                                                <p>{{ $tourPackage->short_description }}</p>
                                                <a href="{{ route('tour.package.details', [$tourPackage->id, Str::slug($tourPackage->title)]) }}"
                                                    class="btn btn-fancy btn-very-small btn-slate-blue">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- end services item -->

                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-active" data-swiper-slide-index="0"
                                style="width: 555px; margin-right: 30px;">
                                <div class="row m-0 h-100">
                                    <div class="col-12 col-sm-6 cover-background xs-h-200px"
                                        style="background: url({{ asset('assets/frontend/images/gym-img-08.jpg') }});">
                                    </div>
                                    <div
                                        class="col-12 col-sm-6 d-flex padding-4-rem-all bg-white lg-padding-2-half-rem-all xs-padding-4-rem-all">
                                        <div class="align-self-center">
                                            <span
                                                class="alt-font font-weight-500 text-uppercase text-slate-blue margin-10px-bottom d-block">Cardio</span>
                                            <p>Lorem ipsum dolor amet consectetur adipiscing eiusmod tempor.</p>
                                            <a href="#" class="btn btn-fancy btn-very-small btn-slate-blue">Join classes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-next" data-swiper-slide-index="1"
                                style="width: 555px; margin-right: 30px;">
                                <div class="row m-0 h-100">
                                    <div class="col-12 col-sm-6 cover-background xs-h-200px"
                                        style="background: url({{ asset('assets/frontend/images/gym-img-09.jpg') }});">
                                    </div>
                                    <div
                                        class="col-12 col-sm-6 d-flex padding-4-rem-all bg-white lg-padding-2-half-rem-all xs-padding-4-rem-all">
                                        <div class="align-self-center">
                                            <span
                                                class="alt-font font-weight-500 text-uppercase text-slate-blue margin-10px-bottom d-block">Crossfit</span>
                                            <p>Lorem ipsum dolor amet consectetur adipiscing eiusmod tempor.</p>
                                            <a href="#" class="btn btn-fancy btn-very-small btn-slate-blue">Join classes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <!-- start slider navigation -->
                    <div class="swiper-button-previous-nav swiper-button-prev light slider-navigation-style-07 rounded-circle box-shadow-double-large"
                        tabindex="0" role="button" aria-label="Previous slide"><i
                            class="feather icon-feather-arrow-left"></i></div>
                    <div class="swiper-button-next-nav swiper-button-next light slider-navigation-style-07 rounded-circle box-shadow-double-large"
                        tabindex="0" role="button" aria-label="Next slide"><i class="feather icon-feather-arrow-right"></i>
                    </div>
                    <!-- end slider navigation -->
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="big-section bg-light-gray wow animate__fadeIn">
        <div class="container">
            <div class="row overlap-gap-section">
                <div class="col-12 col-md-4 position-relative sm-padding-10-rem-bottom xs-padding-9-rem-bottom">
                    <h1 class="alt-font font-weight-600 text-extra-dark-gray letter-spacing-minus-2px margin-5-rem-bottom">
                        <span class="text-border text-border-color-black text-border-width-2px opacity-3">Proud</span>
                        stories
                    </h1>
                    <div
                        class="swiper-button-next-nav-02 swiper-button-next slider-navigation-style-03 white rounded-circle">
                        <i class="feather icon-feather-arrow-right"></i>
                    </div>
                    <div
                        class="swiper-button-previous-nav-02 swiper-button-prev slider-navigation-style-03 white rounded-circle">
                        <i class="feather icon-feather-arrow-left"></i>
                    </div>
                </div>
                <div class="col-12 col-xl-5 col-lg-6 offset-lg-1 col-md-8 swiper-simple-arrow-style-1"
                    data-wow-delay="0.2s">
                    <div class="swiper-container black-move"
                        data-slider-options='{ "loop": true, "slidesPerView": 1, "observer": true, "observeParents": true, "navigation": { "nextEl": ".swiper-button-next-nav-02", "prevEl": ".swiper-button-previous-nav-02" }, "autoplay": { "delay": 4500, "disableOnInteraction": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                        <div class="swiper-wrapper">
                            <!-- start testimonial item -->
                            @foreach ($testimonials as $testimonial)
                                <div class="swiper-slide">
                                    <span
                                        class="alt-font text-large line-height-38px md-line-height-32px letter-spacing-minus-1-half d-block margin-3-rem-bottom">{{ $testimonial->testimonial }}</span>
                                    <div class="feature-box feature-box-left-icon-middle">
                                        <div class="feature-box-icon margin-25px-right">
                                            @if ($testimonial->photo)
                                                <img class="rounded-circle w-85px h-85px"
                                                    src="{{ asset('storage/' . $testimonial->photo) }}" alt="" />
                                            @else
                                                <img class="rounded-circle w-85px h-85px"
                                                    src="{{ asset('assets/frontend/images/avtar29.jpg/' . $testimonial->photo) }}"
                                                    alt="" />
                                            @endif

                                        </div>
                                        <div class="feature-box-content">
                                            <div
                                                class="text-extra-dark-gray text-large alt-font line-height-20px text-gradient-peacock-blue-crome-yellow-2 text-uppercase d-inline-block">
                                                <span class="font-weight-600">{{ $testimonial->name }}</span>
                                            </div>
                                            <span
                                                class="alt-font text-medium d-block text-uppercase margin-5px-top">{{ $testimonial->designation }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- end testimonial item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="pt-0">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-two-top margin-two-bottom">
                    <h6 class="mb-0 alt-font text-extra-dark-gray font-weight-500">Newsfeed</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 blog-content padding-5px-lr sm-padding-15px-lr">
                    <ul class="blog-metro blog-wrapper grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-large"
                        style="position: relative; height: 1483px;">
                        <li class="grid-sizer"></li>
                        <!-- start blog item -->
                        @foreach ($news as $item)
                            <li class="grid-item last-paragraph-no-margin"
                                style="position: absolute; left: 0%; top: 1112.25px;">
                                <div class="blog-post">
                                    <div class="blog-post-image bg-dark-slate-blue">
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt="" data-no-retina="">
                                        <div class="blog-overlay"></div>
                                    </div>
                                    <div
                                        class="post-details d-flex flex-column align-item-start padding-3-half-rem-all xl-padding-2-rem-all">
                                        <div class="mb-auto w-100">
                                            <a href="blog-grid.html" class="blog-category alt-font">Concept</a>
                                        </div>
                                        <div class="align-self-end w-100">
                                            <a href="{{ route('news.details', [$item->id, Str::slug($item->title)]) }}"
                                                class="alt-font font-weight-500 text-small d-inline-block text-white text-uppercase opacity-6 margin-10px-bottom">{{ \Carbon\Carbon::parse($item->published_date)->format('d F Y') }}</a>
                                            <a href="{{ route('news.details', [$item->id, Str::slug($item->title)]) }}"
                                                class="alt-font text-white text-extra-large mb-0 d-block w-85 xl-w-100">{{ $item->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        <!-- end blog item -->
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
@endsection

@push('script')

@endpush
