<?php namespace Fencus\OurTeam\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateAgentsTable extends Migration
{

    public function up()
    {
        Schema::create('fencus_ourteam_agents', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('email')->nullable();
            $table->string('position')->nullable();
            $table->text('description_short')->nullable();
            $table->text('description')->nullable();
            $table->boolean('public')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fencus_ourteam_agents');
    }

}
