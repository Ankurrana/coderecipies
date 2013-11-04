@layout("layouts.default")
@section("content")
	<table class="table table-hover">
		<thead>
		<tr><th>Name</th><th>username</th><th>Codechef</th></tr>
		</thead>
		<tbody id="tbody">
		@foreach($chefs as $chef)

			{{	"<tr><th>".HTML::link_to_route("chef_profile_page",$chef->name,array($chef->id))."</th><th>".$chef->username."</th><th>".HTML::link($chef->codechef,"codechef")."</tr>"}}

		@endforeach
		</tbody>
</table>
@endsection