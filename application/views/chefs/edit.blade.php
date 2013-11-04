@layout("layouts.default")

@section("content")

		<h3>Update Dish {{ $dish->name }} </h3>
		<style>
			textarea{
				width:100%;
			}

		</style>
		<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>

		<script>
        tinymce.init({selector:'textarea',
    theme: "modern",
    height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]});
		</script>
		@if($errors->has())
			<ul>
				{{$errors->first("name",'<li class="error">:message</li>')}}
				{{$errors->first("code",'<li class="text-error">:message</li>')}}
			</ul>
		@endif
	<p>{{Form::open("iamchef/edit","PUT",array("class"=>"form-horizontal"))  }}</p>
			<div class="control-group">
			<p>{{Form::label("name","Name",array("class"=>"control-label")).Form::text("name",$dish->name,array("class"=>"controls","required"=>"required"))}}</p>
			<p>{{Form::label("difficulty","Difficulty",array("class"=>"control-label")).Form::select('difficulty',array('Easy' => 'Easy', 'Medium' => "Medium","Hard"=>"Hard"), $dish->difficulty,array("class"=>"controls"))}}</p>
			<p>{{Form::label("category","Category",array("class"=>"control-label")).Form::select('category',array("algorithm"=>"Algorithm","article"=>"Articles","tricks"=>"Tricks","program"=>"Program","general"=>"General"),$dish->category,array("class"=>"controls"))}}</p>
			<p>{{Form::label("tags","Tags",array("class"=>"control-label")).Form::text('tags',$dish->tags,array("class"=>"controls")) }}</p>
			<p>{{Form::label("article","Article",array("class"=>"control-label")).Form::textarea("data",$dish->data,array("class"=>"controls"))}}</p>
			<p>{{Form::label("publish","Pubish",array("class"=>"control-label")).Form::checkbox("publish","1",true,array("class"=>"controls"))  }}</p>
			<p>{{Form::submit("Submit",array("class"=>"control-submit")) }}</p>
			<p>{{ Form::hidden("id",$dish->id) }}</p>
			<p>{{ Form::close() }}</p>
		</div>
	
@endsection

