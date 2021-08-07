@extends('admin.dashboard')
@section('title','Waste Composition')
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
            <h3 class="card-label">Waste Composition List</h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            @if(empty($is_public))
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
                </span>Add / Edit

            </button>&nbsp;
           @endif

            
            <!--begin::Button-->

        </div>
    </div>
    <div class="card-body" style="min-width: 100px;">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="kt_datatable">
                <thead>
                    <tr class="text-left text-uppercase">
                        <th style="min-width: 150px" class="pl-7">
                            <span class="text-dark-75">city municipality</span>
                        </th>
                        
                        <th style="min-width: 100%;">
                            <span class="text-dark-75">Biodegradable</span>
                        </th>
                        <th style="min-width: 100%;">
                            <span class="text-dark-75">%</span>
                        </th>

                        <th style="min-width: 100%;">
                            <span class="text-dark-75">Recyclable</span>
                        </th>
                        <th style="min-width: 100%;">
                            <span class="text-dark-75">%</span>
                        </th>
                        <th style="min-width: 100%;">
                            <span class="text-dark-75">Residual</span>
                        </th>
                        <th style="min-width: 100%;">
                            <span class="text-dark-75">%</span>
                        </th>
                        <th style="min-width: 100%;">
                            <span class="text-dark-75">Special</span>
                        </th>
                        <th style="min-width: 100%;">
                            <span class="text-dark-75">%</span>
                        </th>
                        
                        <th style="min-width: 100%;">
                            <span class="text-dark-75">total (kg/day)</span>
                        </th>
                        @if(empty($is_public))
                        <th style="min-width: 100px" class="text-dark-75" >
                            <span class="text-dark-75">action</span>
                        </th>
                        @endif
                       <th hidden></th>
                       <th hidden></th>
                       <th hidden></th>
                       <th hidden></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td >
                            <span class="text-dark-75" style="font-weight: bold;">{{$row->city}}</span>
                        </td>
                        <td  >
                            <span class="text-dark-75" style="font-weight: bold;">{{$row->biodegradable}}</span>
                            
                        </td>

                        <td >

                            <span class="text-dark-75">{{$row->biodegradable_p}}</span>
                        </td>
                        <td >
                            <span class="text-dark-75" style="font-weight: bold;">{{$row->recyclable}}</span>
                        </td>

                        <td >

                            <span class="text-dark-75" >{{$row->recyclable_p}}</span>
                        </td>

                        <td >

                            <span class="text-dark-75" style="font-weight: bold;">{{$row->residual}}</span>
                        </td>

                        <td  >
                            <span class="text-dark-75" >{{$row->residual_p}}</span>
                            
                        </td>

                        <td >

                            <span class="text-dark-75" style="font-weight: bold;">{{$row->special}}</span>
                        </td>

                        <td  >
                            <span class="text-dark-75" >{{$row->special_p}}</span>
                            
                        </td>
                       

                        <td >

                            <span class="text-dark-75" style="font-weight: bold;">{{$row->total_kg}}</span>
                        </td>
                        @if(empty($is_public))
                        <td class="pr-0 text-left" >
                            <a id=delete vals="{{$row->city}}" data-toggle="popover" data-placement="right" data-content="Delete Data" class="btn btn-dark font-weight-bolder font-size-sm">
                            <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg><!--end::Svg Icon-->
                            </span>

                            </a>
                        </td>
                        @endif
                        <td hidden>{{$row->city}}</td>
                        <td hidden></td>
                        <td hidden></td>
                        <td hidden>{{$row->total_kg}}</td>
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
                <h5 class="modal-title">Add Waste Composition</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;City / Municipality</label><br>
                    <select class="form-control sel_muni_a" id="sel_muni_a" name="sel_muni_a" style="width: 100%;">
                        @foreach($city as $row)
                        <option value="{{$row->citymun_desc}}">{{$row->citymun_desc}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;Waste Type</label><br>
                    <select class="form-control sel_waste_a" id="sel_waste_a" name="sel_waste_a" style="width: 100%; ">
                        @foreach($type as $row)
                        <option value="{{$row->segregate_type_id}}">{{ strtoupper($row->segregate_type_name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="alert alert-custom alert-notice alert-light-primary fade show mb-5 alert_waste" role="alert" style="display: none;">
                    <div class="alert-icon">
                        <i class="flaticon-warning"></i>
                    </div>
                    <div class="alert-text">NO WASTE GENERATION KG/DAY ON THIS CITY.</div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="ki ki-close"></i>
                            </span>
                        </button>
                    </div>
                </div>

                <div class="alert alert-custom alert-notice alert-light-success fade show mb-5 alert_found" role="alert" style="display: none;">
                    <div class="alert-icon">
                        <i class="flaticon-warning"></i>
                    </div>
                    <div class="alert-text">EXISTING DATA FOUND! EDITING DATA.</div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="ki ki-close"></i>
                            </span>
                        </button>
                    </div>
                </div>
                
                <div class="has_kg" style="display: none;">
                    
                
                    <div class="form-group">
                        <label class="form-control-label">&nbsp;Percent</label>
                        <input id="tx_percent" class="form-control tx_percent" type="number" />
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">&nbsp;Total (kg/day)</label>
                        <input id="tx_kgday" class="form-control tx_kgday" type="number" />
                    </div>
                </div>
                

            </div>
            <div class="modal-footer">
            <a href="{{route('get_waste_data')}}" class="btn btn-success add_waste" style="display: none;">Add Waste Data</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add_btn">Submit</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->

<!--begin::Modal-->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">NOTE!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="alert alert-custom alert-notice alert-light-dark fade show mb-5" role="alert" >
                    <div class="alert-icon">
                        <i class="flaticon-warning"></i>
                    </div>
                    <div class="alert-text">ARE YOU SURE YOU WANT TO DELETE THIS DATA? </div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="ki ki-close"></i>
                            </span>
                        </button>
                    </div>
                </div>
                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="delete_btn">Submit</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->

@section('extra-js')
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/widgets.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/input-mask.js')}}"></script>
<script async defer data-website-id="273608d3-3d8f-402c-9ed1-76ed781a047e" src="https://analytics.iwasto.ph/umami.js"></script>
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
    
    $('#sel_muni_a').select2({
         placeholder: "Select City"
    });

    $('#sel_waste_a').select2({
         placeholder: "Select Waste"
    });

    $('#sel_waste_e').select2({
         placeholder: "Select City"
    });


    $('#sel_muni_e').select2({
         placeholder: "Select Province"
    });
    var is_update = "false", compo_id = 0;
    $(document).ready(function(){
        $('.sel_muni_a').on('change',function(){
            check_exist();
        });

        $('.sel_waste_a').on('change',function(){
            check_exist();
        });
    });
    

    function check_exist() {
        city = $('select[name=sel_muni_a] option:selected').val();
        waste_type = $('select[name=sel_waste_a] option:selected').val();
        console.log(waste_type+"call")
        $.ajax({
            url:"{{route('search_waste_data')}}"
            , method:"post"
            , data: { _token:"{{csrf_token()}}", city:city, waste_type:waste_type }
            , success:function(response) {

                
                if(response['result'].length > 0) {
                    $('.has_kg').show();
                    $('.alert_waste').hide();
                    $('.add_waste').hide();
                    $('.alert_found').hide();
                    if(response['is_null'] > 0) {
                        $("select[name=sel_waste_a] option:selected").prop("selected", false);
                        $('.tx_kgday').val(response['result'][0]['total_kg']);
                        $('.tx_percent').val(response['result'][0]['percentage']);
                        $('#sel_waste_a').val(response['result'][0]['waste_type']);
                        compo_id = response['result'][0]['waste_composition_id'];
                        $('#add_btn').text("Update");
                        $('.alert_found').show();
                        is_update = "true";
                     } 
                     else {
                         $('.tx_percent').val("");
                         $('.tx_kgday').val(response['result'][0]['gen_kg_day']);
                         $('#add_btn').text("Submit");
                         is_update = "false";
                     }
                    $('.tx_kgday').prop('disabled',true)
                    $('#add_btn').show();
                }
                else {
                    $('.has_kg').hide();
                    $('.alert_waste').show();
                    $('.add_waste').show();
                    $('.alert_found').hide();
                    $('#add_btn').hide();
                    is_update = "false";
                }

            }
        })

    }
    

    var id, stats;
    var is_edit = false,
        param_2, param_3, param_4, is_change = false;
    $('#kt_datatable').on('click', '#edit', function() {

        id = $(this).attr('vals');
        let row = $(this).closest("tr");
        city = $(row.find("td")[5]).text();
        waste_type = $(row.find("td")[6]).text();
        percentage = $(row.find("td")[7]).text();
        total_kg = $(row.find("td")[8]).text();

        $('.tx_percent_e').val(percentage)
        $('.tx_kgday_e').val(total_kg)
        
        
        selectElement('sel_muni_e', city)
        selectElement('sel_waste_e', waste_type)

    });

    $('#kt_datatable').on('click', '#delete', function() {

        id = $(this).attr('vals');
        $('#delete_modal').modal('show');
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

    $('#delete_btn').click(function(){
        
        
        url = "{{route('crud_waste_composition')}}";
        status = "delete";
        modal_id = "delete_modal";
        data = {
            _token: "{{csrf_token()}}",
            id: id,
            status:status
        };
        
        update(data, url, status, modal_id);
    });

    $('#update_btn').click(function() {

        
        city_muni = $('select[name=sel_muni_e] option:selected').val();
        type = $('select[name=sel_waste_e] option:selected').val();
        percent = $('.tx_percent_e').val();
        kgday = $('.tx_kgday_e').val();

        url = "{{route('crud_waste_composition')}}";
        status = "normal";
        modal_id = "modal-edit";
        data = {
            _token: "{{csrf_token()}}",
            city: city_muni,
            waste_type: type,
            percentage: percent,
            total_kg: kgday,
            status:status,
            id: id
        };


        update(data, url, status, modal_id);
    });


    $('#add_btn').click(function() {

        city_muni = $('select[name=sel_muni_a] option:selected').val();
        type = $('select[name=sel_waste_a] option:selected').val();
        percent = $('.tx_percent').val();
        kgday = $('.tx_kgday').val();
        console.log(compo_id);

        url = "{{route('crud_waste_composition')}}";
        if(is_update == "true") {
            status = "normal";
            modal_id = "add_modal";
            data = {
                _token: "{{csrf_token()}}",
                city: city_muni,
                waste_type: type,
                percentage: percent,
                total_kg: kgday,
                status:status,
                id:compo_id
                
            };
        }
        else {
            status = "add";
            modal_id = "add_modal";
            data = {
                _token: "{{csrf_token()}}",
                city: city_muni,
                waste_type: type,
                percentage: percent,
                total_kg: kgday,
                status:status,
            };
        }
        

        update(data, url, status, modal_id);
    });

    $(document).ready(function() {

    });


</script>
@endsection
@endsection