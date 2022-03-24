<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHazzPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hazz_packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('country_id');
            $table->text('short_description')->nullable();
            $table->longText('package_overview')->nullable();
            $table->longText('itinerary')->nullable();
            $table->longText('hotel_details')->nullable();
            $table->longText('notes')->nullable();
            $table->longText('policy')->nullable();
            $table->longText('rate_and_dates')->nullable();
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
        Schema::dropIfExists('hazz_packages');
    }
}
