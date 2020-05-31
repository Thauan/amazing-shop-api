<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignBrandOnCommodities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodities_brand', function (Blueprint $table) {
            $table->uuid('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->uuid('commodity_id')->nullable();
            $table->foreign('commodity_id')->references('id')->on('commodities')->onDelete('cascade');
            // $table->primary(['brand_id', 'commodity_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commodities_brand');
    }
}
