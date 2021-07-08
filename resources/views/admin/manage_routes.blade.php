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
            <button data-toggle="modal" data-target="#import_modal" type="button" class="btn btn-light-primary font-weight-bolder " aria-haspopup="true" aria-expanded="false">
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

            </button>


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
                        <th style="min-width: 100px" class="pl-7">
                            <span class="text-dark-75">route name</span>
                        </th>
                        <th style="min-width: 100px;">
                            <span class="text-dark-75">region</span>
                        </th>
                        <th style="min-width: 100px;">
                            <span class="text-dark-75">province</span>
                        </th>
                        <th style="min-width: 100px;">
                            <span class="text-dark-75">city / municipality</span>
                        </th>
                        <th style="min-width: 100px;">
                            <span class="text-dark-75">barangay</span>
                        </th>
                        <th style="min-width: 100px" class="text-dark-75">
                            <span class="text-dark-75">action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td style="text-transform:uppercase;">

                            <span class="text-dark-75">{{$row->route_name}}</span>
                        </td>

                        <td style="text-transform:uppercase;">

                            <span class="text-dark-75">{{$row->region}}</span>
                        </td>
                        <td style="text-transform:uppercase;">

                            <span class="text-dark-75">{{$row->province}}</span>
                        </td>
                        <td style="text-transform:uppercase;">

                            <span class="text-dark-75">{{$row->city_municipality}}</span>
                        </td>
                        <td style="text-transform:uppercase;">

                            <span class="text-dark-75">{{$row->barangay}}</span>
                        </td>
                        
                        <td class="pr-0 text-left">

                            <a href="#" class="btn btn-light-info font-weight-bolder font-size-sm">
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
                            <a href="#" class="btn btn-light-primary font-weight-bolder font-size-sm">
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
                        <input type="text" class="form-control tx_route_name" style="text-transform:uppercase;"/>
                </div>

                <div class="form-group">
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;Region</label><br>
                    <select id=sel_region_a class="form-control" name="sel_region_a" ` >
                        @foreach($region as $row)
                        <option value="{{$row->region_desc}}">{{$row->region_desc}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;Province</label><br>
                    <select id=sel_province_a class="form-control sel_province_a" name="sel_province_a" >
                        
                    </select>

                </div>

                <div class="form-group">
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;City / Municipality</label><br>
                    <select class="form-control sel_muni_a" name="sel_muni_a" >
                        
                    </select>

                </div>

                <div class="form-group">
                    <label class="form-control-label col-lg-24 col-sm-24">&nbsp;Barangay</label><br>
                    <select class="form-control sel_barangay_a" name="sel_barangay_a" >
                        
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
            route_name: $('.tx_route_name').val()

        };

        update(data, url, status, modal_id);
    });
    $(document).ready(function(){
        
        get_provinces($('#sel_region_a option:selected').val());
        
        $('#sel_region_a').on('change',function(){
            
            get_provinces($('#sel_region_a option:selected').val());
        });

        $('.sel_province_a').on('change',function(){
            
            get_municipality($('.sel_province_a option:selected').val());
        });

        $('.sel_muni_a').on('change',function(){
            
            get_barangay($('.sel_muni_a option:selected').val());
        });
        
    });
    
    function get_provinces(region) {
        
        $.ajax({
            url:"{{route('provinces')}}"
            , method:"post"
            , data:{_token:"{{csrf_token()}}", params:region }
            , success:function(data) {
                
                $('.sel_province_a').empty();
                $('.sel_province_a').each(function(index,row){ 
                    for(var i=0; i< data['response'].length; i++){
                        $(this).append($("<option>").text(data['response'][i]['province_desc']).val(data['response'][i]['province_desc']));
                    }
                });

                get_municipality($('#sel_province_a option:selected').val());

            }
            , error:function() {
                console.log(data)
            }
        });
    }

    function get_municipality(region) {
        
        $.ajax({
            url:"{{route('municipality')}}"
            , method:"post"
            , data:{_token:"{{csrf_token()}}", params:region }
            , success:function(data) {
                
                $('.sel_muni_a').empty();
                $('.sel_muni_a').each(function(index,row){ 
                    for(var i=0; i< data['response'].length; i++){
                        $(this).append($("<option>").text(data['response'][i]['citymun_desc']).val(data['response'][i]['citymun_desc']));
                    }
                });
                get_barangay($('select[name=sel_muni_a] option:selected').val());
            }
            , error:function() {
                console.log(data)
            }
        });
    }

    function get_barangay(region) {
        $.ajax({
            url:"{{route('barangay')}}"
            , method:"post"
            , data:{_token:"{{csrf_token()}}", params:region }
            , success:function(data) {
                
                $('.sel_barangay_a').empty();
                $('.sel_barangay_a').each(function(index,row){ 
                    for(var i=0; i< data['response'].length; i++){
                        $(this).append($("<option>").text(data['response'][i]['barangay_desc']).val(data['response'][i]['barangay_desc']));
                    }
                });

            }
            , error:function() {
                console.log(data)
            }
        });
    }
</script>
@endsection
@endsection