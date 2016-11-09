$(document).ready(function() {

	$(window).resize(
		function(){
			$('.full-width').width($(window).width());
			$('.full-width').css({width: $(window).width(), "position": "relative", "margin-left": ($(window).width()/-2), left: "50%"});
		}
	).trigger('resize');

	if( !$("html").hasClass("ie8") && !$("html").hasClass("ie9")) {
		$(function(){
			/*$('.circlestat').circliful();*/
		});
	}

	var i = 1;
	$('.circle-container').each(function(){
		$(this).addClass('item-'+i);
		i ++;
	});

	var all_circles = $('.circle-container path:nth-of-type(2)');
	var number_of_circles = all_circles.length;
	var colors = ['#ff6b57', '#ff6b57', '#ff6b57', '#ff6b57']

	for (var i = 0; i < number_of_circles; i++) {
		$(all_circles[i]).each(function(){
			$(this).attr('stroke', colors[i]);
		});
	}	
})