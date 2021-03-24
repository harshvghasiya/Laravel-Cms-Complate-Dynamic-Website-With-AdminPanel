<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('secondary_title');
            $table->string('display_on_header');
            $table->string('display_on_footer');
            $table->string('status');
            $table->string('image');

            $table->string('seo_title');
            $table->string('seo_keyword');
            $table->longText('seo_description');
            $table->Text('short_description');
            $table->longText('long_description');
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
        Schema::dropIfExists('cms');
    }
}
