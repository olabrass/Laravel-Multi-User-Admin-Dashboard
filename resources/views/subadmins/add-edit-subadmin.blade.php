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
            <h1>{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
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
          <div class="col-md-8">

          @if(Session::has('error_message'))
                    <div class="alert alert-danger"  role="alert">
                    
                      {{Session::get('error_message')}}
                 
                    </div>
                  
                    @endif


             <!-- To display validation error messages -->
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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form @if(empty($subAdmin['id'])) action="{{ url('/admin/edit-sub-admin') }}" @else action="{{ url('/admin/edit-sub-admin/'.$subAdmin['id']) }}" @endif method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                      <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" name="email" @if(!empty($subAdmin['email'])) value="{{ $subAdmin['email'] }}" disabled="" style="background-color:grey" @endif class="form-control" id="email" placeholder="Enter Email">
                      </div>
                    <label for="Name">Name*</label>
                    <input type="text" name="name" @if(!empty($subAdmin['name'])) value="{{ $subAdmin['name'] }}" @endif class="form-control" id="name" placeholder="Enter Sub-admin Name">
                  </div>
                  <div class="form-group">
                    <label for="Type">Type*</label>
                    <input type="text" name="type" @if(!empty($subAdmin['type'])) value="{{ $subAdmin['type'] }}" @endif class="form-control" id="type" placeholder="Enter Role Type">
                  </div>
               
                  <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input type="text" name="phone" @if(!empty($subAdmin['phone'])) value="{{ $subAdmin['phone'] }}" @endif class="form-control" id="phone" placeholder="Enter phone Number">
                  </div>
                  <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" @if(!empty($subAdmin['id'])) placeholder="Update or Leave it empty to keep existing password"@else placeholder="Enter Password" @endif>
                  </div>
                  <div class="form-group">
                    <label for="Password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="password" @if(!empty($subAdmin['id'])) placeholder="Update or Leave it empty to keep existing password"@else placeholder="Confirm Password" @endif>
                  </div>
                  <div class="form-group">
                    <label for="Profile Image">Upload Profile Image</label>
                    <input type="file" name="image" @if(!empty($subAdmin['image'])) value="{{ $subAdmin['image'] }}" @endif class="form-control" id="image" placeholder="Profile Image">
                  </div>
                  @if(($subAdmin['image']))
                  <div>
                    <img src="{{asset('admin/images/photos')}}/{{ $subAdmin['image'] }}"  style="max-width:50px" alt="Photo">
                  </div>
                  @endif
                
                 
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           
  </div>
  <!-- /.content-wrapper -->
  

  <!-- /.control-sidebar -->
</div>

</body>
</html>

 
  @endsection
  </body>