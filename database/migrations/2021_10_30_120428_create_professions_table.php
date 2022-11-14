<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProfessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('expiry')->nullable();
            $table->string('plural')->nullable();
            $table->string('description')->nullable();
            $table->string('professional_prefix')->nullable();
            $table->string('student_prefix')->nullable();
            $table->string('last_practitioner_number')->nullable();
            $table->string('last_student_number')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE professions CHANGE last_practitioner_number last_practitioner_number INT(4) UNSIGNED ZEROFILL');
        DB::statement('ALTER TABLE professions CHANGE last_student_number last_student_number INT(4) UNSIGNED ZEROFILL');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professions');
    }
}
