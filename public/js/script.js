$(document).ready(function() {
	$('#menu1').mouseenter(function() {
		$('#sousMenu1').show();
	});
	$('#menu1').mouseleave(function() {
		$('#sousMenu1').hide();
	});


	$('#menu2').mouseenter(function() {
		$('#sousMenu2').show();
	});
	$('#menu2').mouseleave(function() {
		$('#sousMenu2').hide();
	});


	$('#menu3').mouseenter(function() {
		$('#sousMenu3').show();
	});
	$('#menu3').mouseleave(function() {
		$('#sousMenu3').hide();
	});


	$('#menu4').mouseenter(function() {
		$('#sousMenu4').show();
	});
	$('#menu4').mouseleave(function() {
		$('#sousMenu4').hide();
	});


	$('#menu5').mouseenter(function() {
		$('#sousMenu5').show();
	});
	$('#menu5').mouseleave(function() {
		$('#sousMenu5').hide();
	});


	$('#menu6').mouseenter(function() {
		$('#sousMenu6').show();
	});
	$('#menu6').mouseleave(function() {
		$('#sousMenu6').hide();
	});




	/*$(window).scroll(function() {
		if ($(window).scrollTop()<50) {
			$('#btn_up').fadeOut();
		} else {
			$('#btn_up').fadeIn();
		}
	});*/

	/*$('#btn_up').click(function() {
		$('html,body').animate({scrollTop:0}, 'slow');
	});*/


	/*$(window).scroll(function() {
		if ($(window).scrollTop()>=145) {
			$('.menu').css({'position':'fixed','top':'0','right':'0','left':'0'});
			$('.slideBarRight').css({'position':'fixed','top':'75px'});
		} else {
			$('.menu').css("position","relative");
			$('.slideBarRight').css({'position':'absolute','top':'220px'});
		}
	});


	$(window).scroll(function() {
		if ($(window).scrollTop()>=145) {
			$('.menuSmallWidth').css({'position':'fixed','top':'0','right':'0','left':'0'});
		} else {
			$('.menuSmallWidth').css("position","relative");
		}
	});*/

	
	$('#toggle').click(function() {
		$('.ui.sidebar').sidebar('toggle');
	});
	$('#closeSidebar').click(function() {
		$('.ui.sidebar').sidebar('toggle');
	});

	$('.ui.accordion').accordion();

});