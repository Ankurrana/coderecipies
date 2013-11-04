<?php

class Create_Dishes_Table {

	
	public function up()
	{
		Schema::create("dishes",function($table){
			$table->increments("id");
			$table->string("name")->unique();			
			$table->text("data");
			$table->integer("chef_id")->unsigned();
			$table->foreign('chef_id')->references('id')->on('chefs');
			$table->boolean("is_published");
			$table->string("difficulty");
			$table->string("category");
			$table->string("likes")->default(0);
			
			$table->timestamps();
			$table->string("tags",1000);
		});
	}

	
	public function down()
	{
		Schema::drop("dishes");
	}

}