@extends('frontend.layouts.app2')

@section('title', 'Contact Us')

    @push('css')

    @endpush

@section('content')

    <section class="wow animate__fadeIn bg-extra-dark-gray padding-25px-tb page-title-small">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <!-- start page title -->
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">Contact Us</h1>
                    <!-- end page title -->
                </div>
                <div
                    class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <section class="wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-6 col-lg-7 text-center margin-4-half-rem-bottom md-margin-3-rem-bottom">
                            <span class="alt-font letter-spacing-minus-1-half text-extra-medium d-block margin-5px-bottom">Fill out the form and we’ll be in touch soon!</span>
                        </div>
                        <div class="col-12">
                            <!-- start contact form -->
                            <form action="{{ route('contact.us.store') }}" method="post">
                                @csrf
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {!! session('message') !!}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-12 sm-margin-25px-bottom">
                                        <input class="@error('name') is-invalid @enderror medium-input bg-white margin-25px-bottom required" type="text" name="name" placeholder="Your name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input class="@error('email') is-invalid @enderror medium-input bg-white margin-25px-bottom required" type="email" name="email" placeholder="Your email address">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input class="@error('contact_number') is-invalid @enderror medium-input bg-white margin-25px-bottom required" type="text" name="contact_number" placeholder="Your contact number">
                                        @error('contact_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input class="medium-input bg-white margin-25px-bottom " type="text" name="subject" placeholder="Subject">
                                     
                                        <textarea class="@error('message') is-invalid @enderror medium-textarea h-200px bg-white margin-25px-bottom required" name="message" placeholder="Your message"></textarea>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col text-center text-md-right">
                                        <button class="btn btn-medium btn-gradient-light-purple-light-orange mb-0" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                            <!-- end contact form -->
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div style="padding: 50px;" class="col-12">
                            <h5>Office Address</h5>
                            <ul style="list-style: none; margin-bottom: 30px;">
                                <li><strong>Address</strong> : {{ $settings->company_address }}</li>
                                <li><strong>Email</strong> : {{ $settings->email }}</li>
                                <li><strong>Mobile</strong> : {{ $settings->mobile }}</li>
                            </ul>
                            <h5>Get in touch</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos non repellat minus et rerum laudantium unde maxime tempora eum vero soluta neque nemo adipisci iure ipsum sequi odit, officia quas.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 100px;" class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-center">
                        {!!  $settings->office_location_map  !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')

@endpush
