<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZalbeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Zalbe')->insert([
            [
                'tip_problema' => 'exception',
                'opis' => 'Problem prilikom slanja forme',
                'status' => 'Resen',
                'id_prvog_nivoa' => '1',
                'id_drugog_nivoa' => null
            ],
            [
                'tip_problema' => 'CTD',
                'opis' => 'CTD prilikom unosa u formu',
                'status' => 'prosledjen podrsci drugog nivoa',
                'id_prvog_nivoa' => '2',
                'id_drugog_nivoa' => '1'
            ],
            [
                'tip_problema' => 'Freeze',
                'opis' => 'Ekran se zamrzne nakon sto se pretisne dugme',
                'status' => 'prosledjen podrsci drugog nivoa',
                'id_prvog_nivoa' => '1',
                'id_drugog_nivoa' => '2'
            ]
        ]);
    }
}
