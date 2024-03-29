<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>IWASTO | Citizen Patrol</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />   
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{asset('assets/plugins-ca/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins-ca/bootstrap/4.0.0/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins-ca/font-awesome/5.0/css/fontawesome-all.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins-ca/animate/animate.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/default/style.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/default/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/default/theme/default.css')}}" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('assets/plugins-ca/pace/pace.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
    <style>
    #my_camera{
        width: 320px;
        height: 240px;
        border: 1px solid black;
    }
	#logo {
    display: inline-block;
    margin: 5px; 
    height: 35px;
    width: auto; /* correct proportions to specified height */
    border-radius: 50%; /* makes it a circle */
  }
    </style>

</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
			<a href="#"><img id="logo" src="{{asset('uploads/logowhite.png')}}"></a>
        
        	<b style="font-size: 16px; margin-right: 0px; padding-right: 10xp" >IWASTO</b>
			
			</div>
			<!-- end navbar-header -->
			
			
		</div>
		<!-- end #header -->
		
		
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			{{--<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
				<li class="breadcrumb-item active">Blank Page</li>
			</ol>--}}
			<!-- end breadcrumb -->

			
			<!-- begin panel -->
			<div class="panel ">
				<div class="panel-heading">
					
					
				</div>
				
				
				<div class="panel-body">
                <form method="POST" action="{{route('submit_patrol')}}" enctype="multipart/form-data">
                    <div class="note note-light">
                        <div class="note-icon"><i class="far fa-user-circle"></i></div>
                        <div class="note-content">
                            <h4><b>CITIZEN PATROL</b></h4>
                            <p>Add you're concern. </p>
                        </div>
                    </div>
					@csrf
                    @if (session('message'))
                        <div class="alert alert-success fade show">
                            <span class="close" data-dismiss="alert">×</span>
                            <strong>Success!</strong>
                            {{ session('message') }}.
                            
                        </div>
                    @endif
                    {{ session()->forget('message') }}
					    <div class="row form-group m-b-10">
                            <label class="col-md-3 col-form-label">Select Type</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-chevron-down"></i></span></div>
                                    <select style="background-color: white;" name="selType" class="form-control selType">
										<option class="form-control" value="Missed Collection/Uncollected Waste (Hindi na-nakolektang basura sa nakatakdang araw)">Missed Collection/Uncollected Waste (Hindi nakolektang mga basura sa nakatakdang araw)</option>
                                        <option class="form-control" value="Piled and Scattered garbage on the road (Nakatambak at nagkalat na basura sa daan)">Piled and Scattered garbage on the road (Nakatambak at nagkalat na basura sa daan)</option>
                                        <option class="form-control" value="Clogged Waterways (Nakabarang basura sa daluyan ng tubig/ilog)">Clogged Waterways (Nakabarang basura sa daluyan ng tubig/ilog)</option>
                                        <option class="form-control" value="Other (Iba pa)">Other (Iba pa)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group m-b-10 other_div" style="display:none">
                            <label class="col-md-3 col-form-label">Other Concern</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-list"></i></span></div>
                                    <input name="other_val" type="text" class="form-control" style="background-color:white; " value=""/>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row form-group m-b-10">
                            <label class="col-md-3 col-form-label">Location</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-truck"></i></span></div>
                                    <input type="text" class="form-control" value="{{$user[0]->city_municipality}}, {{$user[0]->barangay}}" name="location"/>
                                    <div class="invalid-tooltip" hidden>Please choose a unique and valid username.</div>
                                </div>
                            </div>
                        </div>

						<div class="row form-group m-b-10">
                            <label class="col-md-3 col-form-label">Description</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-list"></i></span></div>
                                    <textarea type="text" class="form-control" name="description"></textarea>
                                    <div class="invalid-tooltip" hidden>Please choose a unique and valid username.</div>
                                </div>
                            </div>
                        </div>

						<div class="row form-group m-b-10">
                            <label class="col-md-3 col-form-label">Full Name</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                                    <input disabled name="full_name" type="text" class="form-control" style="text-transform: capitalize; background-color:white; color: black;" value="{{$user[0]->firstname}} {{$user[0]->middlename}}. {{$user[0]->lastname}}"/>
                                    <div class="invalid-tooltip" hidden>Please choose a unique and valid username.</div>
                                </div>
                            </div>
                        </div>

						<div class="row form-group m-b-10">
                            <label class="col-md-3 col-form-label">Email Address</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope-open"></i></span></div>
                                    <input disabled name="email" type="text" class="form-control" value="{{$user[0]->email}}" style="background-color: white; color: black;"/>
                                    <div class="invalid-tooltip" hidden>Please choose a unique and valid username.</div>
                                </div>
                            </div>
                        </div>

						<div class="row form-group m-b-10">
                            <label class="col-md-3 col-form-label">Contact Number</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-hashtag"></i></span></div>
                                    <input name="contact_number" type="text" class="form-control" min="1" max="12"/>
                                    <div class="invalid-tooltip" hidden>Please choose a unique and valid username.</div>
                                </div>
                            </div>
                        </div>

						<div class="row form-group m-b-10">
                            <label class="col-md-3 col-form-label">Upload Photo</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-paper-plane"></i></span></div>
                                    <input name="photo" type="file" accept="image/*" capture="" class="form-control">
                                    <div class="invalid-tooltip" hidden>Please choose a unique and valid username.</div>
                                </div>
                            </div>
                        </div>
                        {{--<div class="row form-group m-b-10">
                            <label class="col-md-3 col-form-label">Invalid Input</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                                    <input type="text" class="form-control is-valid" />
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>
                            </div>
                            Verification
                        </div>--}}<br>
                       
                        <button id="btn-capture" type="submit" class="button form-control" style="background-color: #d65656; color: white">Submit</button>
                        
                    </form>
				</div>
			</div>
            
			<!-- end panel -->
		</div>
		<!-- end #content -->
		
        
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('assets/plugins-ca/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/plugins-ca/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{asset('assets/plugins-ca/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}"></script>
	
	<script src="{{asset('assets/plugins-ca/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('assets/plugins-ca/js-cookie/js.cookie.js')}}"></script>
	<script src="{{asset('assets/js/theme/default.min.js')}}"></script>
	<script src="{{asset('assets/js/apps.min.js')}}"></script>
    
	<!-- ================== END BASE JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
            //getWebcam();    
		});


        $('.selType').change(function(e){
            if(e.target.value.toLowerCase() == "other (iba pa)") {  
                $('.other_div').show();
                
            }
            else {
                $('.other_div').hide();
            }
        });
        // async function getWebcam() {
        //     try {
        //         const video_src = await navigator.mediaDevices.getUserMedia({video:true});    
        //         var video = document.getElementById('video');
        //         video.srcObject = video_src; 
        //         video.play();

        //         if(this._facingMode == 'user'){
        //             this._webcamElement.style.transform = "scale(-1,1)";    
        //         }
        //     } catch (error) {
        //         console.log(error)
        //     }
           
        // }
        // var capture = document.getElementById('btn-capture');
        // var canvas = document.getElementById('canvas');
        // var context = canvas.getContext('2d');


        // capture.addEventListener('click',captureImage);
        // function captureImage() {
        //     context.drawImage(video,0,0,250,200);
        //     // Convert canvas image to Base64
        //     var img = canvas.toDataURL();
        //     //var file = dataURItoBlob(img);
            
        //     canvas.toBlob(blob => {
        //         const file = new File([blob], "test.png");
        //         console.log(file);
        //     });

        // }

        // function dataURItoBlob(dataURI) {
        // // convert base64/URLEncoded data component to raw binary data held in a string
        //     var byteString;
        //     if (dataURI.split(',')[0].indexOf('base64') >= 0)
        //         byteString = atob(dataURI.split(',')[1]);
        //     else
        //         byteString = unescape(dataURI.split(',')[1]);
        //     // separate out the mime component
        //     var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
        //     // write the bytes of the string to a typed array
        //     var ia = new Uint8Array(byteString.length);
        //     for (var i = 0; i < byteString.length; i++) {
        //         ia[i] = byteString.charCodeAt(i);
        //     }
        //     return new Blob([ia], {type:mimeString});
        // }
    </script>
</body>
</html>
{{--

 <!-- Video Element & Canvas -->
 <div class="play-area m-b-10">
                                <div class="play-area-sub"> 
                                    
                                    <video id="video" width="250" height="240"></video>
                                </div>
                                <div class="play-area-sub">
                                <label class="col-md-3 col-form-label">Capture Image</label>
                                    <canvas id="canvas" width="250" height="240"></canvas>
                                    <!-- <div id="snapshot"></div> -->
                                </div>
                            </div>
--}}
