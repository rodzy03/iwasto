@extends('admin.dashboard')
@section('title','Patrol')
@section('content')

@section('extra-css')
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->


@endsection

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
            <h3 class="card-label">List</h3>
        </div>
        <div class="card-toolbar">
           
            {{--<button data-toggle="modal" data-target="#import_modal" type="button" class="btn btn-light-primary font-weight-bolder " aria-haspopup="true" aria-expanded="false">
                <span class="svg-icon svg-icon-2x">
                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Files\Import.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) " x="11" y="1" width="2" height="12" rx="1" />
                            <path d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                Import

            </button>--}}


            <!--end::Dropdown-->
            <!--begin::Button-->

        </div>
    </div>
    <div class="card-body">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="kt_datatable">
                <thead>
                    <div class="dropdown dropdown-inline font-weight-bolder">
                        <button type="button" class="btn btn-secondary btn-sm font-weight-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-download"></i>Tools
                        </button>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <ul class="navi flex-column navi-hover py-2">
                                <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Export Tools</li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" id="export_print">
                                        <span class="navi-icon">
                                            <i class="la la-print"></i>
                                        </span>
                                        <span class="navi-text">Print</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" id="export_copy">
                                        <span class="navi-icon">
                                            <i class="la la-copy"></i>
                                        </span>
                                        <span class="navi-text">Copy</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" id="export_excel">
                                        <span class="navi-icon">
                                            <i class="la la-file-excel-o"></i>
                                        </span>
                                        <span class="navi-text">Excel</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" id="export_csv">
                                        <span class="navi-icon">
                                            <i class="la la-file-text-o"></i>
                                        </span>
                                        <span class="navi-text">CSV</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" id="export_pdf">
                                        <span class="navi-icon">
                                            <i class="la la-file-pdf-o"></i>
                                        </span>
                                        <span class="navi-text">PDF</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><br><br>
                    <tr class="text-left text-uppercase">
                        <th style="min-width: 100px" class="pl-7">
                            <span class="text-dark-75">image</span>
                        </th>
                        <th style="min-width: 100px;">
                            <span class="text-dark-75">reported by</span>
                        </th>
                        
                        <th style="min-width: 100px;">
                            <span class="text-dark-75">location</span>
                        </th>
                        
                        <th style="min-width: 100px;">
                            <span class="text-dark-75">date reported</span>
                        </th>
                        <th style="min-width: 100px;">
                            <span class="text-dark-75">concern</span>
                        </th>
                        <th style="min-width: 100px;">
                            <span class="text-dark-75">description</span>
                        </th>
                        @if($typeofview == "pending")
                        <th style="min-width: 30px" class="text-dark-75">
                            <span class="text-dark-75">action</span>
                        </th>
                        @else
                        <th style="min-width: 30px" class="text-dark-75">
                            <span class="text-dark-75">remarks</span>
                        </th>
                        @endif
                        
                        <th style="min-width: 30px" class="text-dark-75" hidden>
                            <span class="text-dark-75">id</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                    <td class="pl-0 py-2" >
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50 symbol-light mr-4">
                                    <span class="symbol-label"> 
                                        <img src="{{asset('uploads/')}}/{{$row->file_path}}" class="h-75 align-self-end" alt="ERROR CONNECTION" id="img_id"/>
                                    </span>
                                </div>
                                <div>
                                    <a id=view data-toggle="modal" data-target="#modal-view" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" style="text-transform:uppercase; cursor:pointer;">VIEW IMAGE</a>
                                    
                                </div>
                            </div>
                        </td>
                        <td >
                            <span class="text-dark-75">{{$row->reported_by}}</span>
                        </td>
                        <td >
                            <span class="text-dark-75">{{$row->location}}</span>
                        </td>
                        
                        <td >
                            <span class="text-dark-75">{{$row->date_reported}}</span>
                        </td>
                        <td >
                            <span class="text-dark-75">{{$row->type}}</span>
                        </td>
                        <td >
                            <span class="text-dark-75">{{$row->description}}</span>
                        </td>

                        @if($typeofview == "pending")
                        <td class="pr-0 text-left" style="width: 14%;">

                            <a id=app vals="{{$row->citizen_patrol_id}}" data-toggle="modal" data-target="#modal-approved" class="btn btn-light-success font-weight-bolder font-size-sm">
                            <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\General\Like.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000"/>
                                        <rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1"/>
                                    </g>
                                </svg><!--end::Svg Icon-->
                            </span>

                            </a>
                            <a id=dec vals="{{$row->citizen_patrol_id}}" class="btn btn-light-primary font-weight-bolder font-size-sm" data-toggle="modal" data-target="#modal-declined">
                                <span class="svg-icon svg-icon-2x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Files\Deleted-folder.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3" />
                                            <path d="M10.5857864,14 L9.17157288,12.5857864 C8.78104858,12.1952621 8.78104858,11.5620972 9.17157288,11.1715729 C9.56209717,10.7810486 10.1952621,10.7810486 10.5857864,11.1715729 L12,12.5857864 L13.4142136,11.1715729 C13.8047379,10.7810486 14.4379028,10.7810486 14.8284271,11.1715729 C15.2189514,11.5620972 15.2189514,12.1952621 14.8284271,12.5857864 L13.4142136,14 L14.8284271,15.4142136 C15.2189514,15.8047379 15.2189514,16.4379028 14.8284271,16.8284271 C14.4379028,17.2189514 13.8047379,17.2189514 13.4142136,16.8284271 L12,15.4142136 L10.5857864,16.8284271 C10.1952621,17.2189514 9.56209717,17.2189514 9.17157288,16.8284271 C8.78104858,16.4379028 8.78104858,15.8047379 9.17157288,15.4142136 L10.5857864,14 Z" fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span></a>
                        </td>
                        @else
                        <td >
                            <span class="text-dark-75">{{$row->remarks}}</span>
                        </td>
                        @endif
                        <td hidden>{{asset('uploads/')}}/{{$row->file_path}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
</div>
<!--end::Card-->



<!-- Modal-->
<div class="modal fade" id="modal-view" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">VIEW ID</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <!-- <label class="form-control-label">Junkshop Name</label> -->
                    <img id="valid_id" src="" alt="image report" width="100%" height="auto">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{--<button type="button" class="btn btn-primary" id="submit_btn">Submit</button>--}}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-approved" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">APPROVE REPORT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label">Remarks</label>
                    <textarea id="remarks" cols="30" rows="2" class="form-control" ></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="verification_update">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-declined" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">DECLINE REPORT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label">Remarks</label>
                    <textarea id="remarks_d" cols="30" rows="2" class="form-control" ></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="verification_update_d">Submit</button>
            </div>
        </div>
    </div>
