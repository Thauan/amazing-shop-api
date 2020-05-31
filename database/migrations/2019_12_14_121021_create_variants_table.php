<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type')->nullable();
            $table->string('value');
            $table->integer('quantity')->nullable();
            $table->timestamps();
        });

        Schema::table('commodities_brand', function (Blueprint $table) {
            $table->uuid('variants_id')->nullable();
            $table->foreign('variants_id')->references('id')->on('variants')->onDelete('cascade');
            // $table->primary(['variants_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variants');
    }
}
