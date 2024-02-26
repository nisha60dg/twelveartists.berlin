jQuery(function($){
	var searchRequest;
	$('.search-autocomplete').on("keyup", function() {
		var searchString = $(this).val();
		// console.log("searchString ", searchString.length);
		if(searchString == '' || searchString.length < 2 ){
			$( ".search_result ul" ).empty();
		}else{
			$(this).autoComplete({
				minChars: 2,	
				source: function(searchString){
					// console.log(searchString);
					try { searchRequest.abort(); } catch(e){}			
					$.ajax({
						url:global.ajax,
						data:{
							search: searchString, 
							action: 'search_crm_results'
						},
						type:'POST',
						dataType:'JSON',
						success:function(res){
							var json = $.parseJSON(res);
							renderSuggesttions(json);
						}
					})
					/*searchRequest = $.post(global.ajax, { search: searchString, action: 'search_crm_results' }, function(res) {
						renderSuggesttions(res);
					});*/
				},
			});
		}
	});
});

function renderSuggesttions( response){
	
	
	if(response.success === true){
		if(response.data != ''){
			console.log(response.data);
			var $div = $( ".search_result ul" ).empty();
			if(response.data.Artworks.length > 0){
				$( "<li/>" ).text( 'Artworks').attr('data-title', 'title').appendTo( $div );
				$.each( response.data.Artworks, function(index,value) {
					console.log("Artworks Working", value);
					$( "<li/>" ).html("<a href="+'/artworks/'+value.artwork_slug.toLowerCase()+">"+ value.artwork_title +'</a>').appendTo( $div );
					
				});
			}
			//var $div = $( ".search_result ul" ).empty();
			if(response.data.Series.length > 0){
				$( "<li/>" ).text( 'Series').attr('data-title', 'title').appendTo( $div );
				$.each(response.data.Series, function(index,value) {
					// console.log("Series Working", value);
					$( "<li/>" ).html("<a href="+'/series/'+ value.artwork_series +">"+ value.artwork_series +" <span>"+value.series_artwork_count+"</span></a>").appendTo( $div );
					
				});
			}
			//var $div = $( ".search_result ul" ).empty();
			if(response.data.Artists.length > 0){
				$( "<li/>" ).text( 'Artists').attr('data-title', 'title').appendTo( $div );
				$.each( response.data.Artists, function(index,value) {
					console.log("Artist Working", value);
					$( "<li/>" ).html("<a href="+'/artists/'+value.artist_slug+">"+ value.artist_name +" <span>"+ value.artist_artwork_count+"</span> </a>").appendTo( $div );
					
				});
			}
		}
	}
}

