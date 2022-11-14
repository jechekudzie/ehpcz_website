<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequirementsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $requirement_categories = include __DIR__.'/RequirementsCategoriesSeeder.php';
        DB::table('requirement_categories')->insert($requirement_categories);

    }
}
