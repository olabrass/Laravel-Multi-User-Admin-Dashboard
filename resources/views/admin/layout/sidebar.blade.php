<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ url ('admin/images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8')>
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

        @if(empty(Auth::guard('admins')->user()->image))
          <img src="{{ url ('admin/images/photos/avatar.png')}} " alt="Admin Photo">
        @else
          <img src="{{ url ('admin/images/photos')}}/{{Auth::guard('admins')->user()->image }}" style="max-width:35px; max-height:35px" class="img-circle elevation-2" alt="User Image">
      
      @endif

        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::guard('admins')->user()->name }} ({{ Auth::guard('admins')->user()->type }}) </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <!-- For selected page highlight (Dashborad page) -->
        @if(Session::get('page') == 'dashboard')
        @php $active = 'active' @endphp
        @else
        @php $active = '' @endphp
        @endif
        
               <li class="nav-item">
            <a href="{{url('/admin/dashboard')}}" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
             <!-- For selected page highlight (Settings link) -->
             @if(Session::get('page') == 'update-password' || (Session::get('page') == 'update-details'))
        @php $active = 'active' @endphp
        @else
        @php $active = '' @endphp
        @endif

        @if(Auth::guard('admins')->user()->type=='admin')
          <li class="nav-item menu-open">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

               <!-- For selected page highlight (Update Password page) -->
            @if(Session::get('page') == 'update-password')
        @php $active = 'active' @endphp
        @else
        @php $active = '' @endphp
        @endif
              <li class="nav-item">
                <a href="{{ url('/admin/update-password') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Password</p>
                </a>
              </li>
              <!-- For selected page highlight (Update Details page) -->
            @if(Session::get('page') == 'update-details')
        @php $active = 'active' @endphp
        @else
        @php $active = '' @endphp
        @endif
              <li class="nav-item">
                <a href="{{ url('/admin/update-details') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Details</p>
                </a>
              </li>
              
            </ul>
          </li>
          <!-- For selected page highlight (CMS page) -->
          @if(Session::get('page') == 'view-subadmin')
        @php $active = 'active' @endphp
        @else
        @php $active = '' @endphp
        @endif
          <li class="nav-item">
            <a href="{{ url('/admin/subadmins') }}" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Sub Admins
               
              </p>
            </a>

            @endif
              <!-- For selected page highlight (CMS page) -->
              @if(Session::get('page') == 'cms-pages')
        @php $active = 'active' @endphp
        @else
        @php $active = '' @endphp
        @endif
          <li class="nav-item">
            <a href="{{ url('/admin/cms-page') }}" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                CMS Pages
              </p>
            </a>
         
            
              </li> 
  
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>