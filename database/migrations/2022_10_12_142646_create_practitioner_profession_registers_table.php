<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePractitionerProfessionRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practitioner_profession_registers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('practitioner_profession_id');
            $table->unsignedBigInteger('register_category_id');
            $table->string('registration_number')->nullable();
            $table->boolean('is_active')->default(0);
            $table->string('completion_status')->nullable();
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
        Schema::dropIfExists('practitioner_profession_registers');
    }
}
