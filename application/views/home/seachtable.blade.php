
	@foreach($dishes as $dish)

		{{	"<tr><th>".HTML::link_to_route("recipe",$dish->name,array($dish->id))."</th><th>".$dish->created_at."</th><th>".Dish::find($dish->id)->chef->name."</th><th>".$dish->difficulty."</th></tr>"}}

	@endforeach	

