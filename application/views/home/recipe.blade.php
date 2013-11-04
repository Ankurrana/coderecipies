@layout("layouts.default")
@section("content")
		<!-- {{ HTML::script("js/jquery.js") }}  -->
		
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?skin=desert"></script>
	<style>
		.span3{
			height:200px;
			border-radius: 5px;
			padding:10px;
		}
		#chef_img{
			height:50px;
			width: 50px;
			border-radius: 5px;
		}
	</style>
	
	

	
	<h3 style="display:inline;"> {{ $dish->name }} </h3> 		
	{{"by ".HTML::link_to_route("chef_profile_page",$dish->chef->username,array($dish->chef->id))}}
	<div class="btn btn-link" id="like_button"><i class="icon-thumbs-up"></i> <div style='display:inline' id='word-like'>{{ $dish->likes." likes</div> " }} 
	</div>

	{{ HTML::link_to_route("topdf","DownloadPdf",array($dish->id),array("class"=>"pull-right")) }}
	

	<pre>{{ $dish->data }}</pre>
	
	
	
	
					<p><a href="#" class="pull-left" onclick="
					    window.open(
					      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
					      'facebook-share-dialog', 
					      'width=626,height=436'); 
					    return false;"><button class="btn btn-inverse">
					  Share on Facebook
					</button></a></p>



	<div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'codercipe'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>	

		$("#like_button").click(function(){
			$.post("{{ URL::to('recipe/like') }}",{ id:{{ $dish->id}} },function(data,status){
				$("#word-like").html(data +" You like this!");
			});

			
		});
	




    </script>

   
    
@endsection


