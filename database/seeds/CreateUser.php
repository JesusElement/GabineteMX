<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cliente')->insert([
            'id_cliente'=>'1',
            'nom'=>'Antonio',
            'ape1'=>'Hernandez',
            'ape2'=>'Oropeza',
            'email'=>'antonioher@gmail.com',
            'telefono'=>'55004879',
            'fech_na'=>'1998/10/04',
            'rfc'=>'xxxxxxxx'
        ]);
 }
}
