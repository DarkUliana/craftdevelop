<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTranslationsToRoadpoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roadpoint_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roadpoint_id')->nullable();
            $table->string('locale')->index();
            $table->string('name');
            $table->timestamps();

        });

        Schema::table('roadpoints', function (Blueprint $table) {

            $table->dropColumn('name');
            $table->dropColumn('number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roadpoint_translations');

        Schema::table('roadpoints', function (Blueprint $table) {

            $table->string('name');
            $table->integer('number');
        });
    }
}
