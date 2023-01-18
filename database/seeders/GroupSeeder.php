<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'bussiness_id'      => '1',
            'name'     => 'Aset',
            'code'     => 'A001'
        ]);
        DB::table('groups')->insert([
            'bussiness_id'      => '1',
            'name'     => 'Kewajiban',
            'code'     => 'B001'
        ]);
        DB::table('groups')->insert([
            'bussiness_id'      => '1',
            'name'     => 'Ekuitas',
            'code'     => 'C001'
        ]);
        DB::table('groups')->insert([
            'bussiness_id'      => '1',
            'name'     => 'Pendapatan',
            'code'     => 'D001'
        ]);
        DB::table('groups')->insert([
            'bussiness_id'      => '1',
            'name'     => 'Biaya',
            'code'     => 'E001'
        ]);
    }
}
