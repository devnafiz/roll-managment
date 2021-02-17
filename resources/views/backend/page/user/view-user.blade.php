@extends('backend.layouts.master')


@section('content')
  <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <a href="{{route('users.create')}}" class="btn btn-success">Create user</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Email(s)</th>
                    <th>Roles</th>
                    <td>Action</td>
                    
                  </tr>
                  </thead>
                  <tbody>
                  	@foreach($all_users as $key=>$user)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->name}}
                    </td>
                    <td>{{$user->email}}
                    </td>
                    <td></td>
                    <td>
                      <a href="{{route('users.edit',$user->id)}}" class="btn btn-success"> edit</a>
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