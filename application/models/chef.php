<?php
	class Chef extends Eloquent{
			public static $table = "chefs";

			public static $rules = array(
				"name"=>"required|max:200",
				"email"=>"required|email|unique:chefs",
				"username"=>"required|unique:chefs",
				"password"=>"required"
				);

			public static $edit_rules = array(
				"name"=>"required|max:200",
				"username"=>"required",
				"image"=>"mimes:jpg,png"

				);

			public static function validate($data){
				return Validator::make($data,static::$rules);
			}

			public static function edit_validate($data){
				return Validator::make($data,static::$edit_rules);
			}

			public function dishes(){
				return $this->has_many("Dish"); 
			}
	}