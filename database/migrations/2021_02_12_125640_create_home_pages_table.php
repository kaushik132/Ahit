<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('baner1')->nullable();
            $table->string('baner2')->nullable();
            $table->string('baner3')->nullable();
            $table->string('baner1_heading')->nullable();
            $table->string('baner2_heading')->nullable();
            $table->string('baner3_heading')->nullable();
            $table->text('baner1_text')->nullable();
            $table->text('baner2_text')->nullable();
            $table->text('baner3_text')->nullable();
            $table->string('featured_area_heading')->nullable();
            $table->text('featured_area_text')->nullable();
            $table->string('fh1_heading')->nullable();
            $table->text('fh1_text')->nullable();
            $table->string('fh2_heading')->nullable();
            $table->text('fh2_text')->nullable();
            $table->string('fh3_heading')->nullable();
            $table->text('fh3_text')->nullable();
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
        Schema::dropIfExists('home_pages');
    }
}
