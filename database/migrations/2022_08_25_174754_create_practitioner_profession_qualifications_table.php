<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePractitionerProfessionQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practitioner_profession_qualifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('practitioner_profession_id');
            $table->unsignedBigInteger('qualification_category_id')->nullable();
            $table->unsignedBigInteger('register_category_id')->nullable();
            $table->unsignedBigInteger('qualification_id')->nullable();
            $table->unsignedBigInteger('accredited_institution_id')->nullable();

            $table->string('qualification_name')->nullable();
            $table->string('institution_name')->nullable();

            $table->string('commencement_date')->nullable();
            $table->string('completion_date')->nullable();
            $table->unsignedBigInteger('application_status_id')->default(1);
            $table->integer('recept ion')->default(0);
            $table->integer('admin')->default(0);
            $table->integer('accounts')->default(0);
            $table->integer('registrar')->default(0);
            $table->integer('committee')->default(0);
            $table->boolean('is_primary')->default(0);
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
        Schema::dropIfExists('practitioner_profession_qualifications');
    }
}
