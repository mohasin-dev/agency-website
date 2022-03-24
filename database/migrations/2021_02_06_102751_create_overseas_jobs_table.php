<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOverseasJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overseas_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->unsignedBigInteger('country_id');
            $table->string('company_name');
            $table->string('trade');
            $table->string('visa_type');
            $table->date('deadline');
            $table->string('working_hour');
            $table->string('contact_duration');
            $table->string('salary');
            $table->longText('details')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('featured_image');
            $table->boolean('status')->default(true);

            $table->foreign('country_id')->references('id')->on('countries');
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
        Schema::dropIfExists('overseas_jobs');
    }
}
