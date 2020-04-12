$(document).ready(function(){

	/*
	Tables
	*/
	
	// Stripe
	$('table tbody tr:odd').addClass('odd');
	$('table tbody tr:even').addClass('even');
	// Hover Table Rows
	$('table tbody tr').hover(function(){$(this).addClass('hover');},function(){$(this).removeClass('hover');});
	
	
	/*
	Confirm delete
	*/
	$('a.confirm_delete').click(function(){
		var answer = confirm('Delete this Item?');
		return answer;
	});
	
	
	/*
	Forms
	*/

	$('form :input').focus(function(){
		// ignore input buttons
		if($(this).attr('type')!='submit') {
			// add focus class
			$(this).parent().addClass('focus');
		}
	});
	$('form :input').blur(function(){
		// remove focus class
		$(this).parent().removeClass('focus');
	});
	
	// add another file input
	$('a.jsAddFile').click(function(){
		// get html
		var html = $(this).parent().html();
		// add
		$('.file:last').after('<div class="input file">'+html+'</div>');
		$('.file:last a').hide();
	return false;
	});


});