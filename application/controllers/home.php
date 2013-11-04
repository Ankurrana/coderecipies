<?php

class Home_Controller extends Base_Controller {

	public $restful = true;

	public function get_index(){

		// return View::make('home.index')->with("title","CodeRecipe|Home");
		return Redirect::to_route("all_recipes");
	}

	public function get_recipe($id){
		

		$dish = Dish::find($id);
		if( $dish != null && $dish->is_published == 1)
			return View::make("home.recipe")->with("dish",$dish)->with("title","CodeRecipe|".$dish->name);
		else
			return View::make("error.404");
	}

	public function get_all(){
		

		$dishes = Dish::where("is_published","!=",0)->get();
		return View::make('home.all')->with("dishes",$dishes)->with("title","CodeRecipe|AllRecipies");
	}

	public function get_chef($id){
		 $chef = Chef::find($id);

		$dishes =  Dish::where("chef_id","=",$id)->get();

		if($chef != null){
			return View::make("chefs.profile")->with("chef",$chef)->with("dishes",$dishes)->with("title","CodeRecipe|".$chef->name);
		}
		return View::make("error.404");
	}

	public function get_converttopdf($id){
		$dish = Dish::find($id);
		// $pdf = new Fpdf();
		// $pdf->AddPage();
		// $pdf->SetFont('Arial','B',20);
		// $pdf->Cell(80);
		// $pdf->Cell(0,5,$dish->name);
		// $pdf->ln(10);
		// $pdf->SetFont('Arial','',12);
		// $pdf->MultiCell(0,5,HTML::entities($dish->data));
		// $pdf->Output($dish->name.".pdf","D");

		try{
			$html2pdf = new HTML2PDF("p","A4","fr");
			// $html2pdf->Cell(80);
			// $html2pdf->Cell(0,5,$dish->name);
			$html2pdf->WriteHTML("<h5 style='color:lightblue'>".$dish->name." by <i>".$dish->chef->name."</i><br></h5>".$dish->data);
	    	$html2pdf->Output($dish->name.".pdf","D");
    	}
    	catch(Exception $e){
    		echo "Could not convert! Sorry for Inconvinience";
    		// return Response::error('pdferror');
    	}
		
	}

	public function get_chefs_dishes($id){
		$dishes = Dish::where("chef_id","=",$id)->get();
		return View::make('home.all')->with("dishes",$dishes)->with("title","CodeRecipe");
	}	

	public function get_category($category){
		$dishes = Dish::where("category","=",$category)->get();
		return View::make('home.all')->with("dishes",$dishes);

	}

	public function get_difficulty($difficulty){
		$dishes = Dish::where("difficulty","=",$difficulty)->get();
		return View::make('home.all')->with("dishes",$dishes);
	}

	public function post_search(){
		// echo "asdada";
		$dishes = Dish::where("name","=",Input::get("key"));
		return View::make("home.seachtable")->with("dishes",$dishes);
	}

	public function get_all_chefs(){
		$chefs = chef::all();
		return View::make("home.allchefs")->with("chefs",$chefs);
	}



}