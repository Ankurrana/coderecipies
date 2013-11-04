<!DOCTYPE html>
<html>
<head>
	<?php 
		if(!isset($title))
			$title = "CodeRecipe";
	?>
	<title> {{ $title }} </title>
	<style>

	@font-face {
		font-family: myFirstFont;
		src: url({{ URL::to('fonts/villa.ttf') }});
	}
		body,html{
			background-color: #E8F6FF;
			height: 100%;
		}

		#header{
			height:100px;
			width: 99% ;
			border-radius: 5px;
			margin: 10px;



		}

		.coderecipe {
		    font-family: myFirstFont,'Lobster', Georgia, Times, serif;
		    font-size: 40px;
		    line-height: 100px;
		    position: relative;
		    
		    word-spacing: 1px;

		}
		.logo{
			margin: auto;
			position: relative;	
			color:red;
			word-spacing: -3px;
			letter-spacing: -6px;
		}
		.logo:hover, .logo:visited, .logo:link, .logo:active{
			text-decoration: none !important;
		}

		#r{	color: green;}
		#d{	color: #009933;}
		#e{	color: #cf0404;}
		#c{	color: #3366FF;}
		#i{	color: #248F24;}
		#p{	color: #666633;}
		#o{	color: #E62E00;}

	
		footer{
			position:relative;
			bottom: 0px;			
		}
	
    


	</style>
	
</head>
	<?php echo HTML::script('bootstrap/js/bootstrap.min.js'); ?>
	<?php echo HTML::style('bootstrap/css/bootstrap.min.css'); ?>
	
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<body style="background-color: #E8F6FF; ">

	<!-- FACEBOOK LOGIN API   -->


	<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '374259276039971', // App ID
    channelUrl : '//http://localhost/coderecipe/public/channel', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
  // for any authentication related change, such as login, logout or session refresh. This means that
  // whenever someone who was previously logged out tries to log in again, the correct case below 
  // will be handled. 
  FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs. 
    if (response.status === 'connected') {
      // The response object is returned with a status field that lets the app know the current
      // login status of the person. In this case, we're handling the situation where they 
      // have logged in to the app.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // In this case, the person is logged into Facebook, but not into the app, so we call
      // FB.login() to prompt them to do so. 
      // In real-life usage, you wouldn't want to immediately prompt someone to login 
      // like this, for two reasons:
      // (1) JavaScript created popup windows are blocked by most browsers unless they 
      // result from direct interaction from people using the app (such as a mouse click)
      // (2) it is a bad experience to be continually prompted to login upon page load.
      FB.login();
    } else {
      // In this case, the person is not logged into Facebook, so we call the login() 
      // function to prompt them to do so. Note that at this stage there is no indication
      // of whether they are logged into the app. If they aren't then they'll see the Login
      // dialog right after they log in to Facebook. 
      // The same caveats as above apply to the FB.login() call here.
      FB.login();
    }
  });
  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Good to see you, ' + response.name + '.');
    });
  }
</script>



	<!-- FACEBOOK LOGIN END -->
			<div class="wrapper">
			<div id="header">
			<div class="container">
			<div class="logo">

				<span class="coderecipe">
				<a href="{{ URL::to('recipes') }}">
				<span id="c">C</span>
				<span id="o">o</span>
				<span id="d">d</span>
				<span id="e">e</span>
				<span id="r">R</span>
				<span id="e">e</span>
				<span id="c">c</span>
				<span id="i">i</span>
				<span id="p">p</span>
				<span id="e">e</span>
				</span>
				</a>
				<div class="pull-right"><fb:login-button show-faces="true" width="300" max-rows="1"></fb:login-button></div>


			</div>
			@if(Auth::check())
				{{ "Welcome , ". HTML::link_to_route("chefs_home",Auth::user()->username) }}
			@endif

			<ul class="nav nav-pills">
				<div class="navbar">
				  <div class="navbar-inner">
				    <a class="brand" href="{{ URL::to_route('all_recipes') }}">HOME</a>
				    <ul class="nav">
					<li>{{ HTML::link_to_route("difficulty","Difficulty") }}</li>
			        <li><a href="#">Home</a></li>
			        <li></li>

			        @if(Auth::check())
					<li>{{ HTML::link_to_route("chef_profile_page","Profile",array(Auth::user()->id)) }}</li>
					<li>{{ HTML::link_to_route("new_recipe","NewRecipe") }}</li>
					<li>{{ HTML::link_to_route("profile_edit","Edit Profile")}}</li>
					<li>{{ HTML::link_to_route('logout',"logout") }}</li>
					@endif
				    </ul>
				  </div>
				</div>			
			</ul>
			<div class="row">
			<div class="span9">
				@yield("content")
			</div>
			<div class="span2">
				@render("layouts.leftsidebar")
			</div>
			</div>
			</div>


			<footer>

				<div id="footer">
		      <div class="container">
				<div class="fb-like" data-href="https://www.facebook.com/coderecipecomingsoon" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="false" data-send="false"></div>

		        <p class="muted credit">&copy; CodeRecipe by Ankur rana</p>

		      </div>
		    </div>

			</footer>


			</div>

			
		</div>


		</div>
		<script>
 				
		</script>

</body>
</html>


