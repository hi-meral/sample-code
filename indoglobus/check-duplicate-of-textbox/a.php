<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type='text/javascript' src='//code.jquery.com/ui/1.12.1/jquery-ui.js?ver=4.6.3'></script>
<input type="text" name="a" id="a" class="c" value="1" />
<input type="text" name="b" id="b" class="c" value="2" />
<input type="text" name="x" id="x" class="c" value="5" />
<input type="text" name="y" id="y" class="c" value="5" />
<input type="button" name="d" id="d" value="Hit" />

<script>

$(document).ready(function(){
	
	$('#d').click(function(){

			
			var total_csid = $( ".c" ).map(function() { return $( this ).val(); }).get();
			
			
			total_csid_size = Object.keys(total_csid).length;
			
			var unique_csid_size = jQuery.unique( total_csid );
			
			unique_csid = Object.keys(unique_csid_size).length;
			
			if(total_csid_size==unique_csid)
			{
				alert('unique');
			}
			else
			{
				alert('duplicate');
			}
			
			
			
	})
	
});


</script>



