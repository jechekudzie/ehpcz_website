<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePractitionerApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practitioner_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('practitioner_id');
            $table->unsignedBigInteger('application_category_id')->nullable();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->string('reference')->nullable();
            $table->string('year');
            $table->double('amount_invoiced',8,2)->default(0);

            $table->unsignedBigInteger('application_status_id')->default(1);

            $table->integer('reception')->default(0);
            $table->integer('admin')->default(0);
            $table->integer('accounts')->default(0);
            $table->integer('registrar')->default(0);
            $table->integer('committee')->default(0);
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
        Schema::dropIfExists('practitioner_applications');
    }
}
