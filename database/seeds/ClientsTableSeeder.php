<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients=[
            ['id'=>'1','name'=>'Test','description'=>'Cliente de Prueba','api_key'=>bcrypt(date('Y-m-d H:i:s')),'status'=>'ACTIVO']
        ];
        
        foreach($clients as $client){
            if(!Client::find($client['id'])){
                DB::table('clients')->insert($client);
            }
        }
    }
}
