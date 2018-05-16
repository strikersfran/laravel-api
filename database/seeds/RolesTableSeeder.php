<?php

use Illuminate\Database\Seeder;
use App\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[
            ['id'=>'1','name'=>'Administrador API'],
            ['id'=>'2','name'=>'Administrador'],
            ['id'=>'3','name'=>'Users']
        ];
        
        foreach($roles as $rol){
            if(!Roles::find($rol['id'])){
                DB::table('roles')->insert($rol);
            }
        }
    }
}
