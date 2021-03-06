<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Promos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('email');
            $table->longText('description');
            $table->string('image');
            $table->longText('price');
            $table->string('promoMessage')->nullable();
            $table->boolean('isPremium')->default(false);
            $table->integer('id_section');
            $table->boolean('tag1')->default(false);
            $table->boolean('tag2')->default(false);
            $table->boolean('tag3')->default(false);
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
        Schema::dropIfExists('promos');
    }
}
