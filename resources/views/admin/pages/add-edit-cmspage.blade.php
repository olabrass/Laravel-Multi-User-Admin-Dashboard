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
              <form @if(empty($CmsPage['id'])) action="{{ url('/admin/edit-cms-page') }}" @else action="{{ url('/admin/edit-cms-page/'.$CmsPage['id']) }}" @endif method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title*</label>
                    <input type="text" name="title" @if(!empty($CmsPage['title'])) value="{{ $CmsPage['title'] }}" @endif class="form-control" id="title" placeholder="Enter Page Title">
                  </div>
                  <div class="form-group">
                    <label for="url">URL*</label>
                    <input type="text" name="url" @if(!empty($CmsPage['url'])) value="{{ $CmsPage['url'] }}" @endif class="form-control" id="url" placeholder="Enter Page URL">
                  </div>
                  <div class="form-group">
                    <label for="description">Description*</label>
                    <textarea name="description" class="form-control" id="description">@if(!empty($CmsPage['meta_description'])) {{ $CmsPage['meta_description'] }} @endif
                    </textarea>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Meta Title</label>
                    <input type="text" name="meta-title" @if(!empty($CmsPage['meta_title'])) value="{{ $CmsPage['meta_title'] }}" @endif class="form-control" id="meta-title" placeholder="Enter Meta Title">
                  </div>
                  <div class="form-group">
                    <label for="meta-description">Meta Description</label>
                    <input type="text" name="meta-description" @if(!empty($CmsPage['meta_description'])) value="{{ $CmsPage['meta_description'] }}" @endif class="form-control" id="meta_description" placeholder="Enter Meta Description">
                  </div>
                  <div class="form-group">
                    <label for="meta-description">Meta Keywords</label>
                    <input type="text" name="meta-keyword" @if(!empty($CmsPage['meta_keywords'])) value="{{ $CmsPage['meta_keywords'] }}" @endif class="form-control" id="meta_keyword" placeholder="Enter Meta Description">
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