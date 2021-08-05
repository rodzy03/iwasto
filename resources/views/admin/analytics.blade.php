@extends('admin.dashboard')
@section('title','Routes')
@section('content')

@section('extra-css')
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

<style>
    #menu_filter {
        position: absolute;
        background: #fff;
        padding: 10px;

        z-index: 1;
    }
</style>
@endsection

<!--begin::Card-->


<input type="text" value="{{route('charts')}}" id="bio" hidden>
<input type="text" value="{{csrf_token()}}" id="_token" hidden>
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
            <h3 class="card-label">Waste Composition Charts</h3>
        </div>

    </div>

</div>
<br><br>
<div class="row">

    <div class="col-lg-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b" style="background: #80cbc4;">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Biodegradable</h3>
                </div>
            </div>
            <div class="card-body" style="background: #e0f2f1;">
                <!--begin::Chart-->
                <div id="bio_chart" class="d-flex justify-content-center"></div>
                <!--end::Chart-->
            </div>
        </div>
        <!--end::Card-->
    </div>

    <div class="col-lg-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b" style="background: #80cbc4;">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Recyclable</h3>
                </div>
            </div>
            <div class="card-body" style="background: #e0f2f1;">
                <!--begin::Chart-->
                <div id="recyc_chart" class="d-flex justify-content-center"></div>
                <!--end::Chart-->
            </div>
        </div>
        <!--end::Card-->
    </div>

</div>

<div class="row">

    <div class="col-lg-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b" style="background: #80cbc4;">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Residual</h3>
                </div>
            </div>
            <div class="card-body" style="background: #e0f2f1;">
                <!--begin::Chart-->
                <div id="resid_chart" class="d-flex justify-content-center"></div>
                <!--end::Chart-->
            </div>
        </div>
        <!--end::Card-->
    </div>

    <div class="col-lg-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b" style="background: #80cbc4;">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Special</h3>
                </div>
            </div>
            <div class="card-body" style="background: #e0f2f1;">
                <!--begin::Chart-->
                <div id="special_chart" class="d-flex justify-content-center"></div>
                <!--end::Chart-->
            </div>
        </div>
        <!--end::Card-->
    </div>

</div>
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
            <h3 class="card-label">Charts Data Control</h3>
        </div>

    </div>

</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b" style="background: #80cbc4;">
            <div class="card-header">
                <div class="card-title ">

                    <h3 class="card-label">Waste Data</h3>
                </div>
            </div>

            <div class="card-body" style="background: #e0f2f1;">
                <div class="col-lg-4">

                    <select id="sel_type_e" class="form-control sel_type_e" name="sel_type_e" style="width: 100%;">
                        <option value="kg_day">Waste Generation (KG/DAY)</option>
                        <option value="psa">Population Projection Based on PSA 2020</option>
                        <option value="capita">Per Capita Waste Generation</option>
                        <option value="mrf">Diverted Waste to MRF (KG/DAY)</option>
                        <option value="diversion">Waste Diversion Rate (%)</option>
                        <option value="landfill">Waste Disposed in Landfill (KG/DAY)</option>
                        <option value="disposed">Waste Disposed (%)</option>
                    </select>
                </div>
                <!--begin::Chart-->
                <div id="waste_chart" class="d-flex justify-content-center"></div>
                <!--end::Chart-->
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>
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
            <h3 class="card-label">Waste Collection Facilities</h3>
        </div>

    </div>

</div><br>

