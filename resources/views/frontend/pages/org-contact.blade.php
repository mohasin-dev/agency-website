@extends('frontend.layouts.app2')

@section('title', 'Org Contact')

    @push('css')
        
    @endpush

@section('content')
    <!-- start page title -->
    <section class="wow animate__fadeIn bg-extra-dark-gray padding-25px-tb page-title-small">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <!-- start page title -->
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">Org Contact</h1>
                    <!-- end page title -->
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li>Org Contact</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <section class="big-section bg-light-gray border-top border-color-medium-gray">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-3 row-cols-md-1 justify-content-center">
                <!-- start services item -->
                @foreach ($orgContacts as $item)
                    <div class="col col-md-9 md-margin-30px-bottom xs-margin-15px-bottom wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
                        <div class="feature-box text-left box-shadow-large box-shadow-double-large-hover bg-white padding-4-rem-all lg-padding-3-rem-all md-padding-4-half-rem-all">
                            <div class="feature-box-content">
                                <h6 class="alt-font font-weight-600 d-block text-extra-dark-gray">{{ $item->title }}</h6>
                                <p>{{ $item->short_description }}</p>
                                <div class="h-1px bg-medium-gray margin-25px-bottom w-100"></div>
                                <a class="text-small font-weight-500 text-uppercase alt-font d-block text-extra-dark-gray" href="{{ route('org.contact.details', [$item->id, Str::slug($item->title)]) }}">More info<i class="feather icon-feather-arrow-right icon-extra-small float-right"></i></a>
                            </div>
                            <div class="feature-box-overlay bg-white"></div>
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
