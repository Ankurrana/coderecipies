@layout("layouts.default")



@section("content")
	<style>
	#profile_pic{
		height:200px;
		width:150px;
		border-radius: 10px;
	}
	</style>
	<div class="row">
	<div class="span8">
		<h2>{{ $chef->name }}</h2>
		<h5>{{ "known as ".$chef->username }}</h3>
		<h6>{{ HTML::link($chef->codechef,"codechef") }}</h4>

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

	</div>
	<div class="span4"> 
		{{HTML::image("uploadfiles/chef_image_files/".$chef->img_url,"Alternate text",array("id"=>"profile_pic")) }}
	</div>
	</div>
@endsection