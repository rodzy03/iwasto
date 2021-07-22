<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>


    <meta charset="utf-8" />
    <title>IWasto | @yield('title')</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    @include('layouts.includes.base-css')
    <link rel="shortcut icon" href="{{asset('uploads/logo_green.png')}}" />
    <!--end::Page Vendors Styles-->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

    <style>
    .card-block {
        padding: 12px;
        padding-top: 12px;
        padding-right: 12px;
        padding-bottom: 12px;
        padding-left: 12px;
    }
    </style>

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile header-mobile-fixed">
        <!--begin::Logo-->
        <a href="index.html">
            <img alt="Logo" src="{{asset('uploads/logo_green.png')}}" class="logo-default max-h-30px" />
        </a>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <button class="btn p-0 burger-icon rounded-0 burger-icon-left" id="kt_aside_tablet_and_mobile_toggle">
                <span></span>
            </button>
            <button class="btn btn-hover-text-primary p-0 ml-3" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </button>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Aside-->
            <div class="aside aside-left d-flex flex-column flex-row-auto" id="kt_aside">
                <!--begin::Aside Menu-->
                <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                    <!--begin::Menu Container-->
                    <div id="kt_aside_menu" class="aside-menu min-h-lg-800px" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                        <!--begin::Menu Nav-->
                        <ul class="menu-nav">
                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                <a href="{{route('get_analytics')}}" class="menu-link">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">Dashboard</span>
                                </a>
                            </li>

                            <li class="menu-item " aria-haspopup="true">
                                <a href="{{route('get_routes')}}" class="menu-link">


                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Map\Direction2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M14,13.381038 L14,3.47213595 L7.99460483,15.4829263 L14,13.381038 Z M4.88230018,17.2353996 L13.2844582,0.431083506 C13.4820496,0.0359007077 13.9625881,-0.12427877 14.3577709,0.0733126292 C14.5125928,0.15072359 14.6381308,0.276261584 14.7155418,0.431083506 L23.1176998,17.2353996 C23.3152912,17.6305824 23.1551117,18.1111209 22.7599289,18.3087123 C22.5664522,18.4054506 22.3420471,18.4197165 22.1378777,18.3482572 L14,15.5 L5.86212227,18.3482572 C5.44509941,18.4942152 4.98871325,18.2744737 4.84275525,17.8574509 C4.77129597,17.6532815 4.78556182,17.4288764 4.88230018,17.2353996 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.000087, 9.191034) rotate(-315.000000) translate(-14.000087, -9.191034) " />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>

                                    <span class="menu-text">Collection Calendar</span>
                                </a>
                            </li>

                            <li class="menu-item {{ (Route::currentRouteName() == 'swm_facilities') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                                <a href="{{route('swm_facilities')}}" class="menu-link">


                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Map\Marker1.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>


                                    <span class="menu-text">SWM Facilities</span>
                                </a>
                            </li>









                        </ul>
                        <!--end::Menu Nav-->
                    </div>
                    <!--end::Menu Container-->
                </div>
                <!--end::Aside Menu-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header header-fixed">
                    <!--begin::Container-->
                    <div class="container d-flex align-items-stretch justify-content-between">
                        <!--begin::Left-->
                        <div class="d-none d-lg-flex align-items-center mr-3">
                            <!--begin::Aside Toggle-->
                            <button class="btn btn-icon aside-toggle ml-n3 mr-10" id="kt_aside_desktop_toggle">
                                <span class="svg-icon svg-icon-xxl svg-icon-dark-75">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Text/Align-left.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <rect fill="#000000" opacity="0.3" x="4" y="5" width="16" height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.3" x="4" y="13" width="16" height="2" rx="1" />
                                            <path d="M5,9 L13,9 C13.5522847,9 14,9.44771525 14,10 C14,10.5522847 13.5522847,11 13,11 L5,11 C4.44771525,11 4,10.5522847 4,10 C4,9.44771525 4.44771525,9 5,9 Z M5,17 L13,17 C13.5522847,17 14,17.4477153 14,18 C14,18.5522847 13.5522847,19 13,19 L5,19 C4.44771525,19 4,18.5522847 4,18 C4,17.4477153 4.44771525,17 5,17 Z" fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </button>
                            <!--end::Aside Toggle-->
                            <!--begin::Logo-->
                            <a href="index.html">
                                <img alt="Logo" src="{{asset('uploads/logo_green.png')}}" class="logo-sticky max-h-35px" />
                            </a>
                            <!--end::Logo-->
                            <!--begin::Desktop Search-->
                            {{--<div class="quick-search quick-search-inline ml-20 w-300px" id="kt_quick_search_inline">
                               
                                <!--begin::Search Toggle-->
                                <div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="0px,1px"></div>
                                <!--end::Search Toggle-->
                                <!--begin::Dropdown-->
                                <div class="dropdown-menu dropdown-menu-left dropdown-menu-lg dropdown-menu-anim-up">
                                    <div class="quick-search-wrapper scroll" data-scroll="true" data-height="350" data-mobile-height="200"></div>
                                </div>
                                <!--end::Dropdown-->
                            </div>--}}
                            <!--end::Desktop Search-->
                        </div>
                        <!--end::Left-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <!--begin::Tablet & Mobile Search-->
                            <div class="dropdown d-flex d-lg-none">
                                <!--begin::Toggle-->
                                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                    <div class="btn btn-icon btn-clean btn-lg btn-dropdown mr-1">
                                        <span class="svg-icon svg-icon-xl">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                </div>
                                <!--end::Toggle-->
                                <!--begin::Dropdown-->
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                    <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                                        <!--begin:Form-->
                                        <form method="get" class="quick-search-form">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <span class="svg-icon svg-icon-lg">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Search..." />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                        <!--end::Form-->
                                        <!--begin::Scroll-->
                                        <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325" data-mobile-height="200"></div>
                                        <!--end::Scroll-->
                                    </div>
                                </div>
                                <!--end::Dropdown-->
                            </div>
                            <!--end::Tablet & Mobile Search-->




                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Hero-->
                            <div class="card card-custom overflow-hidden position-relative mb-8">
                                <!--begin::SVG-->
                                <div class="position-absolute bottom-0 left-0 right-0 d-none d-lg-flex flex-row-fluid">
                                    <span class="svg-icon svg-icon-full flex-row-fluid svg-icon-dark opacity-3">
                                        <!--begin::Svg Icon | path:assets/media/bg/home-2-bg.svg-->

                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                @php $url = asset('assets/media/bg/search_bg.png') @endphp

                                <div class="position-absolute d-flex top-0 right-0 offset-lg-5 col-lg-7 opacity-30 opacity-lg-100">
                                    <span class="svg-icon svg-icon-full flex-row-fluid p-0 ">

                                        <img src="{{$url}}" alt="">
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::SVG-->
                                <!--begin::Hero Body-->
                                <div class="card-body d-flex justify-content-center flex-column col-lg-6 px-8 py-20 px-lg-20 py-lg-40">
                                    <!--begin::Heading-->
                                    <h2 class="text-dark font-weight-bolder mb-8"> Search SWM Facility</h2>
                                    <!--end::Heading-->
                                    <!--begin::Form-->
                                    <div class="d-flex position-relative flex-row-fluid" >
                                        <div class="input-group shadow-sm">
                                            <!--begin::Icon-->
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white border-0 py-7 px-8">
                                                    <span class="svg-icon svg-icon-xl">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Input-->
                                            
                                                <input type="text" class="form-control h-auto border-0 py-7 px-1 font-size-lg " id="search_swm" placeholder="Bote, Tanso" />
                                                

                                            
                                            <!--end::Input-->
                                        </div>
                                        
                                    </div>
                                    <!--end::Form-->
                                </div>
                                <!--end::Hero Body-->

                            </div>
                            
                            <!--end::Hero-->
                            <div class="alert alert-custom alert-primary fade show no_data" role="alert" style="display: none;">
                                <div class="alert-icon">
                                    <i class="flaticon-warning"></i>
                                </div>
                                <div class="alert-text">No data found</div>
                            </div>
                            <!--begin::Section-->
                            
                            <div class="row has_data" style="display: none;">
                                <div class="col-lg-12">
                                    <div class="card mb-8">
                                        <div class="card-body">
                                            <div class="p-6">
                                                <h2 class="text-dark mb-8">SWM Information </h2>
                                                <!--begin::Accordion-->
                                                <div class="accordion accordion-light accordion-light-borderless ">
                                                    <!--begin::Item-->
                                                    <div class="card card_div">
                                                        <!--begin::Header-->
                                                        
                                                       

                                                        
                                                         
                                                    </div>
                                                    <!--end::Item-->

                                                </div>
                                                <!--end::Accordion-->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-header">
                                    <div class="card-title">
                                        <span class="card-icon">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Chart-bar1.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5" />
                                                        <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5" />
                                                        <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero" />
                                                        <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <h3 class="card-label">SWM Facilities Map</h3>
                                    </div>

                                </div>

                            </div><br>


                            <br>
                            <!--end::Section-->
                            <div id='map' style='height: 700px; margin-top:-15px; '></div>




                        </div>
                        <!--end::Container-->

                    </div>
                    <!--end::Entry-->

                </div>
                <!--end::Content-->

                <!--begin::Footer-->
                <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-mutes font-weight-bold mr-2">2021©</span>
                            <a href="https://iwasto.ph" target="_blank" class="text-dark-75 text-hover-primary">Iwasto</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Nav-->
                        <div class="nav nav-dark order-1 order-md-2">
                            <a target="_blank" class="nav-link pr-3 pl-0">About</a>
                            <a target="_blank" class="nav-link px-3">Team</a>
                            <a target="_blank" class="nav-link pl-3 pr-0">Contact</a>
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->


    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                    <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </div>
    <!--end::Scrolltop-->


    @include('layouts.includes.base-js')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/widgets.js')}}"></script>
    <!--begin::Page Scripts(used by this page)-->
	<script src="{{asset('assets/js/pages/features/miscellaneous/blockui.js')}}"></script>
	<!--end::Page Scripts-->

    <script>
        mapboxgl.accessToken = "{{env('MAPBOX_KEY')}}";

        const default_location = [120.98471247769781, 14.605716595091552];

        var map = new mapboxgl.Map({
            container: 'map',
            center: default_location,
            zoom: 12,
            style: 'mapbox://styles/rodzy03/ckqvmvj271rvu17pn63lnpqfs',
            attributionControl: true

        });


        map.addControl(new mapboxgl.NavigationControl());
        var markerElement;
        get_locations();

        $('#search_swm').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            
            if(keycode == '13'){
                

                KTApp.blockPage({
                overlayColor: '#000000',
                state: 'danger',
                message: 'Please wait...'
                });

                setTimeout(function() {
                KTApp.unblockPage();
                }, 1000);
                
                setTimeout(function(){
                    $.ajax({
                    
                    url: "{{route('search_facilities')}}"
                    , method: "post"
                    , data: {_token: "{{csrf_token()}}", search_swm: $('#search_swm').val() }
                    , success: function(response) {

                        var len = response['result'].length;
                        
                        if(len > 0) 
                        {
                            $('.card_div').empty();
                            $('.marker').remove();
                            $('.has_data').show();
                            $('.no_data').hide();

                            for(var j=0; j<len; j++) 
                            {
                                var unordered = response['result'][j]['working_days'].split(',');
                                u_len = unordered.length;

                                var ordered = [];
                                for(var i=0; i < u_len; i++) {
                                    
                                    obj = {}; // <----- new Object
                                    obj['day'] = unordered[i];
                                    ordered.push(obj);
                                    
                                }
                                ordered = sort_days(ordered);

                                wd_display = (ordered.length > 1) ? ordered[0]['day'] + " To " + ordered[ordered.length-1]['day'] : ordered[0]['day'];
                                j_address = response['result'][j]['junkshop_address'];
                                j_name = response['result'][j]['junkshop_name'];
                                j_a_mat = response['result'][j]['acceptable_materials'];
                                j_hours = response['result'][j]['working_hours'];


                                
                                
                                const info = `Junkhop Address: ${j_address}<br>Acceptable Materials: ${j_a_mat}<br>Working Days: ${wd_display} ${j_hours}`
                                
                                const cards = `<div class="card-header" id="headingOne7">
                                                            <div class="card-title"  aria-expanded="true" role="button">
                                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Map\Marker2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000"/>
                                                                    </g>
                                                                </svg></span>


                                                                <div class="card-label text-dark pl-4 j_name" style="text-transform: uppercase;">${j_name}</div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div id="collapseOne7" class="collapse show" aria-labelledby="headingOne7" data-parent="#accordionExample7">
                                                            <div class="card-body text-dark-50 font-size-lg pl-12">
                                                                <p style="text-transform: capitalize;" class="swm_info">${info}</p>
                                                                
                                                            </div>
                                                        </div>
                                                        `
                            // maps
                                
                                $('.card_div').append(cards);
                                
                                markerElement = document.createElement('div')
                                markerElement.className = 'marker ' + response['result'][j]['swm_location_id']
                                markerElement.id = response['result'][j]['swm_location_id']

                                markerElement.style.backgroundImage = "url(https://media.giphy.com/media/AxJaiJ65agT7sVZ8tf/giphy.gif)"
                                markerElement.style.backgroundSize = 'cover'
                                markerElement.style.width = '50px'
                                markerElement.style.height = '50px'

                                
                                const content = `
                  
                  
                                        <div style="text-align:left;">&nbsp;
                                        <center>
                                        <img  src="{{asset('uploads/test')}}" />
                                        </center>
                                            <div class="card-block">
                                            <p style="text-transform:uppercase; color:#94cc7e; font-weight: bold; font-size: 13px; text-align:center">${j_name}</p>
                                            <hr style="height: 1px; background-color: gray;">
                                            <p class="card-text" style="font-size:10px; text-transform:uppercase;">
                                            <b>LOCATION : </b>${j_address}
                                            <br><b>WORKING DAYS : </b>${wd_display}
                                            <br><b>WORKING HOURS : </b>${j_hours}
                                            <br><b>ACCEPTABLE MATERIALS : </b>${j_a_mat}
                                            
                                            </p>
                                            </div>
                                        </div>

                                        `;
                                        


                                const popUp = new mapboxgl.Popup({
                                    closeButton: false,
                                    closeOnClick: true,
                                    closeOnMove: true,
                                    

                                }).setHTML(content).setMaxWidth("600px");


                                new mapboxgl.Marker(markerElement)
                                    .setLngLat([
                                        response['result'][j]['longhitude'],response['result'][j]['latitude']
                                    ])
                                    .setPopup(popUp)
                                    .addTo(map)
                            }

                        }
                        else {
                            $('.has_data').hide();
                            $('.no_data').show();
                            get_locations();
                        } 
                        
                    }
                    , error: function (error) {
                        console.log(error)
                    }
                });
                },1000);
                


            }
        });

        function get_locations() {

            setTimeout(function() {
                $.ajax({
                    url: "{{route('get_swm')}}",
                    method: "post",
                    
                    data: {
                        _token: "{{csrf_token()}}"
                    },
                    success: function(response) {
                        
                        if (response['data'].length > 0) {

                            for (i = 0; i < response['data'].length; i++) 
                            {
                                var unordered = response['data'][i]['working_days'].split(',');
                                u_len = unordered.length;

                                var ordered = [];
                                for(var j=0; j < u_len; j++) {
                                    
                                    obj = {}; // <----- new Object
                                    obj['day'] = unordered[j];
                                    ordered.push(obj);
                                    
                                }
                                ordered = sort_days(ordered);

                                wd_display = (ordered.length > 1) ? ordered[0]['day'] + " To " + ordered[ordered.length-1]['day'] : ordered[0]['day'];
                                j_address = response['data'][i]['junkshop_address'];
                                j_name = response['data'][i]['junkshop_name'];
                                j_a_mat = response['data'][i]['acceptable_materials'];
                                j_hours = response['data'][i]['working_hours'];


                                markerElement = document.createElement('div')
                                markerElement.className = 'marker ' + response['data'][i]['swm_location_id']
                                markerElement.id = response['data'][i]['swm_location_id']

                                markerElement.style.backgroundImage = "url(https://media.giphy.com/media/AxJaiJ65agT7sVZ8tf/giphy.gif)"
                                markerElement.style.backgroundSize = 'cover'
                                markerElement.style.width = '50px'
                                markerElement.style.height = '50px'

                                
                                const content = `
                  
                  
                                        <div style="text-align:left;">&nbsp;
                                        <center>
                                        <img  src="{{asset('uploads/test')}}" />
                                        </center>
                                            <div class="card-block">
                                            <p style="text-transform:uppercase; color:#94cc7e; font-weight: bold; font-size: 13px; text-align:center">${j_name}</p>
                                            <hr style="height: 1px; background-color: gray;">
                                            <p class="card-text" style="font-size:10px; text-transform:uppercase;">
                                            <b>LOCATION : </b>${j_address}
                                            <br><b>WORKING DAYS : </b>${wd_display}
                                            <br><b>WORKING HOURS : </b>${j_hours}
                                            <br><b>ACCEPTABLE MATERIALS : </b>${j_a_mat}
                                            
                                            </p>
                                            </div>
                                        </div>`
                                    ;

                                const popUp = new mapboxgl.Popup({
                                    closeButton: false,
                                    closeOnClick: true,
                                    closeOnMove: true,
                                    

                                }).setHTML(content).setMaxWidth("600px");


                                new mapboxgl.Marker(markerElement)
                                    .setLngLat([
                                        response['data'][i]['longhitude'],response['data'][i]['latitude']
                                    ])
                                    .setPopup(popUp)
                                    .addTo(map)

                            }
                        } else {
                            
                        }
                        
                    },
                    error: function(response) {
                        
                    }
                })
            }, 1000);

        }

        function sort_days(ordered) 
        {
            const sorter = 
                {
                // "sunday": 0, // << if sunday is first day of week
                    "monday": 1,
                    "tuesday": 2,
                    "wednesday": 3,
                    "thursday": 4,
                    "friday": 5,
                    "saturday": 6,
                    "sunday": 7
                }

            ordered.sort(function sortByDay(a, b) {
                let day1 = a.day.toLowerCase();
                let day2 = b.day.toLowerCase();
                return sorter[day1] - sorter[day2];
            });

            return ordered;
        }
    </script>

</body>
<!--end::Body-->

</html>