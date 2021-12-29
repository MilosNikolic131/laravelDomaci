<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PodrskaDrugogNivoaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('podrska_drugog_nivoa')->insert([
            [
                'ime' => 'Aleksandar',
                'prezime' => 'Karadjordjevic',
                'korisnickoIme' => 'ak20170001',
                'password' => bcrypt('aleksandar')
            ],
            [
                'ime' => 'Milan',
                'prezime' => 'Obrenovic',
                'korisnickoIme' => 'mo20170003',
                'password' => bcrypt('milan')
            ]
        ]);
    }
}
