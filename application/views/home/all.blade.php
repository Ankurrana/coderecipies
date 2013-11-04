@layout("layouts.default")

@section("content")
	
	
		<input id="asd" type="text" class="input-medium search-query" placeholder="Search"></input>
		
		@if($dishes != null)
		<table class="table table-hover">
		<thead>
		<tr><th>CodeName</th><th>Date</th><th>Chef</th><th>Difficulty</th></tr>
		</thead>
		<tbody id="tbody">
		@foreach($dishes as $dish)

			{{	"<tr><th>".HTML::link_to_route("recipe",$dish->name,array($dish->id))."</th><th>".$dish->created_at."</th><th>".Dish::find($dish->id)->chef->name."</th><th>".$dish->difficulty."</th></tr>"}}

		@endforeach
		</tbody>
		</table>
		@else
			<p class="text-error">Sorry, There are no dishes to show in this category</p>
		@endif


		<script>
			//Perform here the ajax request to load the approprite
				$(document).ready(function(){
					$('#asd').bind('input', function() {
							var k = $("#asd").val();
							$.post("{{ URL::to('table') }}",{ key:k },function(data,status){
								$("#tbody").html(data);
							});
					});
				});	
		</script>
	



@endsection