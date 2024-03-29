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
                </span>Add

            </button>&nbsp;
           @endif

            
            <!--begin::Button-->

        </div>
    </div>
    <div class="card-body" style="min-width: 100px;">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="kt_datatable">
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
                <thead>
                    <tr class="text-left text-uppercase">
                        <th style="min-width: 100%">
                            <span class="text-dark-75">Waste Data Information</span>
                        </th>
                        <th style="min-width: 100%" class="text-dark-75">
                            <span class="text-dark-75">Waste Generation (kg/day)</span>
                        </th>
                        <th style="min-width: 100%" >
                            <span class="text-dark-75">Population Projection Based on PSA 2020</span>
                        </th>
                        <th style="min-width: 100%" class="text-dark-75">
                            <span class="text-dark-75">Per Capita Waste Generation</span>
                        </th>
                        <th style="min-width: 100%" class="text-dark-75">
                            <span class="text-dark-75">Diverted Waste to MRF (kg/day)</span>
                        </th>
                        <th style="min-width: 100%" class="text-dark-75">
                            <span class="text-dark-75">Waste Diversion Rate (%) </span>
                        </th>
                        
                        <th style="min-width: 100%" class="text-dark-75">
                            <span class="text-dark-75">Waste Disposed in Landfill (kg/day)</span>
                        </th>
                        <th style="min-width: 100%" class="text-dark-75">
                            <span class="text-dark-75">Waste Disposed % </span>
                        </th>
                        @if(empty($is_public))
                        <th style="min-width: 100%" class="text-dark-75">
                            <span class="text-dark-75">action</span>
                        </th>
                        @endif
                       <th hidden></th>
                       <th hidden></th>
                       <th hidden></th>
                       <th hidden></th>
                       <th hidden></th>
                       <th hidden></th>
                       <th hidden></th>
                       <th hidden></th>

                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                       
                        <td  >
                            <span class="text-dark-75" style="font-weight: bold;">{{$row->city}}</span>
                        </td>
                        <td  >
                            <span class="text-dark-75" >{{$row->gen_kg_day}}</span>
                        </td>
                        <td  >
                            <span class="text-dark-75" >{{$row->psa_population}}</span>
                        </td>

                        <td  >
                            <span class="text-dark-75" >{{$row->per_capita_kg_day}}</span>
                        </td>

                        <td  >
                            <span class="text-dark-75" >{{$row->mrf_kg_day}}</span>
                        </td>

                        <td  >
                            <span class="text-dark-75" >{{$row->diversion_rate}}</span>
                        </td>

                        <td  >
                            <span class="text-dark-75" >{{$row->landfill}}</span>
                        </td>

                        <td >
                            <span class="text-dark-75" >{{$row->disposed}}</span>
                        </td>
                        @if(empty($is_public))
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

                            <a id=delete vals="{{$row->waste_data_id}}" data-toggle="popover" data-placement="right" data-content="Delete Data" class="btn btn-dark font-weight-bolder font-size-sm">
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
                        <td hidden>{{$row->psa_population}}</td>
                        <td hidden>{{$row->gen_kg_day}}</td>
                        <td hidden>{{$row->per_capita_kg_day}}</td>
                        <td hidden>{{$row->mrf_kg_day}}</td>
                        <td hidden>{{$row->diversion_rate}}</td>
                        <td hidden>{{$row->landfill}}</td>
                        <td hidden>{{$row->disposed}}</td>
                        
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
                    <label class="form-control-label">&nbsp;Population Projection Based on PSA 2020</label>
                    <input class="form-control tx_psa_e" type="number" />
                </div>

                <div class="form-group">
                    <label class="form-control-label">&nbsp;Waste Generation (kg/day)</label>
                    <input class="form-control tx_w_gen_e" type="number" />
                </div>

                <div class="form-group">
                    <label class="form-control-label">&nbsp;Per Capita Waste Generation (kg/day)</label>
                    <input class="form-control tx_w_capita_e" type="number" />
                </div>

                <div class="form-group">
                    <label class="form-control-label">&nbsp;Diverted Waste to MRF (kg/day)</label>
                    <input class="form-control tx_w_mrf_e" type="number" />
                </div>

                <div class="form-group">
                    <label class="form-control-label">&nbsp;Waste Diversion Rate (%)</label>
                    <input class="form-control tx_w_diver_e" type="number" />
                </div>

                <div class="form-group">
                    <label class="form-control-label">&nbsp;Waste Disposed in Landfill (kg/day)</label>
                    <input class="form-control tx_w_land_e" type="number" />
                </div>

                <div class="form-group">
                    <label class="form-control-label">&nbsp;Waste Disposed % </label>
                    <input class="form-control tx_w_dis_e" type="number" />
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
        city = $(row.find("td")[9]).text();
        psa_population = $(row.find("td")[10]).text();
        gen_kg_day = $(row.find("td")[11]).text();
        per_capita_kg_day = $(row.find("td")[12]).text();
        mrf_kg_day = $(row.find("td")[13]).text();
        diversion_rate = $(row.find("td")[14]).text();
        landfill = $(row.find("td")[15]).text();
        disposed = $(row.find("td")[16]).text();
        


        $('.tx_psa_e').val(psa_population)
        $('.tx_w_gen_e').val(gen_kg_day)
        $('.tx_w_capita_e').val(per_capita_kg_day)
        $('.tx_w_mrf_e').val(mrf_kg_day)
        $('.tx_w_diver_e').val(diversion_rate)
        $('.tx_w_land_e').val(landfill)
        $('.tx_w_dis_e').val(disposed)
       
        selectElement('sel_muni_e', city)

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

        
        sel_muni_a = $('select[name=sel_muni_e] option:selected').val();
        tx_psa = $('.tx_psa_e').val();
        tx_w_gen = $('.tx_w_gen_e').val();
        tx_w_capita = $('.tx_w_capita_e').val();
        tx_w_mrf = $('.tx_w_mrf_e').val();
        tx_w_diver = $('.tx_w_diver_e').val();
        tx_w_land = $('.tx_w_land_e').val();
        tx_w_dis = $('.tx_w_dis_e').val();
        

        url = "{{route('crud_waste_data')}}";
        status = "normal";
        modal_id = "modal-edit";
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
            status:status,
            id:id
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

    $('#kt_datatable').on('click', '#delete', function() {

        id = $(this).attr('vals');
        
        $('#delete_modal').modal('show');
    });

    $('#delete_btn').click(function(){
        
        
        url = "{{route('crud_waste_data')}}";
        status = "delete";
        modal_id = "delete_modal";
        data = {
            _token: "{{csrf_token()}}",
            id: id,
            status:status
        };
        
        update(data, url, status, modal_id);
    });


</script>
@endsection
@endsection