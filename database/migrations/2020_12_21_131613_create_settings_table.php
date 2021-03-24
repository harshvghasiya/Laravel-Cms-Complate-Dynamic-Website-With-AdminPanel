<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('first_email');
            $table->string('second_email');
            $table->string('first_mobile');
            $table->string('second_mobile');
            $table->string('web_url');
            $table->string('author_name');

            $table->text('author_decription_footer');
            $table->text('author_decription_sidebar');
            $table->text('address');

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
        Schema::dropIfExists('settings');
    }
}
