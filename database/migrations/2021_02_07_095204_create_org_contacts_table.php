<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('country_id');
            $table->text('short_description')->nullable();
            $table->longText('details');
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
        Schema::dropIfExists('org_contacts');
    }
}
