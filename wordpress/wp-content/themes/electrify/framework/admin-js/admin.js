// Easy Responsive Tabs Plugin
// Author: Samson.Onna <Email : samson3d@gmail.com>
(function ($) {
    $.fn.extend({
        easyResponsiveTabs: function (options) {
            //Set the default values, use comma to separate the settings, example:
            var defaults = {
                type: 'default', //default, vertical, accordion;
                width: 'auto',
                fit: true,
                closed: false,
                activate: function(){}
            }
            //Variables
            var options = $.extend(defaults, options);            
            var opt = options, jtype = opt.type, jfit = opt.fit, jwidth = opt.width, vtabs = 'vertical', accord = 'accordion';
            var hash = window.location.hash;
            var historyApi = !!(window.history && history.replaceState);
            
            //Events
            $(this).bind('tabactivate', function(e, currentTab) {
                if(typeof options.activate === 'function') {
                    options.activate.call(currentTab, e)
                }
            });

            //Main function
            this.each(function () {
                var $respTabs = $(this);
                var $respTabsList = $respTabs.find('ul.resp-tabs-list');
                var respTabsId = $respTabs.attr('id');
                $respTabs.find('ul.resp-tabs-list li').addClass('resp-tab-item');
                $respTabs.css({
                    'display': 'block',
                    'width': jwidth
                });

                $respTabs.find('.resp-tabs-container > div').addClass('resp-tab-content');
                jtab_options();
                //Properties Function
                function jtab_options() {
                    if (jtype == vtabs) {
                        $respTabs.addClass('resp-vtabs');
                    }
                    if (jfit == true) {
                        $respTabs.css({ width: '100%', margin: '0px' });
                    }
                    if (jtype == accord) {
                        $respTabs.addClass('resp-easy-accordion');
                        $respTabs.find('.resp-tabs-list').css('display', 'none');
                    }
                }

                //Assigning the h2 markup to accordion title
                var $tabItemh2;
                $respTabs.find('.resp-tab-content').before("<h2 class='resp-accordion' role='tab'><span class='resp-arrow'></span></h2>");

                var itemCount = 0;
                $respTabs.find('.resp-accordion').each(function () {
                    $tabItemh2 = $(this);
                    var $tabItem = $respTabs.find('.resp-tab-item:eq(' + itemCount + ')');
                    var $accItem = $respTabs.find('.resp-accordion:eq(' + itemCount + ')');
                    $accItem.append($tabItem.html());
                    $accItem.data($tabItem.data());
                    $tabItemh2.attr('aria-controls', 'tab_item-' + (itemCount));
                    itemCount++;
                });

                //Assigning the 'aria-controls' to Tab items
                var count = 0,
                    $tabContent;
                $respTabs.find('.resp-tab-item').each(function () {
                    $tabItem = $(this);
                    $tabItem.attr('aria-controls', 'tab_item-' + (count));
                    $tabItem.attr('role', 'tab');

                    //Assigning the 'aria-labelledby' attr to tab-content
                    var tabcount = 0;
                    $respTabs.find('.resp-tab-content').each(function () {
                        $tabContent = $(this);
                        $tabContent.attr('aria-labelledby', 'tab_item-' + (tabcount));
                        tabcount++;
                    });
                    count++;
                });
                
                // Show correct content area
                var tabNum = 0;
                if(hash!='') {
                    var matches = hash.match(new RegExp(respTabsId+"([0-9]+)"));
                    if (matches!==null && matches.length===2) {
                        tabNum = parseInt(matches[1],10)-1;
                        if (tabNum > count) {
                            tabNum = 0;
                        }
                    }
                }

                //Active correct tab
                $($respTabs.find('.resp-tab-item')[tabNum]).addClass('resp-tab-active');

                //keep closed if option = 'closed' or option is 'accordion' and the element is in accordion mode
                if(options.closed !== true && !(options.closed === 'accordion' && !$respTabsList.is(':visible')) && !(options.closed === 'tabs' && $respTabsList.is(':visible'))) {                  
                    $($respTabs.find('.resp-accordion')[tabNum]).addClass('resp-tab-active');
                    $($respTabs.find('.resp-tab-content')[tabNum]).addClass('resp-tab-content-active').attr('style', 'display:block');
                }
                //assign proper classes for when tabs mode is activated before making a selection in accordion mode
                else {
                    $($respTabs.find('.resp-tab-content')[tabNum]).addClass('resp-tab-content-active resp-accordion-closed')
                }

                //Tab Click action function
                $respTabs.find("[role=tab]").each(function () {
                   
                    var $currentTab = $(this);
                    $currentTab.click(function () {
                        
                        var $currentTab = $(this);
                        var $tabAria = $currentTab.attr('aria-controls');

                        if ($currentTab.hasClass('resp-accordion') && $currentTab.hasClass('resp-tab-active')) {
                            $respTabs.find('.resp-tab-content-active').slideUp('', function () { $(this).addClass('resp-accordion-closed'); });
                            $currentTab.removeClass('resp-tab-active');
                            return false;
                        }
                        if (!$currentTab.hasClass('resp-tab-active') && $currentTab.hasClass('resp-accordion')) {
                            $respTabs.find('.resp-tab-active').removeClass('resp-tab-active');
                            $respTabs.find('.resp-tab-content-active').slideUp().removeClass('resp-tab-content-active resp-accordion-closed');
                            $respTabs.find("[aria-controls=" + $tabAria + "]").addClass('resp-tab-active');

                            $respTabs.find('.resp-tab-content[aria-labelledby = ' + $tabAria + ']').slideDown().addClass('resp-tab-content-active');
                        } else {
                            $respTabs.find('.resp-tab-active').removeClass('resp-tab-active');
                            $respTabs.find('.resp-tab-content-active').removeAttr('style').removeClass('resp-tab-content-active').removeClass('resp-accordion-closed');
                            $respTabs.find("[aria-controls=" + $tabAria + "]").addClass('resp-tab-active');
                            $respTabs.find('.resp-tab-content[aria-labelledby = ' + $tabAria + ']').addClass('resp-tab-content-active').attr('style', 'display:block');
                        }
                        //Trigger tab activation event
                        $currentTab.trigger('tabactivate', $currentTab);
                        
                        //Update Browser History
                        if(historyApi) {
                            var currentHash = window.location.hash;
                            var newHash = respTabsId+(parseInt($tabAria.substring(9),10)+1).toString();
                            if (currentHash!="") {
                                var re = new RegExp(respTabsId+"[0-9]+");
                                if (currentHash.match(re)!=null) {                                    
                                    newHash = currentHash.replace(re,newHash);
                                }
                                else {
                                    newHash = currentHash+"|"+newHash;
                                }
                            }
                            else {
                                newHash = '#'+newHash;
                            }
                            
                            history.replaceState(null,null,newHash);
                        }
                    });
                    
                });
                
                //Window resize function                   
                $(window).resize(function () {
                    $respTabs.find('.resp-accordion-closed').removeAttr('style');
                });
            });
        }
    });
})(jQuery);

