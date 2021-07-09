<!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
      <!-- begin sidebar scrollbar -->
      <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
          <li class="nav-profile">
            <a href="javascript:;" data-toggle="nav-profile">
              <div class="cover with-shadow"></div>
              <div class="image">
                <img src="{{asset('assets/img/user/')}}/{{Auth::user()->picture}}" alt="" />
              </div>
              <div class="info">
                
                {{Auth::user()->name}}
                <small>{{App\Models\ROffice::where('office_id',Auth::user()->office_id)->value('office_name')}}</small>
              </div>
            </a>
          </li>
          {{--<li>
            <ul class="nav nav-profile">
                <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
                <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
            </ul>
          </li>--}}
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
          <li class="nav-header">Navigation</li>
          <li class="has-sub active">
            <a href="javascript:;">
                  
                <i class="fa fa-th-large"></i>
                <span>Dashboard</span>
              </a>
            
          </li>
   
           @if(Auth::user()->role=='employee')
          <li class="has-sub {{ (Route::currentRouteName() == 'my-documents') ? 'active' : '' }}">
              <a href="{{route('my-documents')}}">
                  
                  <i class="fa fa-envelope"></i>
                  <span>My Documents</span>
              </a>
            
          </li>
          <li class="has-sub {{ (Route::currentRouteName() == 'for-approval') ? 'active' : '' }}">
              <a href="{{route('for-approval')}}">
                  
                  <i class="fa fa-thumbs-up"></i>
                  <span>For Approval</span>
              </a>
            
          </li>
         
          <li class="has-sub {{ (Route:: currentRouteName() == 'for-revision')? 'active' : '' }}">
              <a href="{{route('for-revision')}}">
                  
                  <i class="fa fa-share-square"></i>
                  <span>For Revision</span>
              </a>
            
          </li>
         <li class="has-sub {{ (Route:: currentRouteName() == 'approved')? 'active' : '' }}">
              <a href="{{route('approved')}}">
                  
                  <i class="fa fa-handshake"></i>
                  <span>Approved</span>
              </a>
            
          </li>
          <li class="has-sub {{ (Route:: currentRouteName() == 'disapproved')? 'active' : '' }}">
              <a href="{{route('disapproved')}}">
                  
                  <i class="fa fa-thumbs-down"></i>
                  <span>Disapproved</span>
              </a>
            
          </li>
       
          @endif
          @if(Auth::user()->role=='admin')
          <li class="has-sub {{ (Route:: currentRouteName() == 'addoffice')? 'active' : '' }}">
               <a href="{{route('addoffice')}}">
                  
                  <i class="fa fa-briefcase"></i>
                  <span>Office</span>
              </a>
            
          </li>
          <li class="has-sub {{ (Route:: currentRouteName() == 'user')? 'active' : '' }}">
               <a href="{{route('user')}}">
                  
                  <i class="fa fa-user"></i>
                  <span>User</span>
              </a>
            
          </li>
          <li class="has-sub">
              <a href="javascript:;">
                    <b class="caret"></b>
                  <i class="fa fa-paperclip"></i>
                  <span>Documents Setup </span> 
              </a>
            <ul class="sub-menu">
                <li class="has-sub {{ (Route:: currentRouteName() == 'user')? 'active' : '' }}">
                  <a href="{{route('documentsSetup')}}">
                    <i class="fa fa-paperclip"></i>
                    <span>Document Category</span>
                  </a>
                </li>

                <li class="has-sub {{ (Route:: currentRouteName() == 'user')? 'active' : '' }}">
                 <a href="{{route('user')}}">
                    <i class="fa fa-paperclip"></i>
                    <span>Document Purpose</span>
                  </a>
                </li>

                <li class="has-sub {{ (Route:: currentRouteName() == 'user')? 'active' : '' }}">
                 <a href="{{route('user')}}">
                    <i class="fa fa-paperclip"></i>
                    <span>Document Priority</span>
                  </a>
                </li>


            </ul>
          </li>
          @endif

        
              <!-- begin sidebar minify button -->
          <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
              <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
      </div>
      <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->