<div data-sticky-container="">

    <div class="col-lg-24">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">

                <div class="form-group" style="text-align: left; margin-top:15px">
                    <label>Choose Filter</label>
                    <div class="checkbox-inline">
                        <label class="checkbox checkbox-square checkbox-success">
                            <input class="filter_checkbox" type="checkbox" value="sanitary landfills">
                            <span></span>Sanitary Landfill</label>

                        <label class="checkbox checkbox-square checkbox-success">
                            <input class="filter_checkbox" type="checkbox" value="dumpsites">
                            <span></span>Dumpsites</label>

                        <label class="checkbox checkbox-square checkbox-success">
                            <input class="filter_checkbox" type="checkbox" value="junkshops">
                            <span></span>Junkshops</label>

                        <label class="checkbox checkbox-square checkbox-success">
                            <input class="filter_checkbox" type="checkbox" value="materials recovery facility">
                            <span></span>Materials Recovery Facility</label>

                        <div class="spinner spinner-primary spinner-left div_loading" style="display: none;">

                        </div>

                    </div>

                </div>
               
            </div>

            <div class="card-body">



                <div id='map' style='height: 800px; margin-top:-15px; width:100%' >
                    <div id="menu_filter">



                        <div class="radio-inline">
                            <label class="radio radio-square radio-success">
                                <input id="satellite-v9" type="radio" name="rtoggle" class="rtoggle" value="satellite" checked="checked">
                                <span></span>Satellite</label>

                            <label class="radio radio-square radio-success">
                                <input id="streets-v11" type="radio" name="rtoggle" class="rtoggle" value="dark">
                                <span></span>Streets</label>

                            <label class="radio radio-square radio-success">
                                <input id="outdoors-v11" type="radio" name="rtoggle" class="rtoggle" value="dark">
                                <span></span>Outdoors</label>

                            <label class="radio radio-square radio-success">
                                <input id="light-v10" type="radio" name="rtoggle" class="rtoggle" value="dark">
                                <span></span>Light</label>

                            <label class="radio radio-square radio-success">
                                <input id="dark-v10" type="radio" name="rtoggle" class="rtoggle" value="dark">
                                <span></span>Dark</label>



                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

</div>





<!-- Modal-->
<div class="modal fade popout-modal" id="popout-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Waste Collection Facility</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body modal_card_div">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


@section('extra-js')

<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/widgets.js')}}"></script>
<!--end::Page Vendors-->
<script src="{{asset('assets/js/pages/features/miscellaneous/blockui.js')}}"></script>
<script src="{{asset('assets/js/pages/features/charts/apexcharts.js')}}"></script>


