<?php

class Create_Chefs_Table {

public function up()
	{
		Schema::create("chefs",function($table){
			$table->increments("id");
			$table->string("name");
			$table->string("username");
			$table->string("email");
			$table->string('password');
			$table->string("codechef");
			$table->string("img_url");
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("chefs");
	}

}