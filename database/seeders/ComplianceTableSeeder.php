<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplianceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //fetch from  file and run
        $cities = include __DIR__.'/CompliancesSeeder.php';
        DB::table('compliance_statuses')->insert($cities);
    }
}
