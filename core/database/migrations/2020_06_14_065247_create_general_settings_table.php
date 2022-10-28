<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('sitename',50)->nullable();
            $table->string('cur_text',20)->nullable()->comment('currency text');
            $table->string('cur_sym',20)->nullable()->comment('currency symbol');
            $table->string('email_from')->nullable();
            $table->text('email_template')->nullable();
            $table->string('sms_api')->nullable();
            $table->string('base_color',10)->nullable();
            $table->string('secondary_color',10)->nullable();

            $table->text('mail_config')->nullable()->comment('email configuration');
            $table->boolean('ev')->default(0)->comment('email verification, 0 - dont check, 1 - check');
            $table->boolean('en')->default(0)->comment('email notification, 0 - dont send, 1 - send');

            $table->boolean('sv')->default(0)->comment('sms verication, 0 - dont check, 1 - check');
            $table->boolean('sn')->default(0)->comment('sms notification, 0 - dont send, 1 - send');

            $table->boolean('registration')->default(0)->comment('0: Off	, 1: On');

            $table->boolean('social_login')->default(0)->comment('social login');

            $table->text('social_credential')->nullable();
            $table->string('active_template',50)->nullable();
            $table->text('sys_version')->nullable();

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
        Schema::dropIfExists('general_settings');
    }
}
