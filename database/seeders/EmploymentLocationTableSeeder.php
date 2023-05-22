<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentLocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $employment_locations = include __DIR__.'/EmploymentLocationSeeder.php';
        DB::table('employment_locations')->insert($employment_locations);
    }
}
