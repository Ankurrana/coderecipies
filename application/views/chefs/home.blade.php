@layout("layouts.default")

@section("content")

	<table class="table table-hover">
	<thead>
	<tr><th>CodeName</th><th>Date</th><th>Is_Published</th><th>Edit</th></tr>
	</thead>
	<tbody>
	@foreach($dishes as $dish)
			<?php 
			if($dish->is_published == 1)
				$p = "YES";
			else
				$p = "NO"; 
			?>

		{{	"<tr><th>".HTML::link_to_route("recipe",$dish->name,array($dish->id))."</th><th>".$dish->created_at."</th><th>".$p."</th><th>".HTML::link_to_route("recipe_edit","Edit",array($dish->id))."</th></tr>"}}

	@endforeach
	</tbody>
	</table>

@endsection


