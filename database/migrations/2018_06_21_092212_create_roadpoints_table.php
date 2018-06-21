<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateRoadPointsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('roadpoints',function(Blueprint $table){
            $table->increments("id");
            $table->string("name");
            $table->date("date");
            $table->integer("number");
            $table->integer("tag_id");
            $table->tinyInteger("done")->default(0);
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
        Schema::drop('roadpoints');
    }

}