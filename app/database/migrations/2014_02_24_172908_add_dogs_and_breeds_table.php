<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDogsAndBreedsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dogs', function($table){
            $table->increments('id'); // increments() creates an auto incrementing Int Primary Key
            $table->string('name'); // string() creates a varchar data type
            $table->date('date_of_birth');
            $table->integer('breed_id')->nullable(); // nullable() means it can have null values
            $table->timestamps(); // timestamps() creates created_at and updated_at DATETIME fields
        });
        Schema::create('breeds', function($table){
            $table->increments('id');
            $table->string('name');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dogs');
        Schema::drop('breeds');
	}

}
