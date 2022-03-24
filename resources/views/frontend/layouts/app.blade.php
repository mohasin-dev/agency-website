<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from lithohtml.themezaa.com/home-consulting.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Feb 2021 07:45:38 GMT -->

<head>
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="ThemeZaa">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="description"
        content="Litho is a clean and modern design, BootStrap 4 responsive, business and portfolio multipurpose HTML5 template with 36+ ready homepage demos.">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    <!-- style sheets and font icons  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/font-icons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/theme-vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/responsive.css') }}" />

    <style type="text/css">
        section.big-section {
            padding: 60px 0;
        }

    </style>
    @stack('style')
</head>

<body data-mobile-nav-style="classic">
    <!-- start header -->
    <header class="header-with-topbar">
        <div
            class="navbar top-bar bg-white border-bottom border-color-black-transparent navbar-boxed d-none d-md-inline-block">
            <div class="container-fluid nav-header-container">
                <div class="col-12 text-center text-sm-left col-sm-auto mr-auto pl-lg-0">
                    <p class="text-medium m-0">Good business consulting! <a href="{{ route('contact.us') }}"
                            class="text-extra-dark-gray text-tussock-hover font-weight-500 text-decoration-underline">Get
                            started now?</a></p>
                </div>
                <div class="col-auto d-none d-sm-block text-right px-lg-0 font-size-0">
                    <div class="top-bar-contact">
                        @if ($settings->mobile)
                            <span class="top-bar-contact-list">
                                <i class="feather icon-feather-phone-call icon-extra-small text-extra-dark-gray"></i>
                                {{ $settings->mobile }}
                            </span>
                        @endif
                        @if ($settings->company_address)
                            <span class="top-bar-contact-list d-none d-md-inline-block no-border-right pr-0">
                                <i class="feather icon-feather-map-pin icon-extra-small text-extra-dark-gray"></i>
                                {{ $settings->company_address }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <nav
            class="navbar navbar-expand-lg navbar-dark bg-transparent border-bottom border-color-white-transparent header-light fixed-top navbar-boxed header-reverse-scroll">
            <div class="container-fluid nav-header-container">
                <div class="col-6 col-lg-2 mr-auto pl-lg-0">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('assets/frontend/images/logo-white.png') }}"
                            data-at2x="images/logo-white@2x.png" class="default-logo" alt="">
                        <img src="{{ asset('assets/frontend/images/logo-yellow-ochre.png') }}"
                            data-at2x="images/logo-yellow-ochre@2x.png" class="alt-logo" alt="">
                        <img src="{{ asset('assets/frontend/images/logo-fast-blue-black.png') }}"
                            data-at2x="images/logo-yellow-ochre@2x.png" class="mobile-logo" alt="">
                    </a>
                </div>
                <div class="col-auto menu-order px-lg-0">
                    <button class="navbar-toggler float-right" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav alt-font">
                            <li class="nav-item dropdown megamenu">
                                <a href="{{ route('home') }}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item dropdown simple-dropdown">
                                <a href="#" class="nav-link">About Us</a>
                                <i class="fa fa-angle-down dropdown-toggle" data-toggle="dropdown"
                                    aria-hidden="true"></i>
                                <ul class="dropdown-menu" role="menu">
                                    @if (count($aboutUs) > 0)
                                        @foreach ($aboutUs as $item)
                                            <li class="dropdown">
                                                <a
                                                    href="{{ route('about.us', [$item->id, Str::slug($item->page_title)]) }}">{{ $item->page_title }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                    <li class="dropdown">
                                        <a href="{{ route('staff') }}">Staff Info</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown simple-dropdown">
                                <a href="#" class="nav-link">Services</a>
                                <i class="fa fa-angle-down dropdown-toggle" data-toggle="dropdown"
                                    aria-hidden="true"></i>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown">
                                        <a href="{{ route('overseas.job') }}">Overseas Job</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="{{ route('hazz.package') }}">Hazz Package</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="{{ route('tour.package') }}">Ticketing</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="{{ route('gamca') }}">Gamca</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="{{ route('org.contact') }}">Org Contact</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown megamenu">
                                <a href="{{ route('career') }}" class="nav-link">Career</a>
                            </li>
                            <li class="nav-item dropdown megamenu">
                                <a href="{{ route('labar.diary') }}" class="nav-link">Labar Diary</a>
                            </li>
                            <li class="nav-item dropdown megamenu">
                                <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item dropdown megamenu">
                                <a href="{{ route('news') }}" class="nav-link">News</a>
                            </li>
                            <li class="nav-item dropdown megamenu">
                                <a href="{{ route('photo.gallery') }}" class="nav-link">Photo Gallery</a>
                            </li>
                            <li class="nav-item dropdown megamenu">
                                <a href="{{ route('agent') }}" class="nav-link">Be an Agent</a>
                            </li>
                            <li class="nav-item dropdown megamenu">
                                <a href="{{ route('contact.us') }}" class="nav-link">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')
    <!-- start footer -->
    <footer class="footer-consulting footer-dark bg-extra-dark-gray">
        <div class="footer-top padding-six-tb lg-padding-eight-tb md-padding-50px-tb">
            <div class="container">
                <div class="row">
                    <!-- start footer column -->
                    <div
                        class="col-12 col-lg-3 col-sm-6 order-sm-1 order-lg-0 last-paragraph-no-margin md-margin-40px-bottom xs-margin-25px-bottom">
                        <span
                            class="alt-font font-weight-500 d-block text-white margin-20px-bottom xs-margin-10px-bottom">{{ $settings->footer_about_us_title }}</span>
                        <p>{{ $settings->footer_about_us_description }}</p>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div
                        class="col-12 col-lg-2 offset-sm-1 col-sm-5 order-sm-2 order-lg-0 md-margin-40px-bottom xs-margin-25px-bottom">
                        <span
                            class="alt-font font-weight-500 d-block text-white margin-20px-bottom xs-margin-10px-bottom">Services</span>
                        <ul>
                            <li><a href="{{ route('overseas.job') }}">Overseas Job</a></li>
                            <li><a href="{{ route('hazz.package') }}">Hazz Package</a></li>
                            <li><a href="{{ route('tour.package') }}">Tour Package</a></li>
                            <li><a href="{{ route('gamca') }}">Gamca</a></li>
                        </ul>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div
                        class="col-12 col-lg-2 col-sm-5 offset-sm-1 offset-lg-0 order-sm-4 order-lg-0 xs-margin-25px-bottom">
                        <span
                            class="alt-font font-weight-500 d-block text-white margin-20px-bottom xs-margin-10px-bottom">Company</span>
                        <ul>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('agent') }}">Be an agent</a></li>
                            <li><a href="{{ route('career') }}">Job opportunities</a></li>
                            <li><a href="{{ route('contact.us') }}">Contact us</a></li>
                        </ul>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-12 col-xl-3 offset-xl-1 col-lg-4 col-sm-6 order-sm-3 order-lg-0">
                        <span
                            class="alt-font font-weight-500 d-block text-white margin-20px-bottom xs-margin-10px-bottom">Subscribe
                            to newsletter</span>
                        <p>Enter your email address for receiving valuable newsletters.</p>
                        <form action="https://lithohtml.themezaa.com/email-templates/subscribe-newsletter.php"
                            method="post">
                            <div class="newsletter-style-03 position-relative">
                                <input class="small-input border-color-medium-gray rounded m-0 required" name="email"
                                    placeholder="Enter your email address" type="email">
                                <input type="hidden" name="redirect" value="">
                                <button class="btn no-border text-medium submit" type="submit"><i
                                        class="feather icon-feather-mail icon-extra-small text-tussock m-0"></i></button>
                                <div class="form-results rounded position-absolute d-none"></div>
                            </div>
                        </form>
                    </div>
                    <!-- end footer column -->
                </div>
            </div>
        </div>
        <div class="footer-bottom padding-35px-tb border-top border-width-1px border-color-white-transparent">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-3 text-center text-md-left sm-margin-20px-bottom">
                        <a href="{{ route('home') }}l" class="footer-logo"><img
                                src="{{ asset('assets/frontend/images/logo-white.png') }}"
                                data-at2x="images/logo-white@2x.png" alt=""></a>
                    </div>
                    <div class="col-12 col-md-6 text-center last-paragraph-no-margin sm-margin-20px-bottom">
                        <p>© Copyright {{ date('Y') }}. All Rights Reserved.</p>
                    </div>
                    <div class="col-12 col-md-3 text-center text-md-right">
                        <div class="social-icon-style-12">
                            <ul class="extra-small-icon light">
                                <ul class="extra-small-icon light">
                                    @if ($settings->facebook_url)
                                        <li><a class="facebook" href="https://www.facebook.com/" target="_blank"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                    @endif

                                    @if ($settings->linkedin_url)
                                        <li><a class="twitter" href="http://www.linkedin.com/" target="_blank"><i
                                                    class="fab fa-linkedin"></i></a></li>
                                    @endif

                                    @if ($settings->twitter_url)
                                        <li><a class="twitter" href="http://www.twitter.com/" target="_blank"><i
                                                    class="fab fa-twitter"></i></a></li>
                                    @endif

                                    @if ($settings->instagram_url)
                                        <li><a class="instagram" href="http://www.instagram.com/" target="_blank"><i
                                                    class="fab fa-instagram"></i></a></li>
                                    @endif
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- start scroll to top -->
    <a class="scroll-top-arrow" href="javascript:void(0);"><i class="feather icon-feather-arrow-up"></i></a>
    <!-- end scroll to top -->
    <!-- javascript -->

    <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/theme-vendors.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/main.js') }}"></script>
</body>

<!-- Mirrored from lithohtml.themezaa.com/home-consulting.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Feb 2021 07:47:58 GMT -->

</html>
