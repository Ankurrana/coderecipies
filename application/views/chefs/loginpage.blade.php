@layout("layouts.default")

@section('content')
	<h2>Chef Login Page</h2>
	
<!-- 	<?php
		// echo Form::open("iamchef/login","POST",array("class"=>"form-horizontal"));
		// echo "<div class='control-group'>";
		// echo "Email :".Form::text("email","",array("class"=>""))."<br>";
		// echo "Password :".Form::password("password")."<br>";
		// echo Form::submit("Login")."<br>";
		// echo Form::close();
	?> -->



	{{ Form::open("iamchef/login","POST",array("class"=>"form-horizontal")) }}
	<div class="control-group">
	<p>{{  Form::label("email","email",array("class"=>"control-label")).Form::text("email","",array("class"=>"controls")) }}</p>
	<p>{{  Form::label("password","password",array("class"=>"control-label")).Form::password("password",array("class"=>"controls"))}}</p>
	<p>{{  Form::submit("Submit") }}
	{{  Form::close() }}
	</div>

@endsection

