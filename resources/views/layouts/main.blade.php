<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <title>DocExpert | @yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <input type="text" id="_token" value="{{csrf_token()}}" hidden>


  @include('layouts.includes.base-css')
  @yield('extra-css')
  <style>
  #logo {
    display: inline-block;
    margin: 10px; 
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
  <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar-default">
      <!-- begin navbar-header -->
      <div class="navbar-header">
        <a href="#"><img id="logo" src="{{asset('assets/img/logo/pup.png')}}"></a>
        <!-- <a href="{{route('login')}}" class="navbar-brand"><b>Doc</b>Expert</a> -->
        <b style="font-size: 16px; margin-right: 1px;">DocXpert</b>
        <input type="text" id="base-url" value="{{asset('')}}" hidden>
       
      </div>
      <!-- end navbar-header -->
      
      <!-- begin header-nav -->
      <ul class="navbar-nav navbar-right">
        <li>
          <form class="navbar-form">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter keyword" />
              <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
            </div>
          </form>
        </li>
        <li class="dropdown">
          <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
            <i class="fa fa-bell"></i>
            <span class="label">{{
              App\Models\TMention::where('office_id', Auth::user()->office_id)->count()
            }}</span>
          </a>
          <ul class="dropdown-menu media-list dropdown-menu-right">
            <li class="dropdown-header">NOTIFICATIONS ({{
              App\Models\TMention::where('office_id', Auth::user()->office_id)->count()
            }})</li>
            
            @php
                $get_mention_message = DB::table('v_message_notif')->where('office_id',Auth::user()->office_id)->get();
                $get_mention_comment = DB::table('v_comments_notif')->where('office_id',Auth::user()->office_id)->get();

            @endphp
            @foreach($get_mention_message as $message)
            <li class="media">
              <a href="{{asset('')}}employee/view/main-document/{{$message->document_id}}#messages">
                <div class="media-left">
                  <img src="{{asset('assets/img/user/')}}/{{$message->picture}}" class="media-object" alt="" />
                  <i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
                </div>
                <div class="media-body">
                  <h6 class="media-heading">{{$message->office_name}}</h6>
                  <p>{{$message->message}}</p>
                  {{--<div class="text-muted f-s-11">25 minutes ago</div>--}}
                </div>
              </a>
            </li>
            @endforeach
            
            @foreach($get_mention_comment as $comment)
            <li class="media">
              <a href="{{asset('')}}employee/view/main-document/{{$comment->document_id}}#messages">
                <div class="media-left">
                  <img src="{{asset('assets/img/user/')}}/{{$comment->picture}}" class="media-object" alt="" />
                  <i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
                </div>
                <div class="media-body">
                  <h6 class="media-heading">{{$comment->office_name}}</h6>
                  <p>{{$comment->comments}}</p>
                  {{--<div class="text-muted f-s-11">25 minutes ago</div>--}}
                </div>
              </a>
            </li>
            @endforeach
            <li class="dropdown-footer text-center">
              <a href="javascript:;">View more</a>
            </li>
          </ul>
        </li>

        <li class="dropdown navbar-user">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{asset('assets/img/user/')}}/{{Auth::user()->picture}}" alt="" /> 
            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span> <b class="caret"></b>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="javascript:;" class="dropdown-item">Edit Profile</a>
            <a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
            <a href="javascript:;" class="dropdown-item">Calendar</a>
            <a href="javascript:;" class="dropdown-item">Setting</a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" 
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" class="dropdown-item">Log Out</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
          </div>
        </li>
      </ul>
      <!-- end header navigation right -->
    </div>
    <!-- end #header -->
    
    @include('navigations.employee-sidenav')
    
    @yield('content')
    
       
    
    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
  </div>
  <!-- end page container -->

  
  @include('layouts.includes.base-js')
  @yield('extra-js')

</body>
</html>
