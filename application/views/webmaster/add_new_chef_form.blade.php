@layout("layouts.default")
@section("content")
	
		@if($errors->has())
			<ul class="">
				{{$errors->first("name",'<li class="error">:message</li>')}}
				{{$errors->first("username",'<li class="text-error">:message</li>')}}
				{{$errors->first("email",'<li class="text-error">:message</li>')}}
				{{$errors->first("password",'<li class="text-error">:message</li>')}}
			</ul>
		@endif
		
	 	<p>{{  Form::open("iamwebmaster/newchef","POST",array('class'=>"form-horizontal")) }} </p>
	 	<div class="control-group"> 
		 	<p>{{  Form::label("name","Name",array("class"=>"control-label")) . Form::text("name",Input::old("name"),array("class"=>"controls","required"=>"required")) }}</p>
		 	<p>{{  Form::label("username","UserName",array("class"=>"control-label")). Form::text("username",Input::old("username"),array("class"=>"controls","required"=>"required")) }}</p>
		 	<p>{{  Form::label("email","Email",array("class"=>"control-label")).Form::text("email",Input::old("email"),array("class"=>"controls","email"=>"email","required"=>"required")) }}</p>
		 	<p>{{  Form::label("password","Password",array("class"=>"control-label")).Form::password("password",array("class"=>"controls","required"=>"required")) }}</p>
		 	<p>{{  Form::submit("Submit",array("class"=>"btn btn-primary"))}}
		  	<p>{{  Form::close()}}
		</div>
	
@endsection