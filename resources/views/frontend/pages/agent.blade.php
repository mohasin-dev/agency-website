@extends('frontend.layouts.app2')

@section('title', 'Agent')

    @push('css')

    @endpush

@section('content')

    <section class="wow animate__fadeIn bg-extra-dark-gray padding-25px-tb page-title-small">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <!-- start page title -->
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">Agent</h1>
                    <!-- end page title -->
                </div>
                <div
                    class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li>Agent</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <section class="big-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-six-bottom">
                    <h6 class="alt-font text-extra-dark-gray font-weight-500">Be an Agent</h6>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-xl-5 col-lg-10 col-md-10">
                    <form action="{{ route('agent.store') }}" method="post">
                        @csrf
                        @if (session('message'))
                            <div class="alert alert-success">
                                {!! session('message') !!}
                            </div>
                        @endif
                        <input class="@error('name') is-invalid @enderror large-input margin-25px-bottom border-radius-0px required" type="text" name="name" placeholder="Your name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input class="@error('email') is-invalid @enderror large-input margin-25px-bottom border-radius-0px required" type="email" name="email" placeholder="Your email address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input class="@error('contact_number') is-invalid @enderror large-input margin-25px-bottom border-radius-0px required" type="text" name="contact_number" placeholder="Mobile number">
                        @error('contact_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <textarea class="large-input margin-35px-bottom border-radius-0px" name="address" rows="5" placeholder="Your Address"></textarea>
                        <textarea class="large-input margin-35px-bottom border-radius-0px" name="message" rows="5" placeholder="Tell us something about yourself"></textarea>
                        <button class="btn btn-small btn-fancy btn-gradient-fast-blue-purple mb-0" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')

@endpush
