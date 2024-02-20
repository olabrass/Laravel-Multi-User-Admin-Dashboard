<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
</div>
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

          @if(Session::has('success_message'))
                    <div class="alert alert-success"  role="alert">
                    
                      {{Session::get('success_message')}}
                 
                    </div>
                  
                    @endif

                    
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update {{$title}}</h3>
              </div>
              <!-- /.card-header -->

          
                    <!-- Get exsting data from subadmin table -->
            @if(!empty($subAdminRoles))
              @foreach($subAdminRoles as $subAdminRole)
                @if($subAdminRole['module'] == "cms_pages")
                    @if($subAdminRole['view_access'] == 1)
                        @php $viewCMSPage = "checked" @endphp
                    @else
                      @php $viewCMSPage = "" @endphp 
                    @endif

                    @if($subAdminRole['edit_access'] == 1)
                        @php $editCMSPage = "checked" @endphp
                    @else
                      @php $editCMSPage = "" @endphp 
                    @endif

                    @if($subAdminRole['full_access'] == 1)
                        @php $fullCMSPage = "checked" @endphp
                    @else
                      @php $fullCMSPage = "" @endphp 
                    @endif

                  @endif
                @endforeach
              @endif

              <!-- form start -->
              <form action="{{ url('/admin/update_role/{$id}') }}" method="post">
                @csrf

            
                <div class="card-body">
                    <input type="hidden" name="subadmin_id" value="{{$id}}">
                  <div class="form-group">
                    <label for="Type"><b>CMS Pages:</b> &nbsp; &nbsp;&nbsp; &nbsp;</label>
                    <input type="checkbox" @if(isset($viewCMSPage)) {{$viewCMSPage}} @endif name="cms_pages[view]" value="1">&nbsp; View Access &nbsp; &nbsp;&nbsp; &nbsp;
                    <input type="checkbox" @if(isset($editCMSPage)) {{$editCMSPage}} @endif name="cms_pages[edit]" value="1">&nbsp; View/Edit Access &nbsp; &nbsp;&nbsp; &nbsp;
                    <input type="checkbox" @if(isset($fullCMSPage)) {{$fullCMSPage}} @endif name="cms_pages[full]" value="1">&nbsp; Full Access &nbsp; &nbsp;&nbsp; &nbsp;
                  </div>
           
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