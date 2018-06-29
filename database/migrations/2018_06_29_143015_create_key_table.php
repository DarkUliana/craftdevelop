<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateKeyTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('key', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();
            $table->timestamps();
        });
        Schema::create('key_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('key_id');
            $table->string('locale')->index();
            $table->string('name');
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
        Schema::dropIfExists('key');
        Schema::dropIfExists('key_translations');
    }

}