</div>



@section('extra-js')
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/widgets.js')}}"></script>
<script async defer data-website-id="273608d3-3d8f-402c-9ed1-76ed781a047e" src="https://analytics.iwasto.ph/umami.js"></script>
<!--end::Page Vendors-->


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

    $('#import_btn').click(function() {

        var data = new FormData();
        data.append("file", document.getElementById('inMainDocument').files[0]);
        data.append("_token", "{{csrf_token()}}");
        status = "file";
        modal_id = "import_modal";
        var url = "{{route('import_waste')}}";
        update(data, url, status, modal_id);
    });

    var id, status;
    $('#kt_datatable').on('click','#view', function(){
        let row = $(this).closest("tr"),
            file_path = $(row.find("td")[7]).text()

            console.log(file_path)
            $("#valid_id").attr("src",file_path);
    });

    $('#kt_datatable').on('click','#app', function(){
        id = $(this).attr('vals');
        status = "approved";
       
    });

    $('#kt_datatable').on('click','#dec', function(){
        id = $(this).attr('vals');
        status = "declined";
        
    });
    
    
    $('#submit_btn').click(function() {

        
        url = "{{route('crud_swm')}}";
        status = "add";
        modal_id = "add_modal";
        data = {
            _token: "{{csrf_token()}}",
            junkshop_name: $(".tx_junkshop_name").val(),
            junkshop_address: $(".tx_junkshop_adderess").val(),
            latitude: $(".tx_longhitude").val(),
            longhitude: $(".tx_latitude").val(),
            status:status
        };

        
        update(data, url, status, modal_id);
    });

    $('#verification_update').click(function() {

        url = "{{route('patrol_update')}}";
        
        modal_id = "modal-approved";
        data = {
            id:id,
            _token: "{{csrf_token()}}",
            remarks: $("#remarks").val(),
            status:status
        };

        console.log(data)
        update(data, url, status, modal_id);
    });

    $('#verification_update_d').click(function() {

        url = "{{route('patrol_update')}}";

        modal_id = "modal-declined";
        data = {
            id:id,
            _token: "{{csrf_token()}}",
            remarks: $("#remarks_d").val(),
            status:status
        };

        console.log(data)
        update(data, url, status, modal_id);
    });


    
</script>
@endsection
@endsection
