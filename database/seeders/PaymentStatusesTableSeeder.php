<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $payment_statuses = include __DIR__.'/PaymentStatusesSeeder.php';
        DB::table('payment_statuses')->insert($payment_statuses);
    }
}
