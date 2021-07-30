@extends('admin.dashboard')
@section('title','Waste Data')
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
            <h3 class="card-label">Waste Data List</h3>
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
           

            
            <!--begin::Button-->

        </div>
    </div>
    <div class="card-body" style="min-width: 100px;">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="kt_datatable">
                <thead>
                    <tr class="text-left text-uppercase">
                        <th style="min-width: 100%" class="pl-7">
                            <span class="text-dark-75">Waste Data Information</span>
                        </th>
                       
                       
                        <th style="min-width: 100%" class="text-dark-75">
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
                       
                        <td style="text-transform:uppercase;" >
                            <span class="text-dark-75" style="font-weight: bold;">{{$row->city}}</span>
                            <br><span style="font-size: 11px;">Population Projection Based on PSA 2020 : {!! (!empty($row->psa_population)) ? $row->psa_population  : "N/A" !!}</span>
                            <br><span style="font-size: 11px;">Waste Generation (kg/day) : {!! (!empty($row->gen_kg_day)) ? $row->gen_kg_day  : "N/A" !!}</span>
                            <br><span style="font-size: 11px;">Per Capita Waste Generation (kg/day) : {!! (!empty($row->per_capita_kg_day)) ? $row->per_capita_kg_day  : "N/A" !!}</span>
                            <br><span style="font-size: 11px;">Diverted Waste to MRF (kg/day) : {!! (!empty($row->mrf_kg_day)) ? $row->mrf_kg_day  : "N/A" !!}</span>
                            <br><span style="font-size: 11px;">Waste Diversion Rate (%) : {!! (!empty($row->diversion_rate)) ? $row->diversion_rate  : "N/A" !!}</span>
                            <br><span style="font-size: 11px;">Waste Disposed in Landfill (kg/day) : {!! (!empty($row->landfill)) ? $row->landfill  : "N/A" !!}</span>
                            <br><span style="font-size: 11px;">Waste Disposed % : {!! (!empty($row->disposed)) ? $row->disposed  : "N/A" !!}</span>



                        </td>

                      
                       
                        <td class="pr-0 text-left">
                            <a id=edit vals="{{$row->waste_data_id}}" data-toggle="modal" data-target="#modal-edit" class="btn btn-light-info font-weight-bolder font-size-sm">
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
                        <td hidden></td>
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
                <h5 class="modal-title">Add Waste Data</h5>
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
                    <label class="form-control-label">&nbsp;Population Projection Based on PSA 2020</label>
                    <input class="form-control tx_psa" type="number" />
                </div>

                <div class="form-group">
                    <label class="form-control-label">&nbsp;Waste Generation (kg/day)</label>
                    <input class="form-control tx_w_gen" type="number" />
                </div>

                <div class="form-group">
                    <label class="form-control-label">&nbsp;Per Capita Waste Generation (kg/day)</label>
                    <input class="form-control tx_w_capita" type="number" />
                </div>

                <div class="form-group">
                    <label class="form-control-label">&nbsp;Diverted Waste to MRF (kg/day)</label>
                    <input class="form-control tx_w_mrf" type="number" />
                </div>

                <div class="form-group">
                    <label class="form-control-label">&nbsp;Waste Diversion Rate (%)</label>
                    <input class="form-control tx_w_diver" type="number" />
                </div>

                <div class="form-group">
                    <label class="form-control-label">&nbsp;Waste Disposed in Landfill (kg/day)</label>
                    <input class="form-control tx_w_land" type="number" />
                </div>

                <div class="form-group">
                    <label class="form-control-label">&nbsp;Waste Disposed % </label>
                    <input class="form-control tx_w_dis" type="number" />
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

        sel_muni_a = $('select[name=sel_muni_a] option:selected').val();
        tx_psa = $('.tx_psa').val();
        tx_w_gen = $('.tx_w_gen').val();
        tx_w_capita = $('.tx_w_capita').val();
        tx_w_mrf = $('.tx_w_mrf').val();
        tx_w_diver = $('.tx_w_diver').val();
        tx_w_land = $('.tx_w_land').val();
        tx_w_dis = $('.tx_w_dis').val();
        

        url = "{{route('crud_waste_data')}}";
        status = "add";
        modal_id = "add_modal";
        data = {
            _token: "{{csrf_token()}}",
            city: sel_muni_a,
            gen_kg_day: tx_w_gen,
            psa_population: tx_psa,
            per_capita_kg_day: tx_w_capita,
            mrf_kg_day:tx_w_mrf,
            diversion_rate: tx_w_diver,
            landfill: tx_w_land,
            disposed:tx_w_dis,
            status:status


        };

        update(data, url, status, modal_id);
    });

    $(document).ready(function() {

    });


</script>
@endsection
@endsection