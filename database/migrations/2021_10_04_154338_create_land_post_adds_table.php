<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandPostAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_post_adds', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('user_id');
            $table->string('type',20)->default('land');
            $table->string('typeOnwer',50);
            $table->string('price',50);
            $table->string('duration',50);
            $table->string('dss',50)->nullable();
            $table->string('dss_due',50)->nullable();
            $table->string('deposit',50);
            $table->string('available_date',50);
            $table->string('staymin',50);
            $table->string('staymax',50);
            $table->string('property_type',50);
            $table->string('occupancy',50)->nullable();
            $table->string('bedroom',50)->nullable();
            $table->string('bathroom',50)->nullable();
            $table->string('latitude',50);
            $table->string('longtitude',50);
            $table->string('bath_toilet',50)->nullable();
            $table->string('furnishing',50)->nullable();
            $table->json('utilities')->nullable();
            $table->string('misc',50)->nullable();
            $table->json('images')->nullable();
            $table->json('property_features')->nullable();
            $table->string('video_link',150)->nullable();
            $table->string('ad_title',50)->nullable();
            $table->longText('ad_desc')->nullable();
            $table->longText('ad_firstname')->nullable();
            $table->string('ad_lastname',50)->nullable();
            $table->string('ad_display',50)->nullable();
            $table->string('ad_email',50)->nullable();
            $table->string('ad_phone',50)->nullable();
            $table->string('ad_hide_phone',50)->nullable();
            $table->string('email_alerts',50)->nullable();
            $table->string('membership',10)->nullable();
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
        Schema::dropIfExists('land_post_adds');
    }
}
