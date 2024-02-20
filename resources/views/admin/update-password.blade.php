@extends('admin.layout.layout')

@section('content')


<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">

                <h3 class="card-title">Update Admin Password </h3>
              </div>

                <!--Error Messages-->
                @if(Session::has('error_message'))
                    <div class="alert alert-danger" role="alert">
                       <strong>Error : </strong> {{Session::get('error_message')}}
                    </div>
                    @elseif(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                       <strong>Success : </strong> {{Session::get('success')}}
                    </div>
                    @endif

              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ url('/admin/update-password') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="admin_email">Email address</label>
                    <input type="email" class="form-control" id="admin_email" value="{{Auth::guard('admins')->user()->email }}" readonly="" style="background-color:#666">
                  </div>
                  
                  <div class="form-group">
                    <label for="current-pwd">Current Password</label>
                    <input type="password" class="form-control" name="current_pwd" id="current-pwd" placeholder="Current Password">
                    <span id="verifyCurrentPwd"></span>
                  </div>
                  <div class="form-group">
                    <label for="new_pwd">New Password</label>
                    <input type="password" class="form-control" name="new_pwd" id="new-pwd" placeholder="New Password">
                  </div>
                  <div class="form-group">
                    <label for="confirm_pwd">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password">
                  </div>
                 
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
                <!-- /.card-body -->

  @endsection
  </body>