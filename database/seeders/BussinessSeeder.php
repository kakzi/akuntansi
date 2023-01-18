<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BussinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bussinesses')->insert([
            'user_id'      => '1',
            'name'     => 'Nadeen Store',
            'address'     => 'Desa Katur Kecamatan Gayam',
            'image'     => null,
            'number'     => '085155105056',
        ]);
    }
}
