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
            <h1>Update Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Details</li>
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

                <h3 class="card-title">Update Admin Details </h3>
              </div>

              <!-- Validation error messages -->
              @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach  ($errors->all() as $error)
          <li>
            {{$error}}
          </li>
          @endforeach
        </ul>
      </div>
      @endif
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
              <form method="post" action="{{ url('/admin/update-details') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="admin_email">Email address</label>
                    <input type="email" class="form-control" id="admin_email" value="{{Auth::guard('admins')->user()->email }}" readonly="" style="background-color:#666">
                  </div>
                  
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="current-pwd" value="{{ Auth::guard('admins')->user()->name }}">
                   
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="new-pwd" value=" {{ Auth::guard('admins')->user()->phone}}">
                  </div>
                  <div class="form-group">
                    <label for="image">Change Photo</label>
                    <input type="file" class="form-control" name="image" id="image" >
                  </div>
                  <img src="{{asset('admin/images/photos')}}/{{Auth::guard('admins')->user()->image }}" alt="Admin photo" style="max-width:50px">
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
                <!-- /.card-body -->

  @endsection
  </body>