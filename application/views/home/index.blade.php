<!DOCTYPE html>
<html>
<head>
	<title> This is the Title </title>
</head>
	<?php echo HTML::script('bootstrap/js/bootstrap.min.js'); ?>
	<?php echo HTML::style('bootstrap/css/bootstrap.min.css'); ?>
	

<body>
		

	<style>

		@font-face {
			font-family: myFirstFont;
			src: url({{ URL::to('fonts/villa.ttf') }});
		}


		h1 {
		    font-family: myFirstFont,'Lobster', Georgia, Times, serif;
		    font-size: 50px;
		    line-height: 100px;
		    position: relative;
		    left:20px;
		    word-spacing: 1px;

		}
		.logo{
			margin: auto;
			position: relative;
			left:50px;
			top:400px;
			color:red;
			word-spacing: -3px;
			letter-spacing: -6px;
		}

		#o{	color: green;}
		#d{	color: #00CCFF;}
		#r{	color: #E62E00;}
		#c{	color: #3366FF;}
		#i{	color: #248F24;}
		#p{	color: #99CC00;}
		#e{	color: #CCCC00;}		 
		
	</style>
		<div class="container">
		<div class="logo">
			<h1>
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

			</h1>
			<form class="form-search"> 
			  <div class="input-prepend">
			    <button type="submit" class="btn btn-primary">Search</button>
			    <input type="text" class="span5 search-query">
			  </div>
			</form>
		</div>
		</div>

</body>
</html>