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

        <form action="{{route('users.store')}}" method="POST">
          @csrf
           <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter ...">
                      </div>
                      
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter ...">
                      </div>
                      
                    </div>
                    
                  </div>



                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter ...">
                      </div>
                      
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>confirm  Password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Enter ...">
                      </div>
                      
                    </div>
                    
                  </div>
                   
                    

                  <div class="col-sm-6">
                      <!-- text input -->
                    <div class="form-group">
                        <label>Role</label>
                        <select name="roles[]" id="roles" class=" form-control select2" multiple>
                          @foreach($all_role as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>


                          @endforeach

                        </select>
                      </div>
                      
                    </div>
                    
                  </div>
                  <button type="submit">Create</button>
        </form>
        
      </div>
    
  </div>
  

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