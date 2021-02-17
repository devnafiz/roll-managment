@extends('backend.layouts.master')


@section('content')

<h3>Role Edit</h3>
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

        <form action="{{route('roles.update',$role->id)}}" method="POST">
          @method('PUT')
          @csrf
           <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" name="name" value="{{$role->name}}" >
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
                    @php
                          $permissions=App\User::getpermissionByGroupsName($groups->name);
                          $j=1;
                        @endphp

                      <div class="row">
                        <div class="col-md-3">
                          <input class="form-check-input" name="groups[]" type="checkbox" value="{{ $groups->name }}"  id="{{ $i }}Management"  onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{(App\User::roleHasPermissions($role,$permissions) )? 'checked' :''}}>
                           <label class="form-check-label">{{$groups->name}}</label><br>
                        </div>

                       
                        <div class="col-md-9 role-{{ $i }}-management-checkbox">

                            @foreach($permissions as $prm)
                            <input class="form-check-input" name="permissions[]" {{($role->hasPermissionTo($prm->name))?'checked':''}} type="checkbox" value="{{$prm->id}}"   onclick="checkSinglePermission('role-{{ $i }}-management-checkbox','{{ $i }}Management',{{count($permissions)}})">
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
 function  checkSinglePermission(groupClassName,groupID,countTotalPermission){

   const classCheckBox=$('.'+groupClassName+ 'input');

   const groupIDCheckBox=$('#'+groupID);

   if($('.'+groupClassName+'input:checked').length==countTotalPermission){
     groupIDCheckBox.prop('checked',true);
   }else{
      groupIDCheckBox.prop('checked',false);
   }
   implementAllcheck();
 }

 function implementAllcheck(){ 

  const countPermissions= {{ count($permissions)}};
   const countPermissionGroups= {{count($permissin_groups)}};
   if($('input[type=checkbox]:checked').length>countPermissions+countPermissionGroups){
     $('#checkPermissionall').prop('checked',true);
   }else{
       $('#checkPermissionall').prop('checked',false);
   }

 }



 </script>

 @endsection