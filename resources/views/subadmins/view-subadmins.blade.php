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
                <a href="{{ url('/admin/edit-sub-admin') }}" class="btn btn-block btn-primary" style="max-width:150px; float:right; display:inline-block">Add Sub-admin</a>
              </div>

               <!-- Error Message -->

              @if(Session::has('success_update'))
                    <div class="alert alert-dark"  role="alert">
                    
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
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Created on</th>
                    <th>Action </th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($subadmins as $subadmin)
                  <tr>
                    <td>
                        <img src="{{asset('admin/images/photos')}}/{{ $subadmin['image'] }}" alt="User Image" style="max-width:40px">
                        
                    </td>
                    <td>{{ $subadmin['name'] }}</td>
                    <td style="max-width:150px">{{ $subadmin['email'] }}</td>
                    <td>{{ $subadmin['type'] }}</td>
                    <td>{{ $subadmin['phone'] }}</td>
                    <td>@if($subadmin['status']==1) 
                        <div style="color:blue"><i class="fa fa-check-square" style="font-size:24px"></i></div>    @else <div style="color:red"><i class="fa fa-ban" style="font-size:24px"></i></div>  @endif </td>
                    <td style="max-width:80px">{{ date('D, d-M-Y, g:i a', strtotime($subadmin['created_at'] ))}}</td>
                    <td>
                      <div>
                        <form action="{{ url('/admin/update-status') }}"  method="POST" style="display:inline-block">
                            @csrf
                            <input type="hidden" name="id" value="{{$subadmin['id']}}" />
                            <input type="hidden" name="status" value="{{$subadmin['status']}}" />
                    @if ($subadmin['status'] == 1)
                   
                       <button type="submit" style="background-color:blue; color:white" title='Deactivate Account'> <i class="fa fa-toggle-on"></i></button>
                       @else
                       <button type="submit" style="background-color:grey; color:white" title='Activate Account'> <i class="fa fa-toggle-off"></i></button>
                       @endif
                    </form>
                    
                    <a href="{{url('/admin/edit-sub-admin/'.$subadmin['id']) }}"> <button style="background-color:green; color:white" title='Edit this Account'>  <i class="fas fa-edit"></i></button></a>
                     
                    <a href="{{url('/admin/delete-sub-admin')}}/{{$subadmin['id']}}" onclick="confirmation(event)"> <button style="background-color:red; color:white" title='Delete this Account'>  <i class="fas fa-trash"></i></button></a>
                    <a href="{{url('/admin/update_role')}}/{{$subadmin['id']}}"> <button style="background-color:green; color:white" title='Update Permision'>  <i class="fas fa-unlock"></i></button></a>
                    
                    </div>
                    </td>
                    
                  </tr>
                  
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Phone</th>
                    <th>Status</th>
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
 