<script>
    var chart_pie = '';
    var apexChart;
    $(document).ready(function() {

        var url = $('#bio').val();
        var _token = $('#_token').val();
        $.ajax({
            url: url,
            method: "post",
            data: {
                _token: _token
            },
            success: function(data) {

                const bio_series = [],
                    resid = [],
                    recyc = [],
                    special = [],
                    city = [];
                const waste_city = [],
                    gen_kg_day = [],
                    psa_population = [],
                    per_capita_kg_day = [],
                    mrf_kg_day = [],
                    diversion_rate = [],
                    landfill = [],
                    disposed = [];
                for (var i = 0; i < data['result'].length; i++) {
                    city.push(data['result'][i]['city']);
                    bio_series.push((data['result'][i]['biodegradable_chart'] != null) ? data['result'][i]['biodegradable_chart'] : 0);
                    recyc.push((data['result'][i]['recyclable_chart'] != null) ? data['result'][i]['recyclable_chart'] : 0);
                    resid.push((data['result'][i]['residual_chart'] != null) ? data['result'][i]['residual_chart'] : 0);
                    special.push((data['result'][i]['special_chart'] != null) ? data['result'][i]['special_chart'] : 0);
                }

                for (var i = 0; i < data['waste'].length; i++) {
                    waste_city.push(data['waste'][i]['city']);
                    gen_kg_day.push((data['waste'][i]['gen_kg_day'] != null) ? data['waste'][i]['gen_kg_day'] : 0);

                }

                apexChart = "#bio_chart";
                var options = {
                    series: bio_series,
                    labels: city,
                    chart: {
                        width: 500,
                        type: 'donut',


                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 300
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                    colors: [primary, success, warning, danger, info]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();

                apexChart = "#recyc_chart";
                var options = {
                    series: recyc,
                    labels: city,
                    chart: {
                        width: 500,
                        type: 'donut',


                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 300
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                    colors: [primary, success, warning, danger, info]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();


                apexChart = "#resid_chart";
                var options = {
                    series: resid,
                    labels: city,
                    chart: {
                        width: 500,
                        type: 'donut',


                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 300
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                    colors: [primary, success, warning, danger, info]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();

                apexChart = "#special_chart";
                var options = {
                    series: special,
                    labels: city,
                    chart: {
                        width: 500,
                        type: 'donut',


                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                    colors: [primary, success, warning, danger, info]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();

                apexChart = "#waste_chart";
                var options = {
                    series: gen_kg_day,
                    labels: waste_city,
                    chart: {
                        width: 600,
                        type: 'pie',
                    },

                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 300
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                    colors: [primary, success, warning, danger, info]
                };

                chart_pie = new ApexCharts(document.querySelector(apexChart), options);
                chart_pie.render();
            }
        });

        $('.sel_type_e').on('change', function(e) {

            // KTApp.blockPage({
            //         overlayColor: '#000000',
            //         state: 'danger',
            //         message: 'Please wait...'
            //     });

            //     setTimeout(function() {
            //         KTApp.unblockPage();
            //     }, 2000);

            var filter = e.target.value;
            $.ajax({
                url: "{{route('filter_charts')}}",
                method: "post",
                data: {
                    _token: "{{csrf_token()}}",
                    filter: filter
                },
                success: function(data) {
                    const city = [],
                        value = [];
                    var len = data['waste'].length;

                    
                    for (var i = 0; i < len; i++) {
                        city.push(data['waste'][i]['city'])
                        value.push((data['waste'][i]['value'] != null) ? data['waste'][i]['value'] : 0);
                    }

                    chart_pie.destroy();
                    apexChart = "#waste_chart";
                    var options = {
                        series: value,
                        labels: city,
                        chart: {
                            width: 600,
                            type: 'pie',
                        },

                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 300
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }],
                        colors: [primary, success, warning, danger, info]
                    };

                    chart_pie = new ApexCharts(document.querySelector(apexChart), options);
                    chart_pie.render();
                }
            });

        });
    });
    $('.sel_type_e').select2({
        placeholder: "Select Type"
    });


    mapboxgl.accessToken = "{{env('MAPBOX_KEY')}}";

    const default_location = [120.98471247769781, 14.605716595091552];

    var map = new mapboxgl.Map({
        container: 'map',
        center: default_location,
        zoom: 12,
        style: 'mapbox://styles/mapbox/satellite-v9',
        attributionControl: true

    });


    map.addControl(new mapboxgl.FullscreenControl());
    map.addControl(new mapboxgl.NavigationControl());
        

    var markerElement;
    $('.rtoggle').change(function(e) {
        layerId = e.target.id;
        map.setStyle('mapbox://styles/mapbox/' + layerId);
    });

    $('.filter_checkbox').change(function() {
            
        $('input:checkbox.filter_checkbox:checked').each(function() {
            var filter_value = $(this).attr('value');

            if (filter_value == "sanitary landfills") {
                get_filter(filter_value);
            } else if (filter_value == "dumpsites") {
                get_filter(filter_value);
            } else if (filter_value == "junkshops") {
                get_filter(filter_value);
            } else if (filter_value == "materials recovery facility") {
                get_filter(filter_value);
            }
        });

        $('input:checkbox.filter_checkbox:not(:checked)').each(function() {

            $('.div_loading').show();
            var filter_value = $(this).attr('value');

            if (filter_value == "sanitary landfills") {
                $('.marker').remove();
            } else if (filter_value == "dumpsites") {
                $('.marker').remove();
            } else if (filter_value == "junkshops") {
                $('.marker').remove();
            } else if (filter_value == "materials recovery facility") {
                $('.marker').remove();
            }

            setTimeout(function() {
                $('.div_loading').hide();
            }, 1000)
            
        });
    });

    function get_filter(filter) 
    {

            $('.div_loading').show();
            KTApp.blockPage({
                    overlayColor: '#000000',
                    state: 'danger',
                    message: 'Please wait...'
                });

                setTimeout(function() {
                    KTApp.unblockPage();
                }, 1000);

                setTimeout(function() {
                    $.ajax({

                        url: "{{route('swm_filter')}}",
                        method: "post",
                        data: {
                            _token: "{{csrf_token()}}",
                            filter: filter
                        },
                        success: function(response) {

                            var len = response['result'].length;
                            
                            if (len > 0) 
                            {
                                

                                for (var j = 0; j < len; j++) 
                                {
                                    var unordered = response['result'][j]['working_days'].split(',');
                                    var wd_display = "";
                                    u_len = unordered.length;

                                    var ordered = [];
                                    for (var i = 0; i < u_len; i++) 
                                    {

                                        obj = {}; // <----- new Object
                                        obj['day'] = unordered[i];
                                        ordered.push(obj);

                                    }

                                    ordered = sort_days(ordered);
                                    groupLength = ordered.length;

                                    for (var y = 0; y < u_len; y++) {
                                        var item = ordered[y]['day'];
                                        ((y + 1) == (groupLength)) ? wd_display += item: wd_display += item + " , ";
                                    }
                                    // wd_display = (ordered.length > 1) ? ordered[0]['day'] + " To " + ordered[ordered.length-1]['day'] : ordered[0]['day'];

                                    j_address = response['result'][j]['junkshop_address'];
                                    j_name = response['result'][j]['junkshop_name'];
                                    j_a_mat = response['result'][j]['acceptable_materials'];
                                    j_hours = response['result'][j]['working_hours'];
                                    j_type = response['result'][j]['facility_type'];
                                    j_capacity = response['result'][j]['capacity'];
                                    j_capacity_r = response['result'][j]['capacity_rate'];
                                    j_last_update = response['result'][j]['last_update'];
                                    j_number = response['result'][j]['contact_number'];

                                    markerElement = document.createElement('div')
                                    markerElement.className = 'marker ' + response['result'][j]['swm_location_id']
                                    markerElement.id = response['result'][j]['swm_location_id']
                                    var url = get_icons(j_type);
                                    markerElement.style.backgroundImage = `url(${url})`
                                    markerElement.style.backgroundSize = 'cover'
                                    markerElement.style.width = '50px'
                                    markerElement.style.height = '50px'
                                    markerElement.value =  `<b>Address: </b><br>${j_address}<br><b>
                                    Contact Number: </b>${j_number}<br><b>
                                    Acceptable Materials: </b><br>${j_a_mat}<br><b>
                                    Working Days: </b><br>${wd_display}<br><b>
                                    Working Hours: </b>${j_hours}<br><b>
                                    Facility Type: </b>${j_type}<br><b>
                                    Capacity: </b>${j_capacity}<br><b>
                                    Capacity Rate: </b>${j_capacity_r}%<br><b>
                                    Last Update (Date Provided): </b>${j_last_update}
                                    `;
                                    
                                    markerElement.vals = `${j_name}`;
                                    markerElement.profile = `${response['result'][j]['file_name']}`;

                                    const content = `
                
                
                                        <div style="text-align:left;">&nbsp;
                                        <center>
                                        <img  src="{{asset('uploads/junkshops/resize')}}/${response['result'][j]['file_name']}" />
                                        </center>
                                            <div class="card-block">
                                            <p style="text-transform:uppercase; color:#94cc7e; font-weight: bold; font-size: 13px; text-align:center">${j_name}</p>
                                            <hr style="height: 1px; background-color: gray;">
                                            <p class="card-text" style="font-size:10px; text-transform:uppercase;">
                                            <b>LOCATION : </b>${j_address}
                                            <br><b>WORKING DAYS : </b><br>${wd_display}
                                            <br><b>WORKING HOURS : </b>${j_hours}
                                            <br><b>ACCEPTABLE MATERIALS : </b>${j_a_mat}
                                            
                                            </p>
                                            </div>
                                        </div>

                                        `;



                                    


                                    new mapboxgl.Marker(markerElement)
                                        .setLngLat([
                                            response['result'][j]['longhitude'], response['result'][j]['latitude']
                                        ])
                                        // .setPopup(popUp)
                                        .addTo(map);

                                    markerElement.addEventListener('click', (event) => { 
                                        var swm_id = event.target.id;
                                        $('.modal_card_div').empty();
                                        const modal_content = `<div class="form-group">
                                        
                                        <img id="valid_id" src="{{asset('uploads/junkshops/normal_size')}}/${event.target.profile}" alt="NO IMAGE FOUND" width="100%" height="auto">
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="card mb-8">
                                                    <div class="card-body">
                                                        
                                                            <h5 class="text-dark mb-8">Waste Collection Facility Information </h5>
                                                            
                                                            <div class="accordion accordion-light ">
                                                                
                                                                <div class="card ">
                                                                        
                                                                        
                                                                    <div class="card-header" id="headingOne7">
                                                                        <div class="card-title"  aria-expanded="true" role="button">
                                                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Map\Marker2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                                <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000"/>
                                                                            </g>
                                                                            </svg></span>


                                                                            <div class="card-label text-dark pl-4 j_name" style="text-transform: uppercase;">${event.target.vals}</div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    <div id="collapseOne7" class="collapse show" aria-labelledby="headingOne7" data-parent="#accordionExample7">
                                                                        <div class="card-body text-dark-50 font-size-md pl-2">
                                                                            <p class="swm_info">${event.target.value}</p>
                                                                            
                                                                        </div>
                                                                    </div>



                                                                </div>
                                                                <!--end::Item-->

                                                            </div>
                                                            <!--end::Accordion-->
                                                        
                                                    </div>
                                                </div>
                                            

                                            </div>
                                                        `
                                        // maps
                                    
                                        $('.modal_card_div').append(modal_content);
                                        $('#popout-modal').modal('show');

                                    });
                                }

                            } 

                            $('.div_loading').hide();

                        },
                        error: function(error) {
                            console.log(error)
                        }
                    });
                }, 1000);
        }

    function get_icons(type) {
        var icon = '';
        if (type.toLowerCase() == "sanitary landfills")
            icon = "{{asset('')}}uploads/landfills.png";
        else if (type.toLowerCase() == "dumpsites")
            icon = "{{asset('')}}uploads/dumpsite.png";
        else if (type.toLowerCase() == "junkshops")
            icon = "{{asset('')}}uploads/junkshop.png";
        else if (type.toLowerCase() == "materials recovery facility")
            icon = "{{asset('')}}uploads/waste_facility.png";

        return icon;
    }

    function get_locations() {

        setTimeout(function() {
            $.ajax({
                url: "{{route('get_swm')}}",
                method: "post",

                data: {
                    _token: "{{csrf_token()}}"
                },
                success: function(response) {

                    if (response['data'].length > 0) {

                        for (i = 0; i < response['data'].length; i++) {
                            var wd_display = "";
                            var unordered = response['data'][i]['working_days'].split(',');

                            u_len = unordered.length;

                            var ordered = [];
                            for (var j = 0; j < u_len; j++) {

                                obj = {}; // <----- new Object
                                obj['day'] = unordered[j];
                                ordered.push(obj);

                            }
                            ordered = sort_days(ordered);
                            groupLength = ordered.length;

                            for (var y = 0; y < u_len; y++) {
                                var item = ordered[y]['day'];
                                ((y + 1) == (groupLength)) ? wd_display += item: wd_display += item + " , ";
                            }
                            // wd_display = (ordered.length > 1) ? ordered[0]['day'] + " To " + ordered[ordered.length-1]['day'] : ordered[0]['day'];
                            //wd_display = response['data'][i]['working_days'];
                            j_address = response['data'][i]['junkshop_address'];
                            j_name = response['data'][i]['junkshop_name'];
                            j_a_mat = response['data'][i]['acceptable_materials'];
                            j_hours = response['data'][i]['working_hours'];
                            j_type = response['data'][i]['facility_type'];
                            j_capacity = response['data'][i]['capacity'];
                            j_capacity_r = response['data'][i]['capacity_rate'];
                            j_last_update = response['data'][i]['last_update'];
                            j_number = response['data'][i]['contact_number'];

                            markerElement = document.createElement('div')
                            markerElement.className = 'marker ' + response['data'][i]['swm_location_id']
                            markerElement.id = response['data'][i]['swm_location_id']
                            var url = get_icons(j_type);
                            markerElement.style.backgroundImage = `url(${url})`
                            markerElement.style.backgroundSize = 'cover'
                            markerElement.style.width = '50px'
                            markerElement.style.height = '50px'
                            markerElement.value = `<b>Address: </b><br>${j_address}<br><b>
                                    Contact Number: </b>${j_number}<br><b>
                                    Acceptable Materials: </b><br>${j_a_mat}<br><b>
                                    Working Days: </b><br>${wd_display}<br><b>
                                    Working Hours: </b>${j_hours}<br><b>
                                    Facility Type: </b>${j_type}<br><b>
                                    Capacity: </b>${j_capacity}<br><b>
                                    Capacity Rate: </b>${j_capacity_r}%<br><b>
                                    Last Update (Date Provided): </b>${j_last_update}
                                    `;
                            markerElement.vals = `${j_name}`;
                            markerElement.profile = `${response['data'][i]['file_name']}`;
                            const info = `Junkhop Address: ${j_address}<br>Acceptable Materials: ${j_a_mat}<br>Working Days: ${wd_display} ${j_hours}`;

                            const content = `
            
            
                                    <div style="text-align:left;">&nbsp;
                                    <center>
                                    <img  src="{{asset('uploads/junkshops/resize')}}/${response['data'][i]['file_name']}" />
                                    </center>
                                        <div class="card-block">
                                        <p style="text-transform:uppercase; color:#94cc7e; font-weight: bold; font-size: 13px; text-align:center">${j_name}</p>
                                        <hr style="height: 1px; background-color: gray;">
                                        <p class="card-text" style="font-size:10px; text-transform:uppercase;">
                                        <b>LOCATION : </b>${j_address}
                                        <br><b>WORKING DAYS : </b><br>${wd_display}
                                        <br><b>WORKING HOURS : </b>${j_hours}
                                        <br><b>ACCEPTABLE MATERIALS : </b>${j_a_mat}
                                        
                                        </p>
                                        </div>
                                    </div>`;

                            const popUp = new mapboxgl.Popup({
                                closeButton: false,
                                closeOnClick: true,
                                closeOnMove: true,


                            }).setHTML(content).setMaxWidth("600px");


                            new mapboxgl.Marker(markerElement)
                                .setLngLat([
                                    response['data'][i]['longhitude'], response['data'][i]['latitude']
                                ])
                                //.setPopup(popUp)
                                .addTo(map)

                            markerElement.addEventListener('click', (event) => {
                                var swm_id = event.target.id;
                                $('.modal_card_div').empty();
                                const modal_content = `<div class="form-group">
                                    
                                    <img id="valid_id" src="{{asset('uploads/junkshops/normal_size')}}/${event.target.profile}" alt="NO IMAGE FOUND" width="100%" height="auto">
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="card mb-8">
                                                <div class="card-body">
                                                    
                                                        <h5 class="text-dark mb-8">Waste Collection Facility Information </h5>
                                                        
                                                        <div class="accordion accordion-light ">
                                                            
                                                            <div class="card ">
                                                                    
                                                                    
                                                                <div class="card-header" id="headingOne7">
                                                                    <div class="card-title"  aria-expanded="true" role="button">
                                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Map\Marker2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000"/>
                                                                        </g>
                                                                        </svg></span>


                                                                        <div class="card-label text-dark pl-4 j_name" style="text-transform: uppercase;">${event.target.vals}</div>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                <div id="collapseOne7" class="collapse show" aria-labelledby="headingOne7" data-parent="#accordionExample7">
                                                                    <div class="card-body text-dark-50 font-size-md pl-2">
                                                                        <p  class="swm_info">${event.target.value}</p>
                                                                        
                                                                    </div>
                                                                </div>



                                                            </div>
                                                            <!--end::Item-->

                                                        </div>
                                                        <!--end::Accordion-->
                                                    
                                                </div>
                                            </div>
                                        

                                        </div>
                                                    `
                                // maps

                                $('.modal_card_div').append(modal_content);
                                $('#popout-modal').modal('show');

                            });

                        }
                    } else {

                    }

                },
                error: function(response) {

                }
            })
        }, 1000);

    }

    function sort_days(ordered) {
        const sorter = {
            // "sunday": 0, // << if sunday is first day of week
            "monday": 1,
            "tuesday": 2,
            "wednesday": 3,
            "thursday": 4,
            "friday": 5,
            "saturday": 6,
            "sunday": 7
        }

        ordered.sort(function sortByDay(a, b) {
            let day1 = a.day.toLowerCase();
            let day2 = b.day.toLowerCase();
            return sorter[day1] - sorter[day2];
        });

        return ordered;
    }

    get_locations();

    $('#kt_datatable').DataTable();
</script>
@endsection
@endsection