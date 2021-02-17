@extends('backend.layouts.master')


@section('content')
<div class="col-12">
  <div class="card">
      <div class="card-body">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{route('roles.store')}}" method="POST">
          @csrf
           <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter ...">
                      </div>
                      
                    </div>
                    
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <h4>Permission all</h4>
                      <div class="form-group">
                       
                      
                            <input class="form-check-input" id="checkPermissionall" name="permissions[]" type="checkbox" value="">
                          <label class="form-check-label">All Permission</label><br>
                       
                      </div>
                      
                    </div>
                     @php
                    $i=1;
                    @endphp

                    @foreach($permissin_groups as $groups)

                      <div class="row">
                        <div class="col-md-3">
                          <input class="form-check-input" name="groups[]" type="checkbox" value="{{ $groups->name }}"  id="{{ $i }}Management"  onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                           <label class="form-check-label">{{$groups->name}}</label><br>
                        </div>

                        @php
                          $permissions=App\User::getpermissionByGroupsName($groups->name);
                          $j=1;
                        @endphp
                        <div class="col-md-9 role-{{ $i }}-management-checkbox"">

                            @foreach($permissions as $prm)
                            <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$prm->id}}">
                          <label class="form-check-label">{{$prm->name}}</label><br>

                          @php
                          $j++;
                          @endphp
                        @endforeach
                        </div>
                        
                      </div>
                      @php
                          $i++;
                          @endphp
                    @endforeach

                  <div class="col-sm-6">
                      <!-- text input -->
                      <h4>Permission</h4>
                      <div class="form-group">
                       
                       
                      </div>
                      
                    </div>
                    
                  </div>
                  <button type="submit">Create</button>
        </form>
        
      </div>
    
  </div>
  

</div>

<h4>create role</h4>
  <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Grad(s)</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  	@foreach($permissions as $key=>$permission)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>
                    </td>
                    <td>
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

 @section('script')
 <script type="text/javascript">
   
   $(document).ready(function(){

    //alert('hi');


   });
 </script>

 <script type="text/javascript">
   
   $("#checkPermissionall").click(function(){

         if($(this).is(':checked')){

          //check all the box\
          $('input[type=checkbox]').prop('checked',true);
         }else{

          //un check all box
          $('input[type=checkbox]').prop('checked',false);
         }



   });
 function checkPermissionByGroup(className,checkThis){

    const groupIdName = $("#"+checkThis.id);
    const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }


 }


 </script>

 @endsection