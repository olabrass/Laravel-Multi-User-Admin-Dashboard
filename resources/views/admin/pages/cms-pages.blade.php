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
            <h1>CMS Pages</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">cms Pages</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

   <!-- Main content -->
   <div class="card">
     <div class="card-header">
       <h3 class="card-title">Content Management Pages</h3>
       <!-- This button is hidden unless the full permission access is given -->
              @if($pagesModule['full_access']==1)
                <a href="{{ url('/admin/edit-cms-page') }}" class="btn btn-block btn-primary" style="max-width:150px; float:right; display:inline-block">Add CMS Page</a>
              @endif
              </div>
    
               <!-- Error Message -->

              @if(Session::has('success_update'))
                    <div class="alert alert-success"  role="alert">
                    
                      {{Session::get('success_update')}}
                 
                    </div>
                    @elseif(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="cmspages" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>URL</th>
                    <th>Created on</th>
                    <th>Action </th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($cmsPages as $cmsPage)
                  <tr>
                    <td>{{ $cmsPage['id'] }}</td>
                    <td>{{ $cmsPage['title'] }}</td>
                    <td>{{ $cmsPage['url'] }}</td>
                    <td>{{ date('D, d-M-Y, g:i a', strtotime($cmsPage['created_at'] ))}}</td>
                    <td>
                      <div>
                        <form action="{{ url('/admin/status-update') }}"  method="POST" style="display:inline-block">
                            @csrf
                            <input type="hidden" name="id" value="{{$cmsPage['id']}}" />
                            <input type="hidden" name="status" value="{{$cmsPage['status']}}" />
                    
                       @if( $pagesModule['view_access'] == 1 || $pagesModule['full_access'] == 1)    
                            @if ($cmsPage['status'] == 1)
                       <button type="submit" style="background-color:blue; color:white" title='Deactivate this Page'> <i class="fas fa-toggle-on"></i></button>
                       @else
                       <button type="submit" style="background-color:grey; color:white" title='Activate this Page'> <i class="fas fa-toggle-off"></i></button>
                       @endif
                       @endif

                    </form>
                    @if( $pagesModule['edit_access'] == 1 || $pagesModule['full_access']==1) 
                    <a href="{{url('/admin/edit-cms-page/'.$cmsPage['id']) }}"> <button style="background-color:green; color:white" title='Edit this Page'>  <i class="fas fa-edit"></i></button></a>
                     @endif
                     @if($pagesModule['full_access'] == 1)
                    <a href="{{url('/admin/delete-cms-page')}}/{{$cmsPage['id']}}" onclick="confirmation(event)"> <button style="background-color:red; color:white" title='Edit this Page'>  <i class="fas fa-trash"></i></button></a>
                    @endif
                    </div>
                    </td>
                    
                  </tr>
                  
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>ID</th>
                    <th>Title</th>
                    <th>URL</th>
                    <th>Created on</th>
                    <th>Action </th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
  @endsection

  
  </body>
 