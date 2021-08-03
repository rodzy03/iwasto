@extends('admin.dashboard')
@section('title','Routes')
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
            <h3 class="card-label">Route List</h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            <button id=add data-toggle="modal" data-target="#add_modal" type="button" class="btn btn-light-success font-weight-bolder " aria-haspopup="true" aria-expanded="false">
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
                </span>Import

            </button>--}}


            <!--end::Dropdown-->
            <!--begin::Button-->

        </div>
    </div>
    <div class="card-body" style="min-width: 100px;">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="kt_datatable">
                <thead>
                    <tr class="text-left text-uppercase">
                        <th style="min-width: 160px" class="pl-7">
                            <span class="text-dark-75">route information</span>
                        </th>
                        <th style="min-width: 100px;" hidden>
                            <span class="text-dark-75">region</span>
                        </th>
                        <th style="min-width: 100px;">
                            <span class="text-dark-75">province</span>
                        </th>
                        <th style="min-width: 80px;">
                            <span class="text-dark-75">city / municipality</span>
                        </th>
                       
                        <th style="min-width: 100px" class="text-dark-75">
                            <span class="text-dark-75">action</span>
                        </th>
                        <th hidden>das</th>
                        <th hidden>region</th>
                        <th hidden>pro</th>
                        <th hidden>cit</th>
                        <th hidden>bara</th>
                        <th hidden>route</th>
                        <th hidden>details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td >

                            <span class="text-dark-75" style="font-weight: bold;">{{$row->route_name}}</span>
                            <br><span style="font-size: 11px;">Route Details : {!! (!empty($row->route_details)) ? $row->route_details : "N/A" !!}</span>
                        </td>

                        <td style="text-transform:uppercase;" hidden>

                            
                        </td>
                        <td >

                            <span class="text-dark-75">{{$row->province}}</span>
                        </td>
                        <td >

                            <span class="text-dark-75">{{$row->city_municipality}}</span>
                        </td>
                        

                        <td class="pr-0 text-left">
                            @if($row->active_flag == 1)
                            <a id=edit vals="{{$row->routes_id}}" data-toggle="modal" data-target="#modal-edit" class="btn btn-light-info font-weight-bolder font-size-sm">
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

                            <a id=deact vals="{{$row->routes_id}}" data-toggle="modal" data-target="#modal-upd" class="btn btn-light-primary font-weight-bolder font-size-sm">
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

                            @else
                            <a id=act vals="{{$row->routes_id}}" data-toggle="modal" data-target="#modal-upd" class="btn btn-light-success font-weight-bolder font-size-sm">
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
                        <td hidden>asd</td>
                        <td hidden>{{$row->region}}</td>
                        <td hidden>{{$row->province}}</td>
                        <td hidden>{{$row->city_municipality}}</td>
                        <td hidden>{{$row->barangay}}</td>
                        <td hidden>{{$row->route_name}}</td>
                        <td hidden>{{$row->route_details}}</td>
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

