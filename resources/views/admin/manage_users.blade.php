@extends('admin.dashboard')
@section('title','Users')
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
            <h3 class="card-label">Internal Users</h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            <button data-toggle="modal" data-target="#add_modal" type="button" class="btn btn-light-success font-weight-bolder " aria-haspopup="true" aria-expanded="false">
                <span class="svg-icon svg-icon-2x">
                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Code\Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                            <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Add

            </button>&nbsp;
            


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
                            <span class="text-dark-75">Fullname</span>
                        </th>
                        <th style="min-width: 100px;">
                            <span class="text-dark-75">Email</span>
                        </th>

                        <th style="min-width: 30px" class="text-dark-75">
                            <span class="text-dark-75">action</span>
                        </th>
                        <th hidden>fname</th>
                        <th hidden>mname</th>
                        <th hidden>lname</th>
                        <th hidden>email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="pl-0 py-0" style="width: 45%;">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50 symbol-light mr-4">
                                   
                                </div>
                                <div>
                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" >{{$row->firstname}} {{$row->middlename}} {{$row->lastname}}</a>
                                    {{--<span class="text-muted font-weight-bold d-block">HTML, JS, ReactJS</span>--}}
                                </div>
                            </div>
                        </td>
                        <td >

                            <span class="text-dark-75">{{$row->email}}</span>
                        </td>

                        <td class="pr-0 text-left">
                            @if($row->active_flag == 1)
                            <a id=edit vals="{{$row->id}}" data-toggle="modal" data-target="#modal-edit" class="btn btn-light-info font-weight-bolder font-size-sm">
                                <span class="svg-icon svg-icon-2x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Design\Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span></a>

                            <a id=deact vals="{{$row->id}}" data-toggle="modal" data-target="#modal-upd" class="btn btn-light-primary font-weight-bolder font-size-sm">
                                <span class="svg-icon svg-icon-2x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Files\Deleted-folder.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3" />
                                            <path d="M10.5857864,14 L9.17157288,12.5857864 C8.78104858,12.1952621 8.78104858,11.5620972 9.17157288,11.1715729 C9.56209717,10.7810486 10.1952621,10.7810486 10.5857864,11.1715729 L12,12.5857864 L13.4142136,11.1715729 C13.8047379,10.7810486 14.4379028,10.7810486 14.8284271,11.1715729 C15.2189514,11.5620972 15.2189514,12.1952621 14.8284271,12.5857864 L13.4142136,14 L14.8284271,15.4142136 C15.2189514,15.8047379 15.2189514,16.4379028 14.8284271,16.8284271 C14.4379028,17.2189514 13.8047379,17.2189514 13.4142136,16.8284271 L12,15.4142136 L10.5857864,16.8284271 C10.1952621,17.2189514 9.56209717,17.2189514 9.17157288,16.8284271 C8.78104858,16.4379028 8.78104858,15.8047379 9.17157288,15.4142136 L10.5857864,14 Z" fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </a>
                            <a id=reset vals="{{$row->id}}" data-toggle="modal" data-target="#modal-upd" class="btn btn-light-dark font-weight-bolder font-size-sm">
                                
                                <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Code\Info-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                        <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"/>
                                        <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                            </a>

                            @else
                            <a id=act vals="{{$row->id}}" data-toggle="modal" data-target="#modal-upd" class="btn btn-light-success font-weight-bolder font-size-sm">
                                <span class="svg-icon svg-icon-2x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\General\Like.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000" />
                                            <rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </a>
                            @endif
                        </td>
                        <td hidden>{{$row->firstname}}</td>
                        <td hidden>{{$row->middlename}}</td>
                        <td hidden>{{$row->lastname}}</td>
                        <td hidden>{{$row->email}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
</div>
<!--end::Card-->
<!--begin::Modal-->
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label class="form-control-label">Firstname</label>
                            <input type="text" class="form-control tx_fname_a" />
                        </div>
                        <div class="col-lg-4">
                            <label class="form-control-label">Middlename</label>
                            <input type="text" class="form-control tx_mname_a" />
                        </div>
                        <div class="col-lg-4">
                            <label class="form-control-label">Lastname</label>
                            <input type="text" class="form-control tx_lname_a" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input type="text" class="form-control tx_email_a" />
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">Password</label>
                        <input type="password" class="form-control tx_pass_a" />
                    </div>

                    

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submit_btn">Submit</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->

<!--begin::Modal-->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label class="form-control-label">Firstname</label>
                            <input type="text" class="form-control tx_fname_e" />
                        </div>
                        <div class="col-lg-4">
                            <label class="form-control-label">Middlename</label>
                            <input type="text" class="form-control tx_mname_e" />
                        </div>
                        <div class="col-lg-4">
                            <label class="form-control-label">Lastname</label>
                            <input type="text" class="form-control tx_lname_e" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input type="text" class="form-control tx_email_e" />
                    </div>

                    

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="update_btn">Submit</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->

<!--begin::Modal-->
<div class="modal fade" id="import_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inMainDocument">
                    <label class="custom-file-label" for="inMainDocument">Choose file</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="import_btn">Submit</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->



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
//     document.onclick= function(event) {
//     // Compensate for IE<9's non-standard event model
//     //
//     if (event===undefined) event= window.event;
//     var target= 'target' in event? event.target : event.srcElement;

//     alert('clicked on '+target.tagName);
// };

    $('#import_btn').click(function() {

        var data = new FormData();
        data.append("file", document.getElementById('inMainDocument').files[0]);
        data.append("_token", "{{csrf_token()}}");
        status = "file";
        modal_id = "import_modal";
        var url = "{{route('import_waste')}}";
        update(data, url, status, modal_id);
    });

    var id, stats;
    $('#kt_datatable').on('click', '#edit', function() {

        id = $(this).attr('vals');
        let row = $(this).closest("tr"),
            param_1 = $(row.find("td")[3]).text(),
            param_2 = $(row.find("td")[4]).text(),
            param_3 = $(row.find("td")[5]).text(),
            param_4 = $(row.find("td")[6]).text();

        $('.tx_fname_e').val(param_1);
        $('.tx_mname_e').val(param_2);
        $('.tx_lname_e').val(param_3);
        $('.tx_email_e').val(param_4);
        


    });

    $('#kt_datatable').on('click', '#act', function() {

        id = $(this).attr('vals');
        stats = "act"
        $('.header_txt').text('This will activate the data.');
        
    });

    $('#kt_datatable').on('click', '#deact', function() {

        id = $(this).attr('vals');
        stats = "deact"
        $('.header_txt').text('This will deactivate the data. Continue?');
        $('.div_pass').hide();
    });

    $('#kt_datatable').on('click', '#reset', function() {

        id = $(this).attr('vals');
        stats = "reset"
        $('.header_txt').text("Reset password. Continue?");
        $('.div_pass').show();
        newpass = generatePassword();
        $('.tx_pass_e').val(newpass);
        
    });

    function generatePassword() {
        var length = 10,
            charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
            retVal = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        return retVal;
    }

    $('#continue').click(function() {

        url = "{{route('crud_users')}}";

        modal_id = "modal-upd";
        data = {
            _token: "{{csrf_token()}}",
            id: id,
            status: stats,
            password:$('.tx_pass_e').val()
        };

        
        update(data, url, status, modal_id);
    });




    $('#submit_btn').click(function() {


        
        url = "{{route('crud_users')}}";
        status = "add";
        modal_id = "add_modal";
        data = {
            _token: "{{csrf_token()}}",
            firstname: $(".tx_fname_a").val(),
            middlename: $(".tx_mname_a").val(),
            lastname: $(".tx_lname_a").val(),
            email: $(".tx_email_a").val(),
            password: $(".tx_pass_a").val(),
            status: status

        };

        update(data, url, status, modal_id);
    });


    $('#update_btn').click(function() {


        url = "{{route('crud_users')}}";
        status = "normal";
        modal_id = "modal-edit";
        data = {
            _token: "{{csrf_token()}}",
            firstname: $(".tx_fname_e").val(),
            middlename: $(".tx_mname_e").val(),
            lastname: $(".tx_lname_e").val(),
            email: $(".tx_email_e").val(),
            status: status,
            id: id

        };


        update(data, url, status, modal_id);

    });
</script>
@endsection
@endsection