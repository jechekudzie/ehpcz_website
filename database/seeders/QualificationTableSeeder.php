<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QualificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $qualifications = include __DIR__.'/QualificationSeeder.php';
        DB::table('qualifications')->insert($qualifications);

    }
}
