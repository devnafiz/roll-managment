@extends('backend.layouts.master')


@section('content')
  <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <a href="{{route('roles.create')}}" class="btn btn-success">Create Role</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Grad(s)</th>
                    <th>permission</th>
                    <td>Action</td>
                    
                  </tr>
                  </thead>
                  <tbody>
                  	@foreach($all_roles as $key=>$roles)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$roles->name}}
                    </td>
                    <td>{{$roles->guard_name}}
                    </td>
                    <td>@foreach($roles->permissions as $per)

                      <span class="badge badge-info">{{$per->name}}</span>

                    @endforeach</td>
                    <td>
                      <a href="{{route('roles.edit',$roles->id)}}" class="btn btn-success"> edit</a>
                    </td>
                    
                  </tr>
                 @endforeach
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>



@endsection