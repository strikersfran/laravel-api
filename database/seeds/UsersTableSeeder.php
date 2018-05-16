<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            ['id'=>'1','name'=>'Administrador API','email'=>'admin@api.com','password'=>bcrypt('adminapi'),'rol_id'=>'1'],
            ['id'=>'2','name'=>'Administrador','email'=>'admin@admin.com','password'=>bcrypt('admin'),'rol_id'=>'2'],
            ['id'=>'3','name'=>'Demo','email'=>'demo@demo.com','password'=>bcrypt('demo'),'rol_id'=>'3']
            
        ];
        
        foreach($users as $user){
            if(!User::find($user['id'])){
                DB::table('users')->insert($user);
            }
        }
        
    }
}
