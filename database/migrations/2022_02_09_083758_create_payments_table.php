<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('period');
            $table->unsignedBigInteger('subscription_id');
            $table->unsignedBigInteger('practitioner_id');
            $table->unsignedBigInteger('application_category_id')->nullable();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->double('amount_invoiced',8,2)->default(0);
            $table->double('amount_paid',8,2)->default(0);
            $table->double('balance',8,2)->default(0);
            $table->unsignedBigInteger('payment_channel_id')->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->unsignedBigInteger('payment_status_id')->nullable();
            $table->string('currency')->nullable();
            $table->string('rate')->nullable();
            $table->timestamp('date_of_payment')->nullable();
            $table->string('proof_of_payment')->nullable();
            $table->string('poll_url')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
