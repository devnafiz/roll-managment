<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use App\User;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['all_roles'] = Role::all();
        return view('backend.page.role.view-role',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['all_permissions  '] = Permission::all();
        $data['permissin_groups']=User::getpermissionGroups();

        //dd( $data['permissin_groups']);
        return view('backend.page.role.create-roles',$data);
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

              'name'=>'required|max:100|unique:roles'
        ],[

          'name.required'=>'please give role Name'
        ]

    );
         $role=Role::create(['name' => $request->name]);

         //$role=DB::table('roles')->where('name',$request)->first();
         $permissions=$request->input('permissions');

         if(!empty($permissions)){

            $role->syncPermissions($permissions);
         }

         return redirect()->route('roles.index')->with('success','data added');
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
         $data['all_permissions  '] = Permission::all();
        $data['permissin_groups']=User::getpermissionGroups();

        //dd( $data['permissin_groups']);
        return view('backend.page.role.edit-role',$data);
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
         $request->validate([

              'name'=>'required|max:100'
        ],[

          'name.required'=>'please give role Name'
        ]

    );
         $role=Role::find($id);;

         //$role=DB::table('roles')->where('name',$request)->first();
         $permissions=$request->input('permissions');

         if(!empty($permissions)){
            $role->name=$request->name;
            $role->save();

            $role->syncPermissions($permissions);
         }

         return redirect()->route('roles.index')->with('success','data added');
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
