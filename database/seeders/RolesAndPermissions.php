<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $AllPermissions = [
            "show-task" , "add-task" , "update-task" , "delete-task",
            "show-users" , "add-users" , "update-users" , "delete-users" , 
        ] ; 

        

        $Permission = collect($AllPermissions)->map(function($Permission){
            return ["name" => $Permission , "guard_name"=>"web" , "created_at" => now() , "updated_at" => now() ,] ; 
        }) ; 

        Permission::insert($Permission->toArray()) ; 

        $Role = Role::create(["name" => "super admin"])
        ->givePermissionTo($AllPermissions); 


        $Permission_user = [
            "show-task" , "add-task","delete-task",
        ] ; 
        

        // $Permission_user_get = collect($Permission_user)->map(function($Permission_user_get){
        //     return ["name" => $Permission_user_get , "guard_name"=>"web" , "created_at" => now() , "updated_at" => now() ,] ; 
        // });

        $Role = Role::create(["name" => "user"])
        ->givePermissionTo($Permission_user); 
    }
}
