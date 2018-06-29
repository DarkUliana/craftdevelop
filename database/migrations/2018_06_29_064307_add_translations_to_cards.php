<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTranslationsToCards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roadcard_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roadcard_id')->nullable();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('text');
            $table->timestamps();
        });

        Schema::table('roadcards', function (Blueprint $table) {

            $table->dropColumn('title');
            $table->dropColumn('text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roadcard_translations');

        Schema::table('roadcards', function (Blueprint $table) {

            $table->string('title');
            $table->text('text');
        });
    }
}
