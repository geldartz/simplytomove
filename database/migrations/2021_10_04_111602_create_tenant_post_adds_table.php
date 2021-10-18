<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantPostAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_post_adds', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('user_id');
            $table->string('type',20)->default('tenant');
            $table->string('gender',20);
            $table->string('ageone',20)->nullable();
            $table->string('agetwo',20)->nullable();
            $table->string('occupation',100);
            $table->string('staymin',20);
            $table->string('staymax',20);
            $table->string('langauge',100);
            $table->string('nationality',100);
            $table->string('hobby',100)->nullable();
            $table->string('movingdate',20);
            $table->string('price_min',20)->nullable();
            $table->string('price_max',20)->nullable();
            $table->string('price_due',20)->nullable();
            $table->string('deposit',20);
            $table->string('property_type',20);
            $table->string('bed_min',20)->nullable();
            $table->string('bed_max',20)->nullable();
            $table->string('bath_toilet',10)->nullable();
            $table->string('bath_private',10)->nullable();
            $table->string('furnishing',20)->nullable();
            $table->string('misc',50)->nullable();
            $table->json('property_features')->nullable();
            $table->json('latitude',50);
            $table->string('longtitude',50);
            $table->string('ad_title',50)->nullable();
            $table->longText('ad_desc')->nullable();
            $table->string('ad_firstname',100)->nullable();
            $table->string('ad_lastname',100)->nullable();
            $table->string('ad_display',10)->nullable();
            $table->string('ad_email',50)->nullable();
            $table->string('ad_phone',100)->nullable();
            $table->string('ad_hide_phone',10)->nullable();
            $table->string('email_alerts',100)->nullable();
            $table->tinyInteger('membership');
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
        Schema::dropIfExists('tenant_post_adds');
    }
}
