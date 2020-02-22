<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVariantTypesForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variant_type', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('reference_code');
            $table->timestamps();
        });

        Schema::table('variants', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->uuid('type_id')->after('id');
            $table->foreign('type_id')->references('id')->on('variant_type');
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
