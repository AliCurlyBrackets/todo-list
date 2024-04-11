<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Admin Permission
        $Admin = User::create([
            "name" => "admin" ,
            "email" => "admin@admin.com"  ,
            "password" => "rootadmin" ,
            "role" => "super admin" , 
        ]) ;
        $Admin->assignRole("super admin") ; 

        $user = User::create([
            "name" => "user" ,
            "email" => "user@user.com"  ,
            "password" => "@_Ali2.com" ,
        ]) ;
        $user->assignRole("user") ; 
        
    }
}
