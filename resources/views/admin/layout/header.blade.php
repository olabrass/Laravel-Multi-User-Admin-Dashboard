<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Welcome <strong>{{ Auth::guard('admins')->user()->name}} ({{Auth::guard('admins')->user()->type}})</strong></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/admin/dashboard') }}" class="nav-link">Dashboard</a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
      
        <div class="navbar-search-block">
       
              <div class="input-group-append">
             
              
            </div>
         
        </div>
      </li>
   
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/admin/logout') }}" class="nav-link">Logout</a>
      </li>
   
  </nav>