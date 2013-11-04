<?php
class Chefs_Controller extends Base_Controller{
	public $restful = true;
	
	public function get_index(){
		if(Auth::check()){
			$dishes = Chef::find(Auth::user()->id)->dishes;
			return View::make("chefs.home")->with("dishes",$dishes);
		}
		else
			return Redirect::to_route("chef_login");		
	}

	public function get_login(){
		if(Auth::check()){
			return Redirect::to_route("chefs_home");
		}
		else{
			return View::make("chefs.loginpage");
		}
	}

	public function get_new_recipe(){
		return View::make("chefs.new_recipe");
	}

	public function post_new_recipe(){

		$validation = Dish::validate(Input::all());

		if($validation->fails())
			return Redirect::to_route("new_recipe")->with_errors($validation)->with_input();

		Dish::create(array(
				"name"=>Input::get("name"),			
				"data"=>Input::get("data"),
				// "data"=>$_POST["data"],
				"difficulty"=>Input::get("difficulty"),
				"created_at"=>date("Y-m-d H:i:s"),
				"updated_at"=>date("Y-m-d H:i:s"),
				"chef_id"=>Auth::user()->id,
				"is_published"=>Input::has("publish")?1:0,
				"category"=>Input::get("category"),
				"tags"=>Input::get("tags")

			)); 

		return Redirect::to_route("chefs_home");

	}

	public function post_login(){
		$credentials = array(
			'username' => Input::get("email"), 
			'password' => Input::get("password")
			);

		if (Auth::attempt($credentials)){
		     return Redirect::to_route("chefs_home");
		}
		else{
			return Redirect::to_route("chef_login");
		}


	}


	public function get_logout(){
		Auth::logout();
		return Redirect::to_route("chefs_home");  //Change it to the home page of the site
	}

	public function get_edit($id){
		$dish = Dish::find($id);
		
		if($dish!=null && $dish->chef_id == Auth::user()->id )
			return View::make("chefs.edit")->with("dish",$dish);
		echo "You are not eligible to change this post";
	}


	public function get_profile_edit(){

		return View::make("chefs.profile_edit")->with("chef",Auth::user());
	}

	public function post_profile_edit(){

		$validation = Chef::edit_validate(Input::all());

		if($validation->fails()){
				return Redirect::to_route("profile_edit")->with_errors($validation);
		}

		
		if(  Input::file("image.name") != null ){
			$img = Input::file("image");
			Input::upload("image","public/uploadfiles/chef_image_files",Auth::user()->id.".".File::extension($img["name"]));
			Chef::update(Auth::user()->id,array(
				"img_url"=> Auth::user()->id.".".File::extension($img["name"])
			));

		}

		Chef::update(Auth::user()->id,array(
				"name"=>Input::get("name"),
				"username"=>Input::get("username"),
				"codechef"=>Input::get("codechef"),
			));

		return Redirect::to_route("chefs_home");
	}

	public function put_edit(){
		
		$validation = Dish::validate_edit(Input::all());
		if($validation->fails())
			return Redirect::to_route("recipe_edit",Input::get("id"))->with_errors($validation)->with_input();

		Dish::update(Input::get("id"),array(
				"name"=>Input::get("name"),			
				"data"=>Input::get("data"),
				"difficulty"=>Input::get("difficulty"),
				"updated_at"=>date("Y-m-d H:i:s"),
				"is_published"=>Input::has("publish")?1:0,
				"category"=>Input::get("category"),
				"tags"=>Input::get("tags")

			));

		return Redirect::to_route("chefs_home");

	}
}


?>