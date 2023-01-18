<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accountings')->insert([
            'bussiness_id'      => '1',
            'group_id'      => '1',
            'sub_group_id'      => '1',
            'sub_details_id'      => '1',
            'name'     => 'Kas di Tangan',
            'code'     => 'AA00100101'
        ]);
        DB::table('accountings')->insert([
            'bussiness_id'      => '1',
            'group_id'      => '1',
            'sub_group_id'      => '1',
            'sub_details_id'      => '2',
            'name'     => 'Bank BRI',
            'code'     => 'AA00100102'
        ]);
    }
}