<!--begin::Modal-->
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="form-control-label">Route Name</label>
                    <input type="text" class="form-control tx_route_name" />
                </div>

                <div class="form-group" hidden>
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;Region</label><br>
                    <select id=sel_region_a class="form-control" name="sel_region_a" >
                       
                    </select>

                </div>
                <div class="form-group">
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;Province</label><br>
    
                    <select class="form-control sel_province_a" id="sel_province_a" name="sel_province_a" style="width: 100%;">
                        

                    </select>
        
                </div>
                <div class="form-group">
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;City / Municipality</label><br>
    
                    <select class="form-control sel_muni_a" id="sel_muni_a" name="sel_muni_a" style="width: 100%;">
                        

                    </select>
        
                </div>

               
                <div class="form-group">
                    <label class="form-control-label">&nbsp;Route Details</label>
                    <textarea id="tx_route_details" cols="30" rows="2" class="form-control tx_route_details" ></textarea>
                </div>


                

                <div class="form-group" hidden>
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;Barangay</label><br>
                    <select class="form-control sel_barangay_a" name="sel_barangay_a">

                    </select>

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add_btn">Submit</button>
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
                <h5 class="modal-title">Edit Route</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="form-control-labekt_select2_1l">Route Name</label>
                    <input type="text" class="form-control tx_route_name_e"  />
                </div>

                <div class="form-group" hidden>
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;Region</label><br>
                    <select id=sel_region_e class="form-control" name="sel_region_e" `>
                       
                    </select>

                </div>
                <div class="form-group">
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;Province</label><br>
    
                    <select class="form-control sel_province_e" id="sel_province_e" name="sel_province_e" style="width: 100%;">
                        

                    </select>
        
                </div>
                <div class="form-group">
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;City / Municipality</label><br>
    
                    <select class="form-control sel_muni_e" id="sel_muni_e" name="sel_muni_e" style="width: 100%;">
                        

                    </select>
        
                </div>
               
                <div class="form-group">
                    <label class="form-control-label">&nbsp;Route Details</label>
                    <textarea id="tx_route_details_e" cols="30" rows="2" class="form-control tx_route_details_e" ></textarea>
                </div>
                <div class="form-group" hidden>
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;Barangay</label><br>
                    <select id=sel_barangay_e class="form-control sel_barangay_e" name="sel_barangay_e">

                    </select>

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="update_btn">Submit</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->

@section('extra-js')
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/widgets.js')}}"></script>
<!--end::Page Vendors-->


<script>
    $('#kt_datatable').DataTable();
    $('#import_btn').click(function() {

        var data = new FormData();
        data.append("file", document.getElementById('inMainDocument').files[0]);
        data.append("_token", "{{csrf_token()}}");
        status = "file";
        modal_id = "import_modal";
        var url = "{{route('import_waste')}}";
        update(data, url, status, modal_id);
    });
    $('#sel_province_a').select2({
         placeholder: "Select Province"
    });

    $('#sel_muni_a').select2({
         placeholder: "Select Province"
    });

    $('#sel_province_e').select2({
         placeholder: "Select Province"
    });

    $('#sel_muni_e').select2({
         placeholder: "Select Province"
    });
    

    var id, stats;
    var is_edit = false,
        param_2, param_3, param_4, is_change = false;
    $('#kt_datatable').on('click', '#edit', function() {

        id = $(this).attr('vals');
        let row = $(this).closest("tr");
        param_1 = $(row.find("td")[6]).text();
        param_2 = $(row.find("td")[7]).text();
        param_3 = $(row.find("td")[8]).text();
        param_4 = $(row.find("td")[9]).text();
        is_edit = true;
        is_change = false;

        $('.tx_route_name_e').val($(row.find("td")[10]).text())
        $('.tx_route_details_e').val($(row.find("td")[11]).text())
        selectElement('sel_region_e', param_1)
        get_provinces(param_1);

    });

    $('#add').click(function() {
        is_edit = false;
    });

    $('#kt_datatable').on('click', '#act', function() {

        id = $(this).attr('vals');
        stats = "act"
        $('.header_txt').text('This will activate the data.')
    });

    $('#kt_datatable').on('click', '#deact', function() {

        id = $(this).attr('vals');
        stats = "deact"
        $('.header_txt').text('This will deactivate the data. Continue?');
    });

    $('#update_btn').click(function() {

        console.log($('.tx_route_details_e').val())
        region = $('select[name=sel_region_e] option:selected').val();
        province = $('select[name=sel_province_e] option:selected').val();
        city_muni = $('select[name=sel_muni_e] option:selected').val();
        barangay = $('select[name=sel_barangay_e] option:selected').val();

        url = "{{route('crud_routes')}}";
        status = "normal";
        modal_id = "modal-edit";
        data = {
            _token: "{{csrf_token()}}",
            status: status,
            region: region,
            province: province,
            city_muni: city_muni,
            barangay: barangay,
            route_name: $('.tx_route_name_e').val(),
            route_details: $('.tx_route_details_e').val(),
            
            id: id
        };


        update(data, url, status, modal_id);
    });

    $('#continue').click(function() {

        url = "{{route('crud_routes')}}";

        modal_id = "modal-upd";
        data = {
            _token: "{{csrf_token()}}",
            id: id,
            status: stats
        };

        update(data, url, status, modal_id);
    });

    $('#add_btn').click(function() {

        region = $('select[name=sel_region_a] option:selected').val();
        province = $('select[name=sel_province_a] option:selected').val();
        city_muni = $('select[name=sel_muni_a] option:selected').val();
        barangay = $('select[name=sel_barangay_a] option:selected').val();

        url = "{{route('crud_routes')}}";
        status = "add";
        modal_id = "add_modal";
        data = {
            _token: "{{csrf_token()}}",
            status: status,
            region: region,
            province: province,
            city_muni: city_muni,
            barangay: barangay,
            route_name: $('.tx_route_name').val(),
            route_details: $('.tx_route_details').val()

        };

        update(data, url, status, modal_id);
    });

    $(document).ready(function() {

        get_provinces($('#sel_region_a option:selected').val());


        $('#sel_region_a').on('change', function() {

            get_provinces($('#sel_region_a option:selected').val());
        });

        $('.sel_province_a').on('change', function() {

            get_municipality($('.sel_province_a option:selected').val());
        });

        $('.sel_muni_a').on('change', function() {

            get_barangay($('.sel_muni_a option:selected').val());
        });

        // edit
        $('#sel_region_e').on('change', function() {
            is_change = true;
            get_provinces($('#sel_region_e option:selected').val());
        });

        $('.sel_province_e').on('change', function() {
            is_change = true;
            get_municipality($('.sel_province_e option:selected').val());
        });

        $('.sel_muni_e').on('change', function() {
            is_change = true;
            get_barangay($('.sel_muni_e option:selected').val());
        });



    });

    function get_provinces(region) {

        $.ajax({
            url: "{{route('provinces')}}",
            method: "post",
            data: {
                _token: "{{csrf_token()}}",
                params: region
            },
            success: function(data) {

                if (is_edit == false) {
                    $('.sel_province_a').empty();
                    $('.sel_province_a').each(function(index, row) {
                        for (var i = 0; i < data['response'].length; i++) {
                            $(this).append($("<option>").text(data['response'][i]['province_desc']).val(data['response'][i]['province_desc']));
                        }
                    });
                    get_municipality($('#sel_province_a option:selected').val());
                } else {
                    $('.sel_province_e').empty();
                    $('.sel_province_e').each(function(index, row) {
                        for (var i = 0; i < data['response'].length; i++) {
                            $(this).append($("<option>").text(data['response'][i]['province_desc']).val(data['response'][i]['province_desc']));
                        }
                    });

                    if (is_change == false) {
                        selectElement('sel_province_e', param_2)
                        get_municipality(param_2)
                    } else {
                        get_municipality($('#sel_province_e option:selected').val());
                    }

                }

            },
            error: function() {
                console.log(data)
            }
        });
    }

    function get_municipality(region) {

        $.ajax({
            url: "{{route('municipality')}}",
            method: "post",
            data: {
                _token: "{{csrf_token()}}",
                params: region
            },
            success: function(data) {

                if (is_edit == false) {
                    $('.sel_muni_a').empty();
                    $('.sel_muni_a').each(function(index, row) {
                        for (var i = 0; i < data['response'].length; i++) {
                            $(this).append($("<option>").text(data['response'][i]['citymun_desc']).val(data['response'][i]['citymun_desc']));
                        }
                    });
                    get_barangay($('select[name=sel_muni_a] option:selected').val());
                } else {
                    $('.sel_muni_e').empty();
                    $('.sel_muni_e').each(function(index, row) {
                        for (var i = 0; i < data['response'].length; i++) {
                            $(this).append($("<option>").text(data['response'][i]['citymun_desc']).val(data['response'][i]['citymun_desc']));
                        }
                    });

                    if (is_change == false) {
                        selectElement('sel_muni_e', param_3)
                        get_barangay(param_3);
                    } else {
                        get_barangay($('select[name=sel_muni_e] option:selected').val());
                    }



                }


            },
            error: function() {
                console.log(data)
            }
        });
    }

    function get_barangay(city) {
        $.ajax({
            url: "{{route('barangay')}}",
            method: "post",
            data: {
                _token: "{{csrf_token()}}",
                params: city
            },
            success: function(data) {
                console.log(is_edit)
                if (is_edit == false) {
                    $('.sel_barangay_a').empty();
                    $('.sel_barangay_a').each(function(index, row) {
                        for (var i = 0; i < data['response'].length; i++) {
                            $(this).append($("<option>").text(data['response'][i]['barangay_desc']).val(data['response'][i]['barangay_desc']));
                        }
                    });
                } else {
                    $('.sel_barangay_e').empty();
                    $('.sel_barangay_e').each(function(index, row) {
                        for (var i = 0; i < data['response'].length; i++) {
                            $(this).append($("<option>").text(data['response'][i]['barangay_desc']).val(data['response'][i]['barangay_desc']));
                        }
                    });
                    if (is_change == false) {
                        selectElement('sel_barangay_e', param_4)
                    }
                }
            },
            error: function() {
                console.log(data)
            }
        });
    }
</script>
@endsection
@endsection