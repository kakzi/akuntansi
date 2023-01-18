<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_groups')->insert([
            'bussiness_id'      => '1',
            'group_id'      => '1',
            'name'     => 'Aset Lancar',
            'code'     => 'AA001'
        ]);
        DB::table('sub_groups')->insert([
            'bussiness_id'      => '1',
            'group_id'      => '1',
            'name'     => 'Aset Tetap',
            'code'     => 'AB001'
        ]);
        DB::table('sub_groups')->insert([
            'bussiness_id'      => '1',
            'group_id'      => '2',
            'name'     => 'Utang Pajak',
            'code'     => 'BA001'
        ]);
        DB::table('sub_groups')->insert([
            'bussiness_id'      => '1',
            'group_id'      => '3',
            'name'     => 'Laba diTahan',
            'code'     => 'CA001'
        ]);
        DB::table('sub_groups')->insert([
            'bussiness_id'      => '1',
            'group_id'      => '4',
            'name'     => 'Pendapatan Penjualan',
            'code'     => 'DA001'
        ]);
        DB::table('sub_groups')->insert([
            'bussiness_id'      => '1',
            'group_id'      => '4',
            'name'     => 'Pendapatan Lainya',
            'code'     => 'DA0011'
        ]);
        DB::table('sub_groups')->insert([
            'bussiness_id'      => '1',
            'group_id'      => '5',
            'name'     => 'Biaya Administrasi',
            'code'     => 'EA001'
        ]);
        DB::table('sub_groups')->insert([
            'bussiness_id'      => '1',
            'group_id'      => '5',
            'name'     => 'Biaya Promosi Kantor',
            'code'     => 'EA0011'
        ]);
    }
}
