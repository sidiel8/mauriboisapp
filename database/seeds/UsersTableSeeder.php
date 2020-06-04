<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User  ;
use App\Role ;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    User::truncate();
    DB::table('role_user')->truncate() ;
    
    $adminRole = Role::where('name' , 'admin')->first() ;
    $userRole = Role::where('name' , 'user')->first() ;

     $admin = User::create(
         [
             'name' => 'sidi Elhaje' ,
             'nv' => 00 ,
             'phone' => 47485279 ,
             'password'=> Hash::make('password92') 
         ]
     ) ;

     $user = User::create(
        [
            'name' => 'M\'barcka' ,
            'nv' => 22 ,
            'phone' => 21212121 ,
            'password'=> Hash::make('password2') 
        ]
    ) ;

    $admin->roles()->attach($adminRole) ;
    $user->roles()->attach($userRole) ;

    }
}
