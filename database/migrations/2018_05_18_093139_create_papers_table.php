<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreatePapersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('papers',function(Blueprint $table){
            $table->increments('id');
            $table->integer('tag_id')->references('id')->on('tag');
            $table->date('date')->nullable();
            $table->integer('views')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('paper_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('paper_id');
            $table->string('title');
            $table->text('text_preview')->nullable();
            $table->text('text')->nullable();
            $table->string('locale')->index();

            $table->unique(['paper_id','locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('papers');
        Schema::drop('paper_translations');
    }

}