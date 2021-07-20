@extends('admin.dashboard')
@section('title','Routes')
@section('content')

@section('extra-css')
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />


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
            <h3 class="card-label">SWM Facilities</h3>
        </div>

    </div>

</div>
<br>
<br>

<div id='map' style='height: 700px; margin-top:-15px; '>
</div>
    



@section('extra-js')

<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/widgets.js')}}"></script>
<!--end::Page Vendors-->

{{--<script src='https://api.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.js'></script>--}}

<script>

    

    
    mapboxgl.accessToken = "{{env('MAPBOX_KEY')}}";

    const default_location = [120.98471247769781, 14.605716595091552];

    var map = new mapboxgl.Map({
        container: 'map',
        center: default_location,
        zoom: 12,
        style: 'mapbox://styles/rodzy03/ckqvmvj271rvu17pn63lnpqfs',
        attributionControl: true

    });
    

    map.addControl(new mapboxgl.NavigationControl());
    
    var markerElement;
    get_locations();
    function get_locations() {

        setTimeout(function() {
            $.ajax({
                url: "{{route('get_swm')}}",
                method: "post",
                async:false,
                data: {
                    _token: "{{csrf_token()}}"
                },
                success: function(response) {
                    console.log(response['data'])
                    if (response['data'].length > 0) {

                        for (i = 0; i < response['data'].length; i++) 
                        {


                            markerElement = document.createElement('div')
                            markerElement.className = 'marker ' + response['data'][i]['swm_location_id']
                            markerElement.id = response['data'][i]['swm_location_id']

                            markerElement.style.backgroundImage = "url(https://media.giphy.com/media/AxJaiJ65agT7sVZ8tf/giphy.gif)"
                            markerElement.style.backgroundSize = 'cover'
                            markerElement.style.width = '50px'
                            markerElement.style.height = '50px'

                            
                            const content = `
        <center ><br>
    
                <div class="font-weight-bolder font-size-h3">${response['data'][i]['junkshop_name']}</div>
                <div class="text-dark-50 font-weight-bold">Address: ${response['data'][i]['junkshop_address']}</div>
                            <br>
          </center>
`;
                            const popUp = new mapboxgl.Popup({
                                closeButton: false,
                                closeOnClick: true,
                                closeOnMove: true,
                                

                            }).setHTML(content).setMaxWidth("600px");


                            new mapboxgl.Marker(markerElement)
                                .setLngLat([
                                    response['data'][i]['longhitude'],response['data'][i]['latitude']
                                ])
                                .setPopup(popUp)
                                .addTo(map)

                        }
                    } else {
                        
                    }
                    
                },
                error: function(response) {
                    
                }
            })
        }, 1000);
    }


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

                $('.sel_province_a').empty();
                $('.sel_province_a').each(function(index, row) {
                    for (var i = 0; i < data['response'].length; i++) {
                        $(this).append($("<option>").text(data['response'][i]['province_desc']).val(data['response'][i]['province_desc']));
                    }
                });

                get_municipality($('#sel_province_a option:selected').val());

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

                $('.sel_muni_a').empty();
                $('.sel_muni_a').each(function(index, row) {
                    for (var i = 0; i < data['response'].length; i++) {
                        $(this).append($("<option>").text(data['response'][i]['citymun_desc']).val(data['response'][i]['citymun_desc']));
                    }
                });
                get_barangay($('select[name=sel_muni_a] option:selected').val());
            },
            error: function() {
                console.log(data)
            }
        });
    }

    function get_barangay(region) {
        $.ajax({
            url: "{{route('barangay')}}",
            method: "post",
            data: {
                _token: "{{csrf_token()}}",
                params: region
            },
            success: function(data) {

                $('.sel_barangay_a').empty();
                $('.sel_barangay_a').each(function(index, row) {
                    for (var i = 0; i < data['response'].length; i++) {
                        $(this).append($("<option>").text(data['response'][i]['barangay_desc']).val(data['response'][i]['barangay_desc']));
                    }
                });

            },
            error: function() {
                console.log(data)
            }
        });
    }
</script>
@endsection
@endsection