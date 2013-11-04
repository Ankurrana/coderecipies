<?php


Route::get("/",array("as"=>"home","uses"=>"home@index"));
Route::get("recipes",array('as'=>"all_recipes","uses"=>"home@all"));
Route::get("iamchef",array("as"=>"chefs_home","uses"=>"chefs@index"));
Route::get("iamwebmaster",array("as"=>"webmasters_home","uses"=>"webmaster@index"));
Route::get("iamwebmaster/newchef",array("as"=>"new_chef","uses"=>"webmaster@add_new_chef_form"));
Route::post("iamwebmaster/newchef",array("uses"=>"webmaster@adding_new_chef"));
Route::get("iamchef/new_recipe",array("before"=>"auth","uses"=>"chefs@new_recipe","as"=>"new_recipe"));
Route::post("iamchef/new_recipe",array("before"=>"auth","uses"=>"chefs@new_recipe","as"=>"new_recipe"));
Route::get("iamchef/login",array("uses"=>"chefs@login","as"=>"chef_login"));
Route::post("iamchef/login",array("uses"=>"chefs@login"));
Route::get("iamchef/logout",array("uses"=>"chefs@logout","as"=>"logout"));
Route::get("recipe/(:any)",array("uses"=>"home@recipe","as"=>"recipe"));
Route::get("iamchef/edit/(:any)",array("uses"=>"chefs@edit","as"=>"recipe_edit"));
Route::put("iamchef/edit",array("uses"=>"chefs@edit"));
Route::get("iamchef/profile/edit",array("uses"=>"chefs@profile_edit","as"=>"profile_edit"));
Route::post("iamchef/profile/edit",array("uses"=>"chefs@profile_edit"));
Route::get("chef/(:any)",array("uses"=>"home@chef","as"=>"chef_profile_page"));
Route::get("recipe/(:any)/pdf",array("uses"=>"home@converttopdf","as"=>"topdf"));
Route::get("recipes/category/(:any)",array("uses"=>"home@category","as"=>"category_recipes"));
Route::get("recipes/chef/(:any)",array("uses"=>"home@chefs_dishes","as"=>"chef_recipes"));
Route::get("recipes/difficulty/(:any)",array("uses"=>"home@difficulty","as"=>"difficulty"));
Route::get("chefs",array("uses"=>"home@all_chefs","as"=>"all_chefs"));
Route::get("iamwebmaster/allchefs",array("uses"=>"webmaster@all_chefs","as"=>"webmaster_all_chefs"));

Route::post("table",function(){
	$dishes = Dish::where("tags","like","%".Input::get("key")."%")->where("is_published","=",1)->get();

	foreach($dishes as $dish)
		echo "<tr><th>".HTML::link_to_route("recipe",$dish->name,array($dish->id))."</th><th>".$dish->created_at."</th><th>".Dish::find($dish->id)->chef->name."</th><th>".$dish->difficulty."</th></tr>";

});

 


Route::post("recipe/like",function(){
	if(isset($_COOKIE["like".Input::get("id")])){
		echo Dish::find(Input::get("id"))->likes;
	}else{
		$l = Dish::find(Input::get("id"))->likes;
		Dish::update(Input::get("id"),array(
					"likes"=>$l+1
		));

		Cookie::put("like".Input::get("id"),true,600);

		echo Dish::find(Input::get("id"))->likes;
	}
});


Route::get("channel",function(){
	echo "<script src='//connect.facebook.net/en_US/all.js'></script>";
});



/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to_route('chef_login');
});