/*
pixel8es Scripts File
Author: Shahul Hameed

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
	window.getComputedStyle = function(el, pseudo) {
		this.el = el;
		this.getPropertyValue = function(prop) {
			var re = /(\-([a-z]){1})/g;
			if (prop == 'float') prop = 'styleFloat';
			if (re.test(prop)) {
				prop = prop.replace(re, function () {
					return arguments[2].toUpperCase();
				});
			}
			return el.currentStyle[prop] ? el.currentStyle[prop] : null;
		}
		return this;
	}
}

/* Theme Scripts */
(function($){
	'use strict';

	String.prototype.decodeHTML = function() {
		return $("<div>", {html: "" + this}).html();
	};

	//WOO DROP DOWN
	var $main = $("#wrapper"),
		$mainCon = $("#wrapper-container"),

	woo_drop_down = function (){
		/* WOO COMMERCE Cart */
		var $cartBtn = $('.cart-trigger'),
			$cartDropdown = $('.cart-trigger').find('.woo-cart-dropdown');

		if($cartBtn.length > 0 && $cartDropdown.length > 0){

			$cartBtn.mouseover(function(){
				$(this).find('.woo-cart-dropdown').stop().fadeIn();
			}).mouseout(function(){
				$(this).find('.woo-cart-dropdown').stop().fadeOut();
			});

		}
	},

	/* Make pie Responsive */
	pieChartResponsive = function (options, $self, $border, size){
		if($self.hasClass('style2') && $self.hasClass('style4')){

			$border.css({
				'line-height': (size + options.style4) +'px',
				'height': (size + options.style4) +'px',
				'width': (size + (options.style4)) +'px'
			});

		}else if($self.hasClass('style2') && $self.hasClass('style5')){

			$border.css({
				'line-height': (size - options.style5) +'px',
				'height': (size - options.style5) +'px',
				'width': (size - (options.style5)) +'px'
			});

		}
		else if($self.hasClass('style2') && $self.hasClass('style6')){

			//$border.height(size).width(size).css('line-height',size + 'px');

			$border.css({
				'line-height': (size + options.style6) +'px',
				'height': (size + options.style6) +'px',
				'width': (size + options.style6) +'px'
			});

		}
		else if($self.hasClass('style2')){

			//$border.height(size + 4).width(size + 4).css('line-height',(size + 4) +'px');

			$border.css({
				'line-height': (size + options.style2) +'px',
				'height': (size + options.style2) +'px',
				'width': (size + options.style2) +'px'
			});

		}
	},

	/* Mobile nav Nice Scroll */
	mNavNiceScroll = function (){
		var $mobileNav = $('.mobile-nav');
		if($mobileNav.length > 0){
			$mobileNav.niceScroll({cursoropacitymin:0, horizrailenabled:false, cursorcolor:"#333",cursorborder:0, cursorwidth:5,cursoropacitymax:0.8,zindex: 9999, top:0,right:'0 !important'});
		}
	},

	/* Resize nicescroll */
	mNavNiceScrollResize = function (){
		var $mobileNav = $('.mobile-nav');
		$mobileNav.getNiceScroll().resize();
	},

	/* Hide nav nice in desktop */
	mNavNiceScrollRemove = function (){
		var $mobileNav = $('.mobile-nav');      
		$mobileNav.getNiceScroll().remove();
		$mobileNav.css('overflow', 'initial');
	},

	/* Main Menu */
	pixMenu = function (){
		//Drop-Down Menu
		$(".menu li.pix-submenu, .menu li.pix-submenu li").hover(function () {
			$(this).children('a').addClass('current');
			$(this).children('ul').css({visibility: "visible", display: "none"}).stop().slideDown(300);                 
		},function () {
			$('a', this).removeClass('current');
			$('ul', this).css({visibility: "hidden", display: "none"});
		});        

		$(".menu > li.pix-megamenu").hover(function(){
			$(this).children('a').addClass('current');
			$(this).children('ul').css({visibility: "visible", display: "none"}).stop().slideDown(300);
		},function () {
			$(this).children('a').removeClass('current');
			$(this).children('ul').css({visibility: "hidden", display: "none"});
		});
	},

	init = function() {

		/* getting viewport width */
		var responsive_viewport = $(window).width();
		
		if (responsive_viewport >= 768) {
		
			/* load gravatars */
			$('.comment img[data-gravatar]').each(function(){
				$(this).attr('src',$(this).attr('data-gravatar'));
			});
		}
		var $sideHeader = $('.left-main-menu'),
			sideHeaderOpened = 1;
		if (responsive_viewport < 992) {			
			$sideHeader.css('margin-left', '-250px');
			sideHeaderOpened = 0;
			$('.pix-side-nav-trigger').css('display', 'block');
		}else{
			$sideHeader.css('margin-left', '0px');
			sideHeaderOpened = 1;
			$('.pix-side-nav-trigger').css('display', 'none');
		}

		$('.pix-side-nav-trigger').on('click', function(e) {
			if (responsive_viewport < 992 && sideHeaderOpened == 0) {
				$sideHeader.animate({marginLeft: 0},
					400, function() {
					sideHeaderOpened = 1;
				});
			}else if(responsive_viewport < 992 && sideHeaderOpened == 1){
				$sideHeader.animate({marginLeft: '-250px'},
					400, function() {
					sideHeaderOpened = 0;
				});
			}
				
				e.preventDefault();
			});

		/* Pix Menu */
		var $simplemenu = $( '#dl-menu' );

		if($simplemenu.length > 0){

			$simplemenu.find('li').removeClass('pix-megamenu');
			$simplemenu.find('li').removeClass('pix-submenu');

			$simplemenu.children('ul').addClass('dl-menu').removeClass('menu');
			$simplemenu.find('.dl-menu ul').addClass('dl-submenu');

			$simplemenu.dlmenu();

			$simplemenu.fadeIn();
		}else{
			pixMenu();
		}

		/* Header */
		var $body = $("body");
		$body.niceScroll({cursoropacitymin:1,horizrailenabled:false, cursorcolor:"#333",cursorborder:0, cursorwidth:10,cursoropacitymax:0.7,zindex: 9999});

		//Mobile Menu
		var mMenuStatus = 0,
			$mMenu = $('.header-con .main-nav'),
			$pixOverlay = $('<div />', {class: 'pix-overlay'});

		//Single page nav
		/*$('.main-nav').onePageNav({
			currentClass: 'current-menu-item',
			changeHash: true,
			filter: ':not(external)',
			begin: function() {
				//Close mobile nav if single page nav
				if(mMenuStatus == 1){
					mNavNiceScrollRemove();
					$mMenu.removeClass('mobile-nav').stop().animate({ left:  '-100%' }, 300);
					$pixOverlay.fadeOut(300, function() {
						$(this).remove();
					});
					mMenuStatus = 0;
				}


				//Hack so you can click other menu items after the initial click (For Ios)
				$('body').append('<div id="device-dummy" style="height: 1px;"></div>');
			},
			end: function() {
				//Hack so you can click other menu items after the initial click (For Ios)
				$('#device-dummy').remove();
			}
		});*/

		if(responsive_viewport <= 991){
			$mMenu.addClass('mobile-nav');
			mNavNiceScroll();
		}else{
			mNavNiceScrollRemove();
		}       
			
		$('.mobile-menu').on('click', function(e) {
			
			if(mMenuStatus == 0){
				
				//Add Overlay
				$pixOverlay.hide().appendTo('body').fadeIn(300);            

				//Show Menu
				$mMenu.addClass('mobile-nav').stop().animate({ left: 0 }, 300);

				//set Nicescroll
				mNavNiceScroll();
				mMenuStatus = 1;    

				//Add Click event to overlay
				$pixOverlay.off().on('click', function(e) {
					e.preventDefault();
					if(mMenuStatus == 1){
						mNavNiceScrollRemove();
						$mMenu.removeClass('mobile-nav').stop().animate({ left:  '-100%' }, 300);
						$pixOverlay.fadeOut(300, function() {
							$(this).remove();
						});
						mMenuStatus = 0;
					}
				});

			}else{
				mNavNiceScrollRemove();
				$mMenu.removeClass('mobile-nav').stop().animate({ left:  '-100%' }, 300);
				$pixOverlay.fadeOut(300, function() {
					$(this).remove();
				});
				mMenuStatus = 0;
			}

			e.preventDefault();
		});

		//Counter
		$('.counter-value').counterUp({
			delay: 10,
			time: 1000
		}); 

		//parallax
		$(window).stellar();


		/* Responsive video */
		$(".container, .posts, .pix-blog-video,.wp-video, .pix-post-video").fitVids();

		/* open share in popup window */
		$('.port-share-btn a').on('click', function(){
			newwindow=window.open($(this).attr('href'),'','height=450,width=700');
			if (window.focus) {newwindow.focus()}
				return false;
		});

		//Magnific Popup
		$('.popup-gallery').magnificPopup({
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
				titleSrc: function(item) {
					return item.el.attr('title');
				}
			}
		});

		/* Pie Chart Used in Skills */
		$('.pix-chart').each(function(index, el) {

			var $self = $(this);
				$self.width($self.data('size')).height($self.data('size')).css('line-height', $self.data('size') +'px');

			$self.waypoint(function() {

				$(this).easyPieChart({  
					onStart: function(from, to){
						var canvas = $(this.el).find('canvas'),
							size = canvas.width(),
							$border = $(this.el).find('.border-bg'), 
							$bg = $(this.el).find('.bg'),
							$self = $(this.el);

						$self.css({
							'line-height': (size) +'px',
							'height': (size) +'px',
							'width': (size) +'px'
						});

					},      
					onStep: function(from, to, percent) {
						$(this.el).find('.percent-text').text(Math.round(percent));
					}
				});

			},
			{
				offset: '90%',
				triggerOnce: true
			});

		});


		$(window).resize(function(event) {


			var responsive_viewport = $(window).width(),
			    $sideHeader = $('.left-main-menu');

			if(responsive_viewport < 768){
				$sideHeader.css('margin-left', '-250px');
			}else{
				$sideHeader.css('margin-left', '0px');
			}
			
			/* PIE CHART */
			$('.pix-chart').each(function(index, el) {

				var $self = $(this),
					canvas = $self.find('canvas'), 
					size = canvas.width(),
					$border = $self.find('.border-bg'), 
					$bg = $self.find('.bg');

				$self.css({
					'line-height': (size) +'px',
					'height': (size) +'px'
				});

			});
			
			if(responsive_viewport <= 991){
				$mMenu.addClass('mobile-nav');
				mNavNiceScroll();
			}else{
				mNavNiceScrollRemove();
				$mMenu.removeClass('mobile-nav');
			}
			
		});



		$(window).load(function() {

			$.slidebars();

			// Slidebars Submenus
			if( $('#dl-menu').length > 0){
				$('.external').off('click').on('click', function() {
					$submenu = $(this).parent().children('.sb-submenu');
					$(this).add($submenu).toggleClass('sb-submenu-active'); // Toggle active class.
					
					if ($submenu.hasClass('sb-submenu-active')) {
						$submenu.slideDown(200);
					} else {
						$submenu.slideUp(200);
					}
				});
			}

			$('#dot-nav').onePageNav({
				currentClass: 'current',
				changeHash: true
			});

			$('.popup-video').magnificPopup({
				disableOn: 700,
				type: 'iframe',
				mainClass: 'mfp-fade',
				removalDelay: 160,
				preloader: false,
				fixedContentPos: true
			});

			//Woo DropDown
			woo_drop_down();


			$('.tool-tip').tooltip();
			
			//Parallax
			$.stellar({
				// Refreshes parallax content on window load and resize
				responsive: true
			});

			/* Sticky Header */

			if($simplemenu.length == 0){
				var $headerCon = $('.header-con.pix-sticky-header');
				if($headerCon.length > 0){
					$headerCon.waypoint('sticky', {
						offset: -($('.header-wrap').height()+30)
					});
				}
			}

			var $elem = $('.pix-animate-cre');

			$elem.each(function(){
				var $singleElement = $(this);

				// Get data-attr from element
				var animateTrans = $singleElement.data('trans') ? $singleElement.data('trans') : 'fadeIn';
				var animateDelay = $singleElement.data('delay') ? $singleElement.data('delay') : '';
				var animateDuration = $singleElement.data('duration') ? $singleElement.data('duration') : '';

					if(animateDelay != ''){
						$singleElement.css('animation-delay', animateDelay);
					}

					if(animateDuration != ''){
						$singleElement.css('animation-duration', animateDuration);
					}

					$singleElement.waypoint(function() {
						if ($singleElement.hasClass('animated ' + animateTrans)) return;
						$singleElement.css('opacity','1').addClass('animated '+ animateTrans);

					},
					{
						offset: '70%',
						triggerOnce: true
					});
		   });

			//Blog Playlist
			var $playlist = $('.wp-playlist-tracks'),
				$playlist_trigger = $('<div />', {class: 'show-playlist' }).prepend('<div class="open-playlist pix-icons pixicon-plus"></div>');

			if( $playlist.length > 0){
				$playlist.wrap($playlist_trigger);

				var $showPlaylist = $('.show-playlist')

				$showPlaylist.mouseover(function(event) {
					var $thisPlaylist = $(this).find('.wp-playlist-tracks');
					$thisPlaylist.stop().slideDown('fast');

					event.stopPropagation();
				});

				$showPlaylist.mouseleave(function(event) {
					var $thisPlaylist = $(this).find('.wp-playlist-tracks');
					$thisPlaylist.stop().slideUp('fast');
					event.stopPropagation();
				});

			}

			// Owl Carousel
			$(".owl-carousel").owlCarousel({
				navigationText: false
			});
			
			/* Isotope js */ 
			// cache container
			var $container = $('.portfolio-contents'),
				$portExtend = $('#portfolio-page.container-extend');
			// initialize isotope
			
			if($portExtend.length > 0 ){
				$portExtend.css('max-width', $(window).width());
			}

			$container.isotope({
				itemSelector : '.element',
				masonry : {
					columnWidth : 1
				}
			});

			var  $masonryContainer = $('.isotopeCon'), $filterCon = $("#filters");
			$masonryContainer.isotope({
				itemSelector : '.element',
				masonry : {
					columnWidth : 1
				}
			});

			if($filterCon.hasClass('dropdown')){
				$filterCon.find('.selected').parent('li').css('display', 'none');
			}
			
			/* Portfolio Filter - Dropdown Style */
			$('.top-active').on('click', function(e) {
				e.preventDefault();
				
				$(this).next('#filters').slideToggle('400');

			});


			// filter items when filter link is clicked
			$('#filters a').click(function(){
				var $this = $(this),
					$filter = $this.parents('#filters');

				if($filter.hasClass('dropdown')){
					$filter.slideUp(400, function(){
						$this.parent('li').css('display', 'none');
						$this.parent('li').siblings().css('display', 'block');
					});
					$filter.prev('.top-active').find('.txt').text($this.text());
				}

				// don't proceed if already selected
				if ( $this.hasClass('selected') ) {
					return false;
				}
				
				var $optionSet = $this.parents('.option-set');
				$optionSet.find('.selected').removeClass('selected');
				$this.addClass('selected');



				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector });
				$masonryContainer.isotope({ filter: selector });
				return false;
			});

			// Contant Form validate form on keyup and submit
			$("#contactform").validate({
				rules: {
					contactname: {
						required: true,
						minlength: 2
					},
					email: {
						required: true,
						email: true
					},
					subject: {
						required: true,
						minlength: 2
					},
					message: {
						required: true,
						minlength: 10
					}
				},
				messages: {
					contactname: {
						required: electrifyAjaxForm.nameError ,
						minlength: jQuery.format(electrifyAjaxForm.nameLenError)
					},
					email: {
						required: electrifyAjaxForm.emailError,
						email: electrifyAjaxForm.emailLenError
					},
					subject: {
						required: electrifyAjaxForm.subjectError ,
						minlength: jQuery.format(electrifyAjaxForm.subjectLenError)
					},
					message: {
						required: electrifyAjaxForm.messageError ,
						minlength: jQuery.format(electrifyAjaxForm.messageLenError)
					}
				},
				// set this class to error-labels to indicate valid fields
				success: function(label) {
					label.addClass("checked");
				},
				submitHandler: function() {
					
					$('#contactform').prepend('<p class="loaderIcon"><img src="'+ electrifyAjax.templateurl +'/library/images/AjaxLoader.gif" alt="Loading..."></p>');
					var name = $('input#contactname').val();
					var email = $('input#email').val();
					var subject = $('input#subject').val();
					var message = $('textarea#message').val();

					$.ajax({
						type: 'post',
						url: electrifyAjax.ajaxurl,
						//data: 'contactname=' + name, + '&email=' + email + '&subject=' + subject + '&message=' + message,
						data: {
							action      :   'electrify_submit_form',
							contactname :   name,
							email       :   email,
							subject     :   subject,
							message     :   message,
							sendto      :   electrifyAjax.email,
							nonce       :   electrifyAjax.nonce
						},
					}).done(function(results) {
						$('#contactform p.loaderIcon').fadeOut(1000);
						$('#contactform div.response').html(results);
						$('html, body').animate({
							scrollTop: ($("#contactform").offset().top - 111)
						}, 400);
					});

					$(':input','#contactform').not(':button, :submit, :reset, :hidden').val('');

				}
			});


		});

	};	

	/* Anchor nav 
	$('.header-con .main-nav a').each(function(e) {

		var full_url = $(this).attr('href'),
		anchor = full_url.split("#");

		$(this).addClass('external');		

		if( anchor.length > 1 ){
			$(this).removeClass('external');
            $(this).parent('li').removeClass('current-menu-item');
		}

	});*/	

	/* Search button */
	var searchState = 0, 
		$searchHeader = $('.search-btn'), 
		$search = $searchHeader.find('.topSearchForm');

	//if search is present in header then add events
	if($search.length > 0){
		$searchHeader.on('click', function(e) {
			var self = $(this);
			if(e.target.nodeName != 'INPUT'){
				self.toggleClass('color');
				$search.toggleClass('show');
				$search.find('input').focus();
				//set search state
				searchState = 1;
			}
			e.preventDefault();
			e.stopPropagation();
		});

		$(document).on('click', function(e) {
			if(searchState == 1){
				e.stopPropagation();
				$search.removeClass('show');
				$searchHeader.removeClass('color');
				searchState = 0;
			}           
		});
	}

	/* WMPL Language Menu */
	var $langBtn = $('#lang-list.lang-dropdown.translated');

	if($langBtn.length > 0){

		$langBtn.mouseover(function(){
            var $langDropdown = $(this).find('.lang-dropdown-inner');
			$langDropdown.stop().slideDown();
		}).mouseout(function(){
            var $langDropdown = $(this).find('.lang-dropdown-inner');
			$langDropdown.stop().slideUp();
		});

	}	

	//Back To Top
	$("#back-top").hide();

	$(window).scroll(function(){

		var scrollTopVal = $(this).scrollTop();
		
		if($(this).scrollTop()>100){
			$("#back-top").fadeIn();
		}else{
			$("#back-top").fadeOut();
		}
	});

	$("#back-top a").click(function(){
		$("body,html").animate({
			scrollTop:0},800);
			return false;
	});


	// Header Widget
	var $headerWidgetCon = $("#headerWidgetCon"),
		$toggleBtn = $headerWidgetCon.find('.toggleBtn'),
		headerWidgetStatus = 0;
	
	if($headerWidgetCon.length > 0 ){

		$toggleBtn.on('click', function(e) {
			e.preventDefault();
			
			if(headerWidgetStatus == 0){
				$headerWidgetCon.animate({bottom: -$headerWidgetCon.outerHeight()});
				$toggleBtn.addClass('close').removeClass('open');
				headerWidgetStatus = 1;
			}else{
				$headerWidgetCon.animate({bottom: -2});         
				$toggleBtn.addClass('open').removeClass('close');
				headerWidgetStatus = 0;
			}
			
		});
	}

	/* End of Header Scripts */

	init();

	/* Ajaxify Navigation */
	var ajaxLoad = function(html) {
		document.title = html
		.match(/<title>(.*?)<\/title>/)[1]
		.trim()
		.decodeHTML();

		init();
	},

	documentHtml = function(html){
		// Prepare
		var result = String(html).replace(/<\!DOCTYPE[^>]*>/i, '')
								 .replace(/<(html|head|body|title|script)([\s\>])/gi,'<div id="document-$1"$2')
								 .replace(/<\/(html|head|body|title|script)\>/gi,'</div>');
		// Return
		return result;
	},

	loadPage = function(href) {
		
		$.ajax({
			url: href,
			dataType: "html",
			beforeSend: function(){
				$main.fadeOut().html('');
				$mainCon.height(($(window).height()) + 200);

				if ($("#loadingbar").length == 0) {
					$("body").append("<div id='loadingbar'></div>");

					$("#loadingbar").addClass("waiting").append($("<dt/><dd/>"));
					$("#loadingbar").width((50 + Math.random() * 30) + "%");
				}
			}
		}).always(function() {
			if ($("#loadingbar").length > 0) {
				$("#loadingbar").width("101%").delay(200).fadeOut(400, function() {
				    $(this).remove();
				});
			}
		}).done(function(data) {

			var htmlFiltered = $('#wrapper', data).html();
			
			if(htmlFiltered != undefined){
				$main.html(htmlFiltered).fadeIn();
				$mainCon.height('auto');
				ajaxLoad(data);
			}else{
				$main.html("<div class='page-not-found'><p>404 page not found</p></div>").fadeIn();
				$mainCon.height($(window).height() - ($('footer.copyright ').outerHeight() + $('header-con').outerHeight()));
				$('.main-nav li').removeClass('active');

				document.location.href = href;
				return false;
			}
		}).error(function(){

			document.location.href = href;
			return false;

		});
	};

	// Used to detect initial (useless) popstate.
	// If history.state exists, assume browser isn't going to fire initial popstate.
	var popped = ('state' in window.history && window.history.state !== null), initialURL = location.href;

	$(window).on("popstate", function(e) {
		//if (e.originalEvent.state !== null) { 
		
		var initialPop = !popped && location.href == initialURL
		popped = true
		
			if (initialPop) return;

			loadPage(location.href);
			console.log(location.href);

			//set Current Method 1
			/*var url = window.location.pathname, 
				urlRegExp = new RegExp(url == '/' ? window.location.origin + '/?$' : url.replace(/\/$/,''));

			$('.main-nav a').each(function(){
				if(urlRegExp.test(this.href.replace(/\/$/,''))){
					$(this).parent('li').addClass('active').end().parents('li').siblings().removeClass('active');
				}
			});*/

			//set Current Method 2
			/*var curUrl = window.location.pathname.split('/'),
				activeUrl = (curUrl[curUrl.length - 1] != '') ? curUrl[curUrl.length - 1] : 'index.html';*/

			$('.main-nav li').removeClass('active');
			$('.main-nav a[href="'+ location.href +'"]').parent('li').addClass('active');
		//}
	});

	$(document).on("click", 'a:not(.noajax, [href^="#"], [href*="wp-login"], [href*="wp-admin"], .pix-side-nav-trigger)', function(e) {
		//e.preventDefault();
		var self = $(this),
			href = self.attr("href");

		// Continue as normal for cmd clicks etc
		if ( e.which == 2 || e.metaKey ) return true;

		$('.main-nav li').removeClass('active');
		self.parent('li').addClass('active');
		
		if (href.indexOf(document.domain) > -1 || href.indexOf(':') === -1){
			if($(window).scrollTop() > 10){
				$("body,html").animate({ scrollTop:0 },300,function(){
					history.pushState({}, '', href);
					loadPage(href);
				});
			}else{
				history.pushState({}, '', href);
				loadPage(href);
			}

			return false;
		}
		
	});
	
})(jQuery);


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
	var doc = w.document;
	if( !doc.querySelector ){ return; }
	var meta = doc.querySelector( "meta[name=viewport]" ),
		initialContent = meta && meta.getAttribute( "content" ),
		disabledZoom = initialContent + ",maximum-scale=1",
		enabledZoom = initialContent + ",maximum-scale=10",
		enabled = true,
		x, y, z, aig;
	if( !meta ){ return; }
	function restoreZoom(){
		meta.setAttribute( "content", enabledZoom );
		enabled = true; }
	function disableZoom(){
		meta.setAttribute( "content", disabledZoom );
		enabled = false; }
	function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
		if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } 
		}
		else if( !enabled ){ restoreZoom(); } 
	}
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );