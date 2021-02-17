<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['all_users'] = User::all();
        return view('backend.page.user.view-user',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data['all_role'] = Role::all();
        

        //dd( $data['permissin_groups']);
        return view('backend.page.user.create-users',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate([

              'name'=>'required|max:100',
              'email'=>'required|max:100|unique:users|',

        ],[

          'name.required'=>'please give role Name'
        ]

    );
         $user=new User();
         $user->name=$request->name;
         $user->email=$request->email;
         $user->password=Hash::make($request->password);
         $user->save();
         if($request->roles){
            $user->assignRole($request->roles);
         }

         return redirect()->route('users.index')->with('success','data added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data['role']=Role::find($id);
         $data['users'] = User::find($id);
         $data['all_role'] = Role::all();
    
        return view('backend.page.user.edit-user',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
