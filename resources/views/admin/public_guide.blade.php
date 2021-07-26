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

    {{--<style>
        .card-block {
            padding: 12px;
            padding-top: 12px;
            padding-right: 12px;
            padding-bottom: 12px;
            padding-left: 12px;
        }


       /* .tt-query, 
        .tt-menu { 
            width: 500px;
            margin-top: 12px;
            padding: 8px 0;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0,0,0,.2);
            font-size: 100px;
            
        } */

        .tt-query {
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                
        }

        .tt-hint {
        color: #999
        }


        .tt-menu {    /* used to be tt-dropdown-menu in older versions */
        width: 500px;
        margin-top: 4px;
        padding: 4px 0;
        background-color: #fff;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
                border-radius: 4px;
        -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
            -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        .tt-suggestion {
        padding: 3px 20px;
        line-height: 24px;
        }

        .tt-suggestion.tt-cursor,.tt-suggestion:hover {
        color: #fff;
        background-color: #0097cf;

        }

        .tt-suggestion p {
        margin: 0;
        }
</style>--}}
    <style>
        .typeahead,
        .tt-query,
        .tt-hint {
            width: 396px;
            height: 30px;
            padding: 8px 12px;
            font-size: 24px;
            line-height: 30px;
            border: 2px solid #ccc;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 8px;
            outline: none;
        }

        .typeahead {
            background-color: #fff;
        }

        .typeahead:focus {
            border: 2px solid #0097cf;
        }

        .tt-query {
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
            color: #999
        }

        .tt-menu {
            width: 300px;
            margin: 12px 0;
            padding: 8px 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 8px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }

        .tt-suggestion {
            padding: 3px 20px;
            font-size: 15px;
            line-height: 24px;
            text-align: left;
        }

        .tt-suggestion:hover {
            cursor: pointer;
            color: #fff;
            background-color: #0097cf;
        }

        .tt-suggestion.tt-cursor {
            color: #fff;
            background-color: #0097cf;

        }

        .tt-suggestion p {
            margin: 0;
        }
        .input-group-text-new {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 0.65rem 1rem;
            margin-bottom: 0;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #3F4254;
            text-align: center;
            white-space: nowrap;
            background-color: #F3F6F9;
            border: 1px solid #E4E6EF;
            
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
                @include('admin.public_sidenav')
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
                                                    <span class="input-group-text" >
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
                <div class="content pt-0 d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Entry-->
                    <!--begin::Hero-->
                    @php $url = asset('assets/media/bg/search_bg.png') @endphp
                    <div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url('{{asset('assets/media/bg/bg-8.jpg')}}')">
                        <div class="container">
                            <!--begin::Topbar-->
                            <div class="d-flex justify-content-between align-items-center border-bottom border-white py-7">
                                <h3 class="h4 text-dark mb-0">Help Center</h3>
                                {{--<div class="d-flex">
										<a href="#" class="font-size-h6 font-weight-bold">Community</a>
										<a href="#" class="font-size-h6 font-weight-bold ml-8">Visit Blog</a>
									</div>--}}
                            </div>
                            <!--end::Topbar-->
                            <div class="d-flex align-items-stretch text-center flex-column py-40">
                                <!--begin::Heading-->
                                <h1 class="text-dark font-weight-bolder mb-12">How can we help?</h1>
                                <!--end::Heading-->
                               <!--begin::Form-->
                                <form class="d-flex position-relative w-2 m-auto">
                                    <div class="input-group-prepend">
                                        <!--begin::Icon-->
                                        <div class="input-group-prepend">
                                            <span class="input-group-text-new bg-white ">
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
                                        <!-- kt_typeahead_3 search_swm -->

                                        <!-- <input type="text" class="form-control h-auto border-0 py-7 px-1 font-size-h6"  id="search_swm" /> -->



                                        <input class="typeahead form-control h-auto py-5 px-1;" id="search_swm" type="text" dir="ltr" placeholder="Search Waste" autocomplete="off" spellcheck="false" style="width:300px; border-radius: 0.20rem; font-size:large; color:#5e7a66">


                                    </div>
                                    <!--end::Input-->
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                    </div>
                    <!--end::Hero-->
                    <!--begin::Section-->
                    <div class="container py-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <!--begin::Callout-->
                                <div class="card card-custom wave wave-animate-slow wave-dark mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-5">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
                                                <span class="svg-icon svg-icon-dark svg-icon-4x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>

                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <a class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3 count_waste">0</a>
                                                <div class="text-dark-75">Waste Count</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Callout-->
                            </div>

                            <div class="col-lg-6">
                                <!--begin::Callout-->
                                <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-5">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
                                                <span class="svg-icon svg-icon-success svg-icon-4x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Design\Pen-tool-vector.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path d="M11,3 L11,11 C11,11.0862364 11.0109158,11.1699233 11.0314412,11.2497543 C10.4163437,11.5908673 10,12.2468125 10,13 C10,14.1045695 10.8954305,15 12,15 C13.1045695,15 14,14.1045695 14,13 C14,12.2468125 13.5836563,11.5908673 12.9685588,11.2497543 C12.9890842,11.1699233 13,11.0862364 13,11 L13,3 L17.7925828,12.5851656 C17.9241309,12.8482619 17.9331722,13.1559315 17.8173006,13.4262985 L15.1298744,19.6969596 C15.051085,19.8808016 14.870316,20 14.6703019,20 L9.32969808,20 C9.12968402,20 8.94891496,19.8808016 8.87012556,19.6969596 L6.18269936,13.4262985 C6.06682778,13.1559315 6.07586907,12.8482619 6.2074172,12.5851656 L11,3 Z" fill="#000000" />
                                                            <path d="M10,21 L14,21 C14.5522847,21 15,21.4477153 15,22 L15,23 L9,23 L9,22 C9,21.4477153 9.44771525,21 10,21 Z" fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <a class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3 count_faci">0</a>
                                                <div class="text-dark-75">Facility Count</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Callout-->
                            </div>
                        </div><br>
                        <!--end::Hero-->
                        <div class="alert alert-custom alert-primary fade show no_data" role="alert" style="display: none;">
                            <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                            </div>
                            <div class="alert-text">No data found</div>
                        </div>
                        <!--begin::Section-->

                        <div class="row has_data_guide" style="display: none;">
                            <div class="col-lg-12">
                                <div class="card mb-8">
                                    <div class="card-body">
                                        <div class="p-6">
                                            <h2 class="text-dark mb-8">Waste Guide </h2>
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

                        <div class="row has_data_swm" style="display: none;">
                            <div class="col-lg-12">
                                <div class="card mb-8">
                                    <div class="card-body">
                                        <div class="p-6">
                                            <h2 class="text-dark mb-8">SWM Information</h2>
                                            <!--begin::Accordion-->
                                            <div class="accordion accordion-light accordion-light-borderless ">
                                                <!--begin::Item-->
                                                <div class="card card_div_swm">
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
                    </div>
                    <!--end::Section-->



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
    <code class="language-js">

    </code>

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
    <script src="{{asset('assets/js/pages/crud/forms/widgets/typeahead.js')}}"></script>
    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--end::Page Scripts-->
    <script>
        // Class definition
        var KTTypeahead = function() {

            // Private functions


            var demo3 = function() {
                //   var countries = new Bloodhound({
                //         datumTokenizer: function(d) { return d.tokens; },
                //         queryTokenizer: Bloodhound.tokenizers.whitespace,
                //       // url points to a json file that contains an array of country names, see
                //       // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                //       //prefetch: HOST_URL + '/api/?file=typeahead/countries.json'

                //       prefetch: base_url
                //   });


                //   console.log(countries)








            }


            return {
                // public functions
                init: function() {


                    demo3();


                }
            };
        }();

        jQuery(document).ready(function() {
            //KTTypeahead.init();
        });
    </script>
    <script>
        var search_val = "";

        $(document).ready(function() {

            $('#search_swm').keyup(function() {
                search_val = $('#search_swm').val();
            });

            $('#search_swm').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 3
                },

                {
                    limit: 5,

                    source: function(query, processSync, processAsync) {
                        console.log(search_val)
                        // processSync(['This suggestion appears immediately', 'This one too']);
                        return $.ajax({
                            url: base_url,
                            type: 'GET',
                            data: {
                                query: query,
                                search_val: search_val
                            },
                            dataType: 'json',
                            success: function(json) {
                                // in this example, json is simply an array of strings

                                return processAsync(json);
                            }
                        });
                    }
                });

        });



        var base_url = "{{asset('')}}" + 'waste/return';
        $('#search_swm').keypress(function(event) {




            var keycode = (event.keyCode ? event.keyCode : event.which);

            if (keycode == '13') {


                KTApp.blockPage({
                    overlayColor: '#000000',
                    state: 'danger',
                    message: 'Please wait...'
                });

                setTimeout(function() {
                    KTApp.unblockPage();
                }, 1000);

                setTimeout(function() {
                    var search_val = $('#search_swm').val();
                    $.ajax({

                        url: "{{route('search_waste_facility')}}",
                        method: "post",
                        data: {
                            _token: "{{csrf_token()}}",
                            search_swm: search_val
                        },
                        success: function(response) {

                            var len = response['waste_guide'].length;
                            console.log(len)
                            if (len > 0) {
                                $('.card_div').empty();
                                $('.no_data').hide();

                                for (var j = 0; j < len; j++) {


                                    w_name = response['waste_guide'][j]['waste_name'];
                                    s_type = response['waste_guide'][j]['segregate_type_name'];
                                    s_guide = response['waste_guide'][j]['segregate_guide'];


                                    const info = `Segregation Type: ${s_type}<br>Segregation Guide: ${s_guide} `

                                    const cards = `<div class="card-header" id="headingOne7">
                                                            <div class="card-title"  aria-expanded="true" role="button">
                                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Home\Bulb1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="9" r="8"/>
                                                                        <path d="M14.5297296,11 L9.46184488,11 L11.9758349,17.4645458 L14.5297296,11 Z M10.5679953,19.3624463 L6.53815512,9 L17.4702704,9 L13.3744964,19.3674279 L11.9759405,18.814912 L10.5679953,19.3624463 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                        <path d="M10,22 L14,22 L14,22 C14,23.1045695 13.1045695,24 12,24 L12,24 C10.8954305,24 10,23.1045695 10,22 Z" fill="#000000" opacity="0.3"/>
                                                                        <path d="M9,20 C8.44771525,20 8,19.5522847 8,19 C8,18.4477153 8.44771525,18 9,18 C8.44771525,18 8,17.5522847 8,17 C8,16.4477153 8.44771525,16 9,16 L15,16 C15.5522847,16 16,16.4477153 16,17 C16,17.5522847 15.5522847,18 15,18 C15.5522847,18 16,18.4477153 16,19 C16,19.5522847 15.5522847,20 15,20 C15.5522847,20 16,20.4477153 16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 C8,20.4477153 8.44771525,20 9,20 Z" fill="#000000"/>
                                                                    </g>
                                                                </svg><!--end::Svg Icon--></span>



                                                                <div class="card-label text-dark pl-4 j_name" style="text-transform: uppercase;">${w_name}</div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div id="collapseOne7" class="collapse show" aria-labelledby="headingOne7" data-parent="#accordionExample7">
                                                            <div class="card-body text-dark-50 font-size-lg pl-12">
                                                                <p style="text-transform: lowercase;" class="swm_info">${info}</p>
                                                                
                                                            </div>
                                                        </div>
                                                        `
                                    $('.card_div').append(cards);
                                    $('.has_data_guide').show();

                                }

                                $('.count_waste').text(len)

                                swm_facility(search_val)

                            } else {
                                $('.has_data_guide').hide();
                                $('.has_data_swm').hide();
                                $('.no_data').show();

                            }

                        },
                        error: function(error) {
                            console.log(error)
                        }
                    });




                }, 1000);



            }
        });

        function swm_facility(searchval) {

            $.ajax({
                url: "{{route('search_waste_facility')}}",
                method: "post",

                data: {
                    _token: "{{csrf_token()}}",
                    search_swm: searchval
                },
                success: function(response) {

                    var count_faci = response['facility'].length;
                    if (count_faci > 0) {


                        $('.card_div_swm').empty();

                        for (i = 0; i < count_faci; i++) {

                            var wd_display = "";
                            var unordered = response['facility'][i]['working_days'].split(',');

                            u_len = unordered.length;

                            var ordered = [];
                            for (var j = 0; j < u_len; j++) {

                                obj = {}; // <----- new Object
                                obj['day'] = unordered[j];
                                ordered.push(obj);

                            }
                            ordered = sort_days(ordered);
                            groupLength = ordered.length;

                            for (var y = 0; y < u_len; y++) {
                                var item = ordered[y]['day'];
                                ((y + 1) == (groupLength)) ? wd_display += item: wd_display += item + " , ";
                            }

                            j_address = response['facility'][i]['junkshop_address'];
                            j_name = response['facility'][i]['junkshop_name'];
                            j_a_mat = response['facility'][i]['acceptable_materials'];
                            j_hours = response['facility'][i]['working_hours'];




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
                                                                <p style="text-transform: lowercase;" class="swm_info">${info}</p>
                                                                
                                                            </div>
                                                        </div>
                                                        `
                            // maps

                            $('.card_div_swm').append(cards);
                            $('.has_data_swm').show();
                        }

                        $('.count_faci').text(count_faci)
                    }

                },
                error: function(response) {

                }
            });
        }

        function sort_days(ordered) {
            const sorter = {
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