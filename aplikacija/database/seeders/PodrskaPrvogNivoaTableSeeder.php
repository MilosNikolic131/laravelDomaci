<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PodrskaPrvogNivoaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('podrska_prvog_nivoa')->insert([
            [
                'ime' => 'Milos',
                'prezime' => 'Nikolic',
                'korisnickoIme' => 'mn20180131',
                'password' => bcrypt('milos'),
                'id_nadredjenog' =>'1'
            ],
            [
                'ime' => 'Petar',
                'prezime' => 'Petrovic',
                'korisnickoIme' => 'pp20180123',
                'password' => bcrypt('petar'),
                'id_nadredjenog' =>'2'
            ],
            [
                'ime' => 'Ana',
                'prezime' => 'Anic',
                'korisnickoIme' => 'aa20180321',
                'password' => bcrypt('ana'),
                'id_nadredjenog' =>'1'
            ]
        ]);
    }
}
