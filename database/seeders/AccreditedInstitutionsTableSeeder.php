<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccreditedInstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cities = include __DIR__.'/AccreditedInstitutionsSeeder.php';
        DB::table('accredited_institutions')->insert($cities);
    }
}
