
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>IWasto | Login</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
	
		<!--begin::Layout Themes(used by all pages)-->
    @include('layouts.includes.base-css')
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{asset('uploads/logo_green.png')}}" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-static page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="{{asset('uploads/logo_green.png')}}" class="max-h-75px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
            <div class="login-signin">
							<div class="mb-20">
								<h3>IWasto Web App</h3>
								<div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
							</div>
              
							<form method="POST" action="{{ route('login') }}"  id="login_form">
              @csrf
								<div class="form-group mb-5">
									<input type="email" name="email" value="{{ old('email') }}"  class="form-control h-auto form-control-solid py-4 px-8" placeholder="Email or Username" autocomplete="off" />
                  <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password" name="password" placeholder="Password" />
                  <span class="text-danger">@error('password') {{ $message}} @enderror</span>
                </div>
								<button class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4" id="kt_btn_1">Login</button>
                <!-- <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4 spinner spinner-white spinner-right">Login </button> -->
							</form>
							<div class="mt-10">
								<span class="opacity-70 mr-4">&copy; IWasto All Right Reserved 2021.</span>
								
							</div>
						</div>
						
						<!--end::Login Sign in form-->
						
					
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		
		<!--begin::Global Config(global config for global JS scripts)-->
    
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		
		<!--end::Page Scripts-->
    @include('layouts.includes.base-js')
	</body>
	<!--end::Body-->
  <script>

  // Demo 1
  var btn = KTUtil.getById("kt_btn_1");

  $('form').submit(function (e) {
    loading();

    var form = this;
    
    e.preventDefault();
    
    setTimeout(function () {
      KTUtil.btnRelease(btn);
        form.submit();
    }, 2000); // in milliseconds
  });

  function loading() {
    KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "Please wait");
    toastr.options = {
       
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };

    toastr.info("Logging in...");
  } 

  </script>
</html>