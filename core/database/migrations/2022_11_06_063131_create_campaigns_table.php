<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->integer('advertiser_id');
            $table->string('name')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->decimal('daily_budget',11,2);
            $table->string('target_country',90)->nullable();
            $table->string('target_city',90)->nullable();
            $table->string('target_type',90)->nullable();
            $table->string('target_placements')->nullable();
            $table->string('service_sell_buy')->nullable();
            $table->string('keywords')->nullable();
            $table->integer('form_id');
            $table->string('website_url',50)->nullable();
            $table->integer('social_media_page')->nullable();
            $table->boolean('status')->default(0)->nullable()->comment('0: off, 1: active');
            $table->boolean('delivery')->default(0)->nullable()->comment('0: off, 1: active');
            $table->boolean('approve')->default(0)->nullable()->comment('admin approval default 0 { 0: No, 1: Yes }');

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
        Schema::dropIfExists('campaigns');
    }
}
