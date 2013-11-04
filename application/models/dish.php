<?php
class Dish extends Eloquent{
	public static $table = "dishes"; 

	public function chef(){
		return $this->belongs_to("chef");
	} 


	public static $rules = array(
			"name"=>"required|unique:dishes",
			"data"=>"required",
			"tags"=>"required"

		);
	public static $ruless = array(
			"name"=>"required",
			"data"=>"required",

		);

	public static function validate($data){
		return Validator::make($data,static::$rules);
	}
	public static function validate_edit($data){
		return Validator::make($data,static::$ruless);
	}
}                                                                             