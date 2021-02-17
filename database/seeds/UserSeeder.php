<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$user=User::where('email','nafiz016@gmail.com')->first();
    	if(is_null($user)){
    		$user=new User();

        $user->name='Nazmul Hossain';
        $user->email='nafiz016@gmail.com';
        $user->password=Hash::make('12345678');
        $user->save();


    	}
        
    }
}
