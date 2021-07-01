{{--
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('assets/plugins/jquery/jquery-1.11.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js') }}"></script>
    
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/js/theme/default.min.js') }}"></script>
    <script src="{{ asset('assets/js/apps.min.js') }}"></script>
    <script src="{{ asset ('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')}}"></script>
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('assets/js/demo/login-v2.demo.min.js') }}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->


--}}

<script src="{{ asset('assets/plugins/jquery/jquery-1.11.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script> -->
<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>

<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('assets/js/pages/features/miscellaneous/toastr.js')}}"></script>
<!--end::Page Scripts-->
<script>
    
    function update(data,url,status,modal_id) {
        block_modal(modal_id);
        main(data,url,status);
        toast_message("Success");
        reload();
    }

    function block_modal(modal_id) {

        var modal = '#'+modal_id;

        KTApp.block( modal + ' .modal-content', {
            overlayColor: '#000000',
            state: 'danger',
            message: 'Please wait...'
        });

        setTimeout(function() {
            KTApp.unblock(modal + ' .modal-content');
        }, 1000);
    }

    function reload() {

        setTimeout(function(){
            
            location.reload();
        },2000);
    }


    function toast_message(message) {

        setTimeout(function(){

            toastr.options = {
        
            
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                
                "showDuration": "200",
                "hideDuration": "1000",
                "timeOut": "2000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            toastr.success(message);
        },1000)
        
    }

    async function main(data,url,status) 
    {
        
        if(status != "file") {
            try {
                
                await $.ajax({
                        url: url,
                        type: 'post',
                        data: data,
                        
                        success: function(data) {
                            console.log(data)
                            
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    });
                
            } catch (error) {
                console.log(error)
            }
        }
        else {
            try {
                
                await $.ajax({
                        url: url,
                        type: 'post',
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        data: data,
                        
                        success: function(data) {
                            console.log(data)
                            
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    });
                
            } catch (error) {
                console.log(error)
            }
        }
    }
</script>