jQuery(document).ready(function($){
	"use strict";

	$(window).load(function(){

        /* Tabs */
        $('.verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
	});

	var $templateSelector = $("#pageparentdiv").find("#page_template"),
		templateVal = $templateSelector.val(),
		$portfolioColumns = $("#pix-portfolio-styles").find(".portfolio-styles"),
		$pixColumns = $("#pix-columns"),
		$pixHeaderStyle = $("#pix-header-style").find(".header-style"),
		$pixHeaderStyleVal =  $pixHeaderStyle.val(),
		$acc = $('.pix-main-title'),		
		$pixHeaderDisplay = $('#display_header');


	$acc.on('click', function(e) {
		$(this).toggleClass('closed').next('div').slideToggle(500);
		e.preventDefault();
	});
	
	$('.show_header_style').show();

	changeHeaderBg($pixHeaderStyleVal, $);

	$pixHeaderStyle.on('change',function(e){
		var $pixHeaderStyleVal =  $pixHeaderStyle.val()
		changeHeaderBg($pixHeaderStyleVal, $);
		
	});
		

	$pixHeaderDisplay.on('change',function(e){
		//console.log('changed');
		var $headerOptions = $('#pix-sub-header');
		$pixHeaderStyleVal =  $(this).val();
		if($pixHeaderStyleVal == 'hide'){
			$headerOptions.slideUp(200);
		}
		else if($pixHeaderStyleVal == 'show'){
			$headerOptions.slideDown(200);
		}
	});	

	showColumnSettings(templateVal, $);

	$templateSelector.on('change',function(e){
		templateVal = $(this).val();
		showColumnSettings(templateVal, $);
	});

	$portfolioColumns.on('change',function(e){
		var portfolioVal = $(this).val();
		if(portfolioVal != 'extended'){
			$pixColumns.show(300);
		}else{
			$pixColumns.hide(300);
		}
	});

	//color picker in metabox
	if($('.meta-color').length > 0){
		$('.meta-color').wpColorPicker();
	}

	//Get post format values on page loads 
	var rad_val = $('#post-formats-select input[name=post_format]:radio:checked').val();
	funcPostFormat(rad_val, $);

	//Get post format values
	$('#post-formats-select input:radio[name=post_format]').on('change',function(e) {
		var $post_format = $(this).val();
		funcPostFormat($post_format, $);
	});


	var $sidebarPosition = $('.sidebar_position'),
		$portfolioHoverStyles = $('.portfolio_hover_styles');

	setOutline($sidebarPosition, $);
	setOutline($portfolioHoverStyles, $);

	hideSidebar($sidebarPosition, $);		
	
});

function hideSidebar(selector, $){

	$sidebarPosition_val = $('.sidebar_position input[name=sidebar_position]:radio:checked').val();	

	if($sidebarPosition_val == 'full_width' || $sidebarPosition_val == 'no_sidebar'){
		$('#select_sidebar').hide();
	}
	else{
		$('#select_sidebar').show();
	}

	selector.find('img').on('click', function(e) {
		$sidebarPosition_val = $(this).parents('li').find('input[name=sidebar_position]').val();
		if($sidebarPosition_val == 'full_width' || $sidebarPosition_val == 'no_sidebar'){
			$('#select_sidebar').hide();
		}
		else{
			$('#select_sidebar').show();
		}	
		
	});	

	
}


function changeHeaderBg($pixHeaderStyleVal, $){

	if($pixHeaderStyleVal == 'color'){
		$('.show_header_style').hide();
	}
	else if($pixHeaderStyleVal == 'customcolor'){
		$('#header_bg_image').hide();
		$('#header_bg_color_show').show();
		$('.show_header_style').show();
	}
	else{
		$('#header_bg_image').show();
		$('.show_header_style').show();
		$('#header_bg_color_show').hide();
	}

}

function setOutline(selector, $){

	//console.log(selector);

	selector.find('li a img').addClass('img-border');
	selector.find('input:radio:checked').parent('li').find('a img').addClass('outline');

	selector.find('li a').on('click', function(e) {
		$(this).parent('li').find('input').prop('checked',true);
		$(this).find('img').addClass('outline');
		$(this).parent('li').siblings().find('a img').addClass('img-border').removeClass('outline');
		
		e.preventDefault();
		
	});
	
}

function showColumnSettings(templateVal, $){
	var $options = $(".show_portfolio_options"), $layout = $('#pix-layout-options'), $tabPortfolio = $('#PageOptions .tab-portfolio'), $tabPagelayout = $('#PageOptions .tab-pagelayout');

	if(templateVal == "page-template/page-portfolio.php"){
		//$('#pix_page_options').show(100);
		//$('#pix_page_options').prop('checked', 'true');
		$options.show(100);
		$options.prev('.pix-main-title').removeClass('closed').slideDown(300);

		$layout.hide();
		$layout.prev('.pix-main-title').addClass('closed').slideUp();

		$tabPortfolio.show();
		$tabPagelayout.hide(function(){
			$tabPortfolio.trigger('click');
		});
		$(".resp-accordion").eq(2).hide();
		
		
	}else{
		
		$options.hide();
		$options.prev('.pix-main-title').slideUp();

		$layout.show(100);
		$layout.prev('.pix-main-title').slideDown(300);

		$tabPortfolio.hide();
		$tabPagelayout.show(function(){
			$('#PageOptions .tab-subpage').trigger('click');
		});
	}
}

//Post metabox options
function funcPostFormat($post_format, $){

	//Show/hide video post format options
	$('#pix_post_options').show(0);

	var $vidIframe = $('#vid_iframe_show'),
	$vidNormal = $('.vid_normal_show'),
	$vidPlaylist = $('#vid_playlist_show'),
	$audNormal = $('.aud_normal_show'),
	$audIframe = $('#aud_iframe_show'),
	$audPlaylist = $('#aud_playlist_show')


	
	if($post_format == 'video'){
		
		var $video_methods = $('#video_methods').val();

		$('#video_methods_show').show(100);

		if($video_methods == 'vid_normal'){
			$vidPlaylist.hide(100);
			$vidIframe.hide(100);
			$vidNormal.show(100);
		}

		if($video_methods == 'vid_iframe'){
			$vidPlaylist.hide(100);
			$vidNormal.hide(100);
			$vidIframe.show(100);
		}

		if($video_methods == 'vid_playlist'){
			$vidIframe.hide(100);
			$vidNormal.hide(100);
			$vidPlaylist.show(100);
		}

		$('#video_methods').on('change',function(e){
			$video_methods = $(this).val();
			
			if($video_methods == 'vid_normal'){
				$vidPlaylist.hide(100);
				$vidIframe.hide(100);
				$vidNormal.show(100);
			}

			if($video_methods == 'vid_iframe'){
				$vidPlaylist.hide(100);
				$vidNormal.hide(100);
				$vidIframe.show(100);
			}

			if($video_methods == 'vid_playlist'){
				$vidIframe.hide(100);
				$vidNormal.hide(100);
				$vidPlaylist.show(100);
			}
			console.log($video_methods);
		});
	}else{
		$('#video_methods_show').hide(0);
		$vidIframe.hide(0);
		$vidNormal.hide(0);
		$vidPlaylist.hide(0);
	}

	if($post_format == 'audio'){
		
		var $audio_methods = $('#audio_methods').val();

		$('#audio_methods_show').show(100);

		if($audio_methods == 'aud_normal'){
			$audPlaylist.hide(100);
			$audIframe.hide(100);
			$audNormal.show(100);
		}

		if($audio_methods == 'aud_iframe'){
			$audPlaylist.hide(100);
			$audNormal.hide(100);
			$audIframe.show(100);
		}
		if($audio_methods == 'aud_playlist'){
			$audIframe.hide(100);
			$audNormal.hide(100);
			$audPlaylist.show(100);
		}

		$('#audio_methods').on('change',function(e){
			$audio_methods = $(this).val();
			
			if($audio_methods == 'aud_normal'){
				$audPlaylist.hide(100);
				$audIframe.hide(100);
				$audNormal.show(100);
			}

			if($audio_methods == 'aud_iframe'){
				$audPlaylist.hide(100);
				$audNormal.hide(100);
				$audIframe.show(100);
			}
			if($audio_methods == 'aud_playlist'){
				$audIframe.hide(100);
				$audNormal.hide(100);
				$audPlaylist.show(100);
			}
		});
	}else{
		$('#audio_methods_show').hide(0);
		$audIframe.hide(0);
		$audNormal.hide(0);
		$audPlaylist.hide(0);
	}



	//Show/hide audio post format options
	if($post_format == 'audio'){
		$('#aud_show').show(100);
	}else{
		$('#aud_show').hide(100);
	}
	
	//Show/hide audio post format options
	if($post_format == 'link'){
		$('#link_show').show(100);
	}else{
		$('#link_show').hide(100);
	}

	//Show/hide gallery post format options
	if($post_format == 'gallery'){
		$('.img_gallery_show').show(100);
	}else{
		$('.img_gallery_show').hide(100);
	}

	//Show/hide gallery post format options
	if($post_format == 'quote'){
		$('#quote_show').show(100);
	}else{
		$('#quote_show').hide(100);
	}
	
	if($post_format != 'audio' && $post_format != 'video' && $post_format != 'link' && $post_format != 'gallery' && $post_format != 'quote'){
		$('#pix_post_options').hide(0);
	}

	

}

