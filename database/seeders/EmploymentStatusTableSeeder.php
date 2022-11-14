<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $employment_statuses = include __DIR__.'/EmploymentStatusSeeder.php';
        DB::table('employment_statuses')->insert($employment_statuses);
    }
}
