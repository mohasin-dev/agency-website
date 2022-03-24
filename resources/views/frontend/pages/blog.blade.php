@extends('frontend.layouts.app2')

@section('title', 'Blog')

    @push('css')

    @endpush

@section('content')

    <section class="wow animate__fadeIn bg-extra-dark-gray padding-25px-tb page-title-small">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <!-- start page title -->
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom text-center text-lg-left">Blog</h1>
                    <!-- end page title -->
                </div>
                <div
                    class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <!-- start breadcrumb -->
                    <ul class="xs-text-center">
                        <li><a href="{{ route('home') }}" class="text-white-hover">Home</a></li>
                        <li>Blog</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-gray padding-90px-lr xl-padding-25px-lr lg-padding-10px-lr sm-no-padding-lr">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 text-center margin-4-rem-bottom">
                    <span class="w-2px h-35px bg-neon-orange d-inline-block margin-5px-bottom"></span>
                    <h5 class="alt-font letter-spacing-minus-1px text-extra-dark-gray font-weight-500">Most readable blogs
                    </h5>
                </div>
            </div>
        </div>
        <div class="container-fluid px-sm-0">
            <div class="row">
                <div class="col-12 blog-content sm-no-padding-lr">
                    <ul class="blog-masonry blog-wrapper grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-double-extra-large"
                        style="position: relative; height: 1962.25px;">
                        <li class="grid-sizer"></li>
                        <!-- start blog item -->
                        @foreach ($blogs as $item)
                            <li class="grid-item wow animate__fadeIn"
                                style="position: absolute; left: 0%; top: 0px; animation: 0s ease 0s 1 normal none running none;">
                                <div class="blog-post border-radius-5px bg-white">
                                    <div class="d-flex align-items-center font-weight-500 padding-30px-lr padding-15px-tb">
                                        <a href="blog-grid.html"
                                            class="text-small mr-auto text-slate-blue text-neon-orange-hover">{{ \Carbon\Carbon::parse($item->published_date)->format('d F Y') }}</a>
                                        <a href="blog-post-layout-01.html"
                                            class="blog-like text-extra-small text-neon-orange-hover"><i
                                                class="far fa-heart"></i><span>28</span></a>
                                        <a href="blog-post-layout-01.html"
                                            class="blog-comment text-extra-small text-neon-orange-hover"><i
                                                class="far fa-comment"></i><span>52</span></a>
                                    </div>
                                    <div class="blog-post-image">
                                        <a href="{{ route('blog.details', [$item->id, Str::slug($item->title)]) }}"
                                            title=""><img src="{{ asset('storage/' . $item->photo) }}" alt=""
                                                data-no-retina=""></a>
                                        <div class="alt-font blog-category">
                                            <a href="blog-grid.html"
                                                class="text-neon-orange text-extra-dark-gray-hover">Blog</a>
                                        </div>
                                    </div>
                                    <div
                                        class="post-details padding-3-rem-lr padding-2-half-rem-tb lg-padding-2-rem-all md-padding-2-half-rem-tb md-padding-3-rem-lr">
                                        <a href="{{ route('blog.details', [$item->id, Str::slug($item->title)]) }}"
                                            class="alt-font font-weight-500 text-extra-medium text-extra-dark-gray d-block margin-15px-bottom text-neon-orange-hover">{{ $item->title }}</a>
                                        <p>{{ $item->short_description }}</p>
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

@endsection

@push('script')

@endpush
