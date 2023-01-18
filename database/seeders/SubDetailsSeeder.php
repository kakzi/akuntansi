<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_details')->insert([
            'bussiness_id'      => '1',
            'group_id'      => '1',
            'sub_group_id'      => '1',
            'name'     => 'Kas',
            'code'     => 'AA001001'
        ]);
        DB::table('sub_details')->insert([
            'bussiness_id'      => '1',
            'group_id'      => '1',
            'sub_group_id'      => '1',
            'name'     => 'Kas di Bank',
            'code'     => 'AA001002'
        ]);
    }
}
