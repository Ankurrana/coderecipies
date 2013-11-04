<?php
	class Webmaster_Controller extends Base_Controller{
		public $restful  = true; 

		public function get_index(){
			return View::make("webmaster.home");
		}

		public function get_add_new_chef_form(){
			return View::make("webmaster.add_new_chef_form");
		}

		public function post_adding_new_chef(){

			$validation = Chef::validate(Input::all());

			if($validation->fails()){
					return Redirect::to_route("new_chef")->with_errors($validation)->with_input();
			}


			Chef::create(array(
					"name" => Input::get("name"),
					"username" => Input::get("username"),
					"email" => Input::get("email"),
					"password" => Hash::make(Input::get("password")),
					"created_at"=>date("Y-m-d H:i:s"),
					"updated_at"=>date("Y-m-d H:i:s")
				));

			
			return Redirect::to_route("webmasters_home");
		}

		public function get_all_chefs(){
			$chefs = chef::all();
			return View::make("webmaster.all_chefs")->with("chefs",$chefs)->with("title","CodeRecipe|AllChefs");
		}
	}

?>