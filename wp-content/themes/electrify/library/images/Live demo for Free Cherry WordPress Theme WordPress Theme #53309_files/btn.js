jQuery(document).ready(function($) {
	//btn-from-top, btn-from-bottom, btn-from-left, btn-from-right, btn-from-center-vertical, btn-from-center-horizontal, btn-to-center-vertical, btn-to-center-horizontal, btn-from-center-in-sides, btn-only-text-line-from-left, btn-only-text-two-lines-from-left
	var btn_hover = 'btn-from-top';

	$("a.btn-primary, a.btn-default, .reply a").each(function(){
		var btn_text = $(this).text();
		$(this).addClass(btn_hover).empty().append('<span data-hover="'+btn_text+'">'+btn_text+'</span>');
	});
	$(".reply a").each(function(){
		$(this).addClass('btn');
	});
	$('input[type="submit"], input[type="reset"]').each(function(){
		if(!$(this).hasClass('adminbar-button') && !$(this).hasClass('search-form_is')) {
			$(this).wrap('<span class="input-btn btn '+btn_hover+'"><span></span></span>').removeClass('btn').removeClass('btn-primary');
		};
	});

});
