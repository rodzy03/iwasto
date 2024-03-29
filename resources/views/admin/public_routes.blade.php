<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>


    <meta charset="utf-8" />
    <title>IWASTO | Routes</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->

    @include('layouts.includes.base-css')
    <link rel="shortcut icon" href="{{asset('uploads/logo_green.png')}}" />

    <style>
        .card-block {
            padding: 12px;
            padding-top: 12px;
            padding-right: 12px;
            padding-bottom: 12px;
            padding-left: 12px;
        }

        /*
        @media (max-width: 991.98px)
        .header-mobile-fixed .header-mobile {
            display:none;
        } 
        */


        /* .panel-float {
            
            
            z-index: 1;
            opacity: 0.99;
            
            left: 170px;
            top: 750px ;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
        }


.flex-item {
  flex-basis: 100%;
  margin: 5px;
}

.floating-menu {
  position: absolute;
  z-index: 1; 

  margin: 30px;
  top: 700px;
  left:150px;
  right:50px;
  width: 200px;
  
} */
    </style>

</head>





<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile header-mobile-fixed" >
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

                @include('admin.public_sidenav')

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

                            <!--end::Desktop Search-->
                        </div>
                        <!--end::Left-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            

                            <div class="topbar-item mr-24">
                                <div class="btn btn-icon btn-sm btn-clean btn-text-dark-75" id="kt_quick_user_toggle" >
                                    <img alt="Logo" src="{{asset('uploads/other.png')}}" class="logo-sticky max-h-35px" />
                                </div>
                            </div>
                            
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                endif
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Dashboard-->

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
                                        <h3 class="card-label">Collection Routes</h3>
                                    </div>

                                </div>
                                <div class="card-body" style="min-width: 100px;">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
 <table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="kt_datatable">
                                            <thead>
                                                <tr class="text-left ">
                                                    <th style="min-width: 200px" class="pl-7">
                                                        <span class="text-dark-75">city</span>
                                                    </th>
                                                    <th style="min-width: 200px">
                                                        <span class="text-dark-75">route name</span>
                                                    </th>
                                                   
                                                    <th style="min-width: 200px">
                                                        <span class="text-dark-75">waste type</span>
                                                    </th>

                                                    <th style="min-width: 200px">
                                                        <span class="text-dark-75">&nbsp;</span>
                                                    </th>

                                                    <th ></th>
                                                    <th ></th>
                                                    <th ></th>
                                                    <th ></th>
                                                    <th ></th>
                                                    <th ></th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $row)
                                                <tr>
                                                    @php
                                                    $type_name = ($row->waste_type_name == "Both") ? "Non-biodegradable and Biodegradable" : $row->waste_type_name
                                                    @endphp

                                                    <td class="testclass">
                                                        <span class="text-dark-75" style="font-weight: bold;">{{ $row->city_municipality }}</span>
                                                    </td>

                                                    <td>
                                                        <span class="text-dark-75">{{$row->route_name}}</span>
                                                    </td>

                                                    <td>
                                                        <span class="text-dark-75">{{$type_name}}</span>
                                                    </td>
                                                    @php $collection = ($row->recurring == 1) ? $row->collection_days : $row->collection_date @endphp
                                                    <td >{{$row->route_details}}</td>
                                                    <td >{{$collection}}</td>
                                                    <td >{{$row->city_municipality}}</td>
                                                    <td >{{$row->route_name}}</td>
                                                    <td >{{$type_name}}</td>
                                                    <td >{{$row->collection_start}}</td>
                                                    <td >{{$row->collection_end}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                            </div>
                            <!--end::Card-->

                            <!--end::Dashboard-->
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
                            <a href="https://iwasto.ph" target="_blank" class="text-dark-75 text-hover-primary">IWASTO</a>
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

    <!--begin::Body-->

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
    <div class="modal fade " id="add_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body modal_card_div">
                    <div class="col-lg-12">
                        <div class="card mb-8">
                            <div class="card-body">



                                <div class="accordion accordion-light ">

                                    <div class="card ">


                                        <div class="card-header" id="headingOne7">
                                            <div class="card-title" aria-expanded="true" role="button">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Map\Marker2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000" />
                                                        </g>
                                                    </svg>
                                                </span>


                                                <div class="card-label text-dark pl-4 j_name" style="text-transform: uppercase;">Route Information</div>
                                            </div>
                                        </div>


                                        <div id="collapseOne7" class="collapse show" aria-labelledby="headingOne7" data-parent="#accordionExample7">
                                            <div class="card-body text-dark-50 font-size-md pl-2">
                                                <p class="route_info"></p>

                                            </div>
                                        </div>



                                    </div>
                                    <!--end::Item-->

                                </div>
                                <!--end::Accordion-->

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>



    @include('layouts.includes.base-js')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/widgets.js')}}"></script>
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/pages/features/miscellaneous/blockui.js')}}"></script>
    <!--end::Page Scripts-->


    <script>
 $(document).ready(function () {
        var table = $('#kt_datatable').DataTable({
            buttons: [
                'print',
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ],
            processing: true,
            responsive: true,
            "order": [[1, "asc"]]
        });
        $('#export_print').on('click', function (e) {
            e.preventDefault();
            table.button(0).trigger();
        });

        $('#export_copy').on('click', function (e) {
            e.preventDefault();
            table.button(1).trigger();
        });

        $('#export_excel').on('click', function (e) {
            e.preventDefault();
            table.button(2).trigger();
        });

        $('#export_csv').on('click', function (e) {
            e.preventDefault();
            table.button(3).trigger();
        });

        $('#export_pdf').on('click', function (e) {
            e.preventDefault();
 table.button(4).trigger();
        });
    });
        $(document).ready(function(){

	$('#kt_datatable').on('click','#view',function(){
                let row = $(this).parents("tr"),
                details = $(row.find("td:hidden")[4]).text(),
                collection = $(row.find("td")[5]).text(),
                city = $(row.find("td")[6]).text(),
                route_name = $(row.find("td")[7]).text(),
                typenae = $(row.find("td")[8]).text(),
                start = $(row.find("td")[9]).text(),
                end = $(row.find("td")[10]).text();
		console.log($(this).closest("tr").find(".testclass").text());
                wk_h = (start == "") ? "N/A" : start + ' to ' + end;
                const info = `<b>City : </b>${city}<br>
                <b>Route Name : </b>${route_name}<br>
                <b>Waste Classification : </b>${typenae}<br>
                <b>Route Details : </b><br>${details}<br>
                <b>Collection Date : </b>${collection}<br>
                <b>Working Hours : </b>${wk_h}`;
                $('.route_info').html(info);
                
            });

        });
    </script>

</body>
<!--end::Body-->

</html>
