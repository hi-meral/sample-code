$(document).ready(function(){
	// Stripe
	$('table tbody tr:odd').addClass('odd');
	$('table tbody tr:even').addClass('even');
	// Hover Table Rows
	$('table tbody tr').hover(function(){$(this).addClass('hover');},function(){$(this).removeClass('hover');});

	// add click handler to vote
	vote();

});

// assigns click handler
function vote() {
	// hide
	$('.hide').hide();

	// show/hide contender details
	$('.item').hover(
		function(){
			// get height of item
			var height = $(this).height();
			// set the height of the contender box
			// fixes a bug that displays empty space below the item
			$(this).parent().css({height:height+"px"});
			// set the opacity to 0
			$(this).find('.info').css({opacity:"0"});
			// animate the opacity to 80%
			$(this).find('.info').animate({opacity:"0.8"}).show();
		},
		function(){
			// get info
			var info = $(this).find('.info');
			// animate the opacity to 0 and hide div when done
			info.animate({opacity:"0"},500,null,function(){info.hide();});
		}
	);

	// add click handler to vote
	$('.vote').click(function(){
		// get url
		var url = $(this).attr('href');
		// load ajax loader
		add_ajax_loader('.ajax_loader');

		// do ajax call
		$.ajax({
			type: "POST",
			url: url,
			data: "ajax=true",
			success: function(msg){
				// reload with a new battle
				$('.contenders').html(msg);
				// remove ajax loader
				remove_ajax_loader('.ajax_loader');
				// re-add click handler to vote
				vote();
			}
		});
	return false;
	});					  
}

// add ajax loader
function add_ajax_loader(div) {
	$(div).html('<img src="./img/ajax-loader.gif" alt="Ajax Image Loader" />');
}

// remove ajax loader
function remove_ajax_loader(div) {
	$(div).html('');
}