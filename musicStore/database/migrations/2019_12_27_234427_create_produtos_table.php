<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('p_id');
            $table->string('p_name');
            $table->integer('cat_id');
            $table->integer('m_id');
            $table->longText('p_short_description');
            $table->longText('p_long_description');
            $table->float('p_price');
            $table->string('p_image');
            $table->string('p_size');
            $table->string('p_color');
            $table->integer('publication_status');
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
        Schema::dropIfExists('produtos');
    }
}
