
<table class="table table-hover">
	<thead>
	<tr><th>CodeName</th><th>Date</th><th>Chef</th><th>Difficulty</th></tr>
	</thead>
	<tbody>
	@foreach($dishes as $dish)

		{{	"<tr><th>".HTML::link_to_route("recipe",$dish->name,array($dish->id))."</th><th>".$dish->created_at."</th><th>".Dish::find($dish->id)->chef->name."</th><th>".$dish->difficulty."</th></tr>"}}

	@endforeach
	</tbody>
</table>
