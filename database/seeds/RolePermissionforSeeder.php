<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionforSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create
         $roleSuperAdmin = Role::create(['name' => 'superadmin']); 
         $roleAdmin = Role::create(['name' => 'admin']);
           
         $roleEditor = Role::create(['name' => 'editor']);
         $roleUser = Role::create(['name' => 'user']);
        //permission  list array
        $permissions =[


                    [
                      'group_name'=>'dashboard',
                      'permissions'=>[
                                 'dashboard.view',
                                 'dashboard.edit',


                      ]

                    ],
                     [
                      'group_name'=>'blog',
                      'permissions'=>[
                                'blog.create',
                                'blog.edit',
                                'blog.view',
                                'blog.delete',
                                'blog.approved',


                      ]

                    ],


 [
                      'group_name'=>'admin',
                      'permissions'=>[
                                  'admin.create',
                                  'admin.edit',
                                  'admin.view',
                                  'admin.delete',
                                  'admin.approved',


                      ]

                    ],

 [
                      'group_name'=>'role',
                      'permissions'=>[
                                  'role.create',
                                  'role.edit',
                                  'role.view',
                                  'role.delete',
                                  'role.approved',


                      ]

                    ],

                     [
                      'group_name'=>'profile',
                      'permissions'=>[
                                  'profile.create',
                                  'profile.edit',
                                  'profile.view'


                      ]

                    ],
  
                  

        ];


        for ($i=0; $i < count($permissions); $i++) {
          $permissionGroup=$permissions[$i]['group_name'];
             for ($j=0; $j <count($permissions[$i]['permissions']); $j++) { 

                  $permission=Permission::create(['name' => $permissions[$i]['permissions'][$j],'group_name'=>$permissionGroup]);
                  $roleSuperAdmin->givePermissionTo($permission);
                  $permission->assignRole($roleSuperAdmin);
              
             }

        	
        }
        

    }
}
