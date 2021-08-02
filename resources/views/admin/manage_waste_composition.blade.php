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
                       
                        <th style="min-width: 100px" class="text-dark-75" hidden>
                            <span class="text-dark-75">action</span>
                        </th>
                       <th hidden></th>
                       <th hidden></th>
                       <th hidden></th>
                       <th hidden></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td style="text-transform:uppercase;">
                            <span class="text-dark-75" style="font-weight: bold;">{{$row->city}}</span>
                        </td>
                        <td style="text-transform:uppercase;" >
                            <span class="text-dark-75" style="font-weight: bold;">{{$row->biodegradable}}</span>
                            
                        </td>

                        <td style="text-transform:uppercase;">

                            <span class="text-dark-75">{{$row->biodegradable_p}}</span>
                        </td>
                        <td style="text-transform:uppercase;" >
                            <span class="text-dark-75" style="font-weight: bold;">{{$row->recyclable}}</span>
                        </td>

                        <td style="text-transform:uppercase;">

                            <span class="text-dark-75" >{{$row->recyclable_p}}</span>
                        </td>

                        <td style="text-transform:uppercase;">

                            <span class="text-dark-75" style="font-weight: bold;">{{$row->residual}}</span>
                        </td>

                        <td style="text-transform:uppercase;" >
                            <span class="text-dark-75" >{{$row->residual_p}}</span>
                            
                        </td>

                        <td style="text-transform:uppercase;">

                            <span class="text-dark-75" style="font-weight: bold;">{{$row->special}}</span>
                        </td>

                        <td style="text-transform:uppercase;" >
                            <span class="text-dark-75" >{{$row->special_p}}</span>
                            
                        </td>
                       

                        <td style="text-transform:uppercase;">

                            <span class="text-dark-75" style="font-weight: bold;">{{$row->total_kg}}</span>
                        </td>
                       
                        <td class="pr-0 text-left" hidden>
                            <a id=edit vals="" data-toggle="modal" data-target="#modal-edit" class="btn btn-light-info font-weight-bolder font-size-sm">
                                <span class="svg-icon svg-icon-2x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Design\Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </a>
                        </td>
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
                    <select class="form-control sel_waste_a" id="sel_waste_a" name="sel_waste_a" style="width: 100%; text-transform:uppercase">
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
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Waste Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;City / Municipality</label><br>
                    <select class="form-control sel_muni_e" id="sel_muni_e" name="sel_muni_e" style="width: 100%;">
                        @foreach($city as $row)
                        <option value="{{$row->citymun_desc}}">{{$row->citymun_desc}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;Waste Type</label><br>
                    <select class="form-control sel_waste_e" id="sel_waste_e" name="sel_waste_e" style="width: 100%; text-transform:uppercase">
                        @foreach($type as $row)
                        <option value="{{$row->segregate_type_id}}">{{ strtoupper($row->segregate_type_name) }}</option>
                        @endforeach
                    </select>
                </div>
               
                <div class="form-group">
                    <label class="form-control-label">&nbsp;Percent</label>
                    <input id="tx_percent_e" class="form-control tx_percent_e" type="number" />
                </div>

                <div class="form-group">
                    <label class="form-control-label">&nbsp;Total (kg/day)</label>
                    <input id="tx_kgday_e" class="form-control tx_kgday_e" type="number" />
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
<script src="{{asset('assets/js/pages/crud/forms/widgets/input-mask.js')}}"></script>
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