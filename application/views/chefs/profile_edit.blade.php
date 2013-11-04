@layout("layouts.default");

@section("content")
	@if($errors->has())
			<ul>
				{{$errors->first("name",'<li class="error">:message</li>')}}
				{{$errors->first("username",'<li class="text-error">:message</li>')}}
				{{$errors->first("image",'<li class="text-error">:message</li>')}}
				{{$errors->first("codechef",'<li class="text-error">:message</li>')}}
				
			</ul>
	@endif	
	


	{{ Form::open_for_files("iamchef/profile/edit","POST") }}
	<div class="control-group"> 
		 	{{  Form::label("name","Name",array("class"=>"control-label")) . Form::text("name",$chef->name,array("class"=>"controls","required"=>"required")) }}
		 	{{  Form::label("username","UserName",array("class"=>"control-label")). Form::text("username",$chef->username,array("class"=>"controls","required"=>"required")) }}
		 	{{  Form::label("codechef","Codechef",array("class"=>"control-label")). Form::text("codechef",$chef->codechef,array("class"=>"controls")) }}




		 	{{  Form::label("Profile Photo","Profile Photo",array("class"=>"control-label")). Form::file("image") }}


		 	<p><br>{{  Form::submit("Submit",array("class"=>"btn btn-primary"))}}</p>
		  	{{  Form::close()}}
	</div>
@endsection