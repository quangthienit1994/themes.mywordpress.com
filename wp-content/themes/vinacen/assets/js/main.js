;(function($){

	function menuPrimaryScroll(){
		const menu = $('#mega-menu-wrap-primary_navigation');
		const topBar = $('.ct-topBar');

		const offsetDefaults = 165;
		if(!menu){
			return;
		}

		const innerW = $(window).width();
		const scrollH = $(window).scrollTop();

		if(innerW >= 768){
			if(scrollH >= offsetDefaults){
				menu.addClass('navbar-fixed-top').css('top', topBar.height() + 'px');
			}else{
				menu.removeClass('navbar-fixed-top');
			}
		}

	}	

	menuPrimaryScroll();
	$(window).scroll(menuPrimaryScroll);

})(jQuery);

/**
 * Created by createit on 2015-01-08.
 */

var $devicewidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
var $deviceheight = (window.innerHeight > 0) ? window.innerHeight : screen.height;

var $bodyel = jQuery("body");

var $navbarel = jQuery(".navbar");
var $topbarel = jQuery(".ct-topBar");

/* ========================== */

function validatedata($attr, $defaultValue) {
    "use strict";
    if ($attr !== undefined) {
        return $attr
    }
    return $defaultValue;
}

function parseBoolean(str, $defaultValue) {
    "use strict";
    if (str == 'true') {
        return true;
    } else if (str == "false") {
        return false;
    }
    return $defaultValue;
}

function setCookie(cname, cvalue, exdays) {
    "use strict";
    if(exdays != "default"){
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }
    else{
        document.cookie = cname + "=" + cvalue;
    }

}

function getCookie(cname) {
    "use strict";
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}


//MAGNIFIC POPUP
jQuery(window).on("load", function() {
    jQuery.fn.magnificinfinitescroll = function (options) {
        "use strict";
        if (jQuery().magnificPopup) {

            jQuery('.ct-js-magnificPopupGroup').magnificPopup({
                //disableOn: 700,
                type: 'image',
                mainClass: 'ct-magnificPopup--image',
                removalDelay: 160,
                preloader: true,

                fixedContentPos: false,
                gallery: {
                    enabled: true
                },
                callbacks: {

                    buildControls: function () {
                        // re-appends controls inside the main container
                        this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
                    }
                }
            });

            jQuery('.ct-js-magnificPopupImage').magnificPopup({
                //disableOn: 700,
                type: 'image',
                mainClass: 'ct-magnificPopup--image',
                removalDelay: 160,
                preloader: true,

                fixedContentPos: false,
                gallery: {
                    enabled: false
                }
            });
        }
    };
});



var $maphelp = jQuery('.ct-googleMap--accordion .ct-googleMap');
jQuery(".ct-googleMap--accordion .ct-js-mapToogle").on("click", function () {
    "use strict";
    var $this = $(this);
    var $map = $this.parent().find('.ct-googleMap-container');
    $this.html($this.html() == '<i class="fa fa-map-marker"></i> Hide map' ? '<i class="fa fa-map-marker"></i> Show map' : '<i class="fa fa-map-marker"></i> Hide map');

    if ($map.height() != "0") {
        $map.animate({height: '0px'}, 500);
    } else {
        $map.animate({height: $maphelp.data("height") + "px"}, 500);
        setTimeout(function () {
            $('html, body').animate({
                scrollTop: $map.offset().top - 180
            }, 2000);
        }, 500);
    }
});



(function ($) {
    "use strict";
    $(document).ready(function(){

        $('body').on('mousewheel', function() {
            event.preventDefault();
            window.scrollTo(0, window.pageYOffset - event.wheelDelta / 1.5);
        });


        //================================================== Slider ====================================================

        var $slider = $('.ct-js-slick');
        //
        //$slider.each(function(){
        //    var $this = $(this);
        //
        //    if($this.hasClass('ct-slick-arrow--type1') || $this.hasClass('ct-slick-arrow--type6')){
        //        var $buttons = $this.find('> button');
        //
        //        var topPosition = 136;
        //
        //        if($this.hasClass('ct-slick-arrow--type6')){
        //            topPosition = 605;
        //        }
        //        else{
        //            topPosition = 117;
        //        }
        //
        //        $buttons.each(function(){
        //            $(this).css("top", topPosition + "px");
        //        });
        //    }
        //});

        // Ignore Slick // ---------------------------------

        $slider.attr('data-snap-ignore', 'true');

        //============================================= Breadcrumbs ====================================================

        var $breadcrumbs = $('.ct-js-breadcrumbs');


        $breadcrumbs.each(function(){

            var $this = $(this);
            var $breadcrumbsHeight = $this.attr("data-height") + "px" ||  "260px";
            var $breadcrumbsImage = $this.attr("data-bg-image");
            var $breadcrumbsScratchImage = $this.attr("data-bg-scratchImage");


            if($breadcrumbsImage) {
                if($breadcrumbsScratchImage){

                    $this.css({
                        "background-image": "url(\"" + $breadcrumbsScratchImage + "\"), url(\"" + $breadcrumbsImage + "\")",
                        "height": $breadcrumbsHeight
                    });
                } else{
                    $this.css({
                        "background-image": "url(\"" + $breadcrumbsImage + "\")",
                        "height": $breadcrumbsHeight
                    });
                }
            } else {

                $this.addClass('no-image');
                $this.css({
                    "height": $breadcrumbsHeight
                });
            }


        });

        //======================================================== Form ================================================

        var $formRadio = $('.wpcf7-form');

        $formRadio.each(function(){

            var $this = $(this);

            var $radio = $this.find('.wpcf7-radio input[type=radio]');

            var $radioInput = $this.find('.wpcf7-radio .wpcf7-list-item.last').find('input');
            var $radioTarget = $this.find('.ct-js-radio-target');
            $radioTarget.prop("disabled", true);

            $radio.on("click", function(){
                if($radioInput.prop("checked")){
                    $radioTarget.prop("disabled", false);
                }else{
                    $radioTarget.prop("disabled", true);
                }
            });
        });

        // Progress Bar // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        // $('.progress-bar').progressbar();

        if (jQuery().appear && jQuery("body").hasClass("cssAnimate")) {
            jQuery('.progress').appear(function () {
                var $this = jQuery(this);
                $this.each(function () {
                    var $innerbar = $this.find(".progress-bar");
                    var percentage = $innerbar.attr("data-percentage");
                    $innerbar.addClass("animating").css("width", percentage + "%");

                    $innerbar.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', function () {
                        $innerbar.find(".pull-right").fadeIn(900);
                    });

                });
            }, {accY: -500});
        } else {
            jQuery('.progress').each(function () {
                var $this = jQuery(this);
                var $innerbar = $this.find(".progress-bar");
                var percentage = $innerbar.attr("data-percentage");
                $innerbar.addClass("animating").css("width", percentage + "%");

                $innerbar.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', function () {
                    $innerbar.find(".pull-right").fadeIn(900);
                });

            });
        }


        /* =================================== COUNT TO ===================================== */


        if (($().countTo) && ($().appear) && ($("body").hasClass("cssAnimate"))) {
            $('.ct-js-counter').data('countToOptions', {
                formatter: function (value, options) {
                    return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ' ');
                }
            }).appear(function () {
                $(this).each(function (options) {
                    var $this = $(this);
                    var $speed = validatedata($this.attr('data-ct-speed'), 700);
                    options = $.extend({}, options || {
                            speed: $speed
                        }, $this.data('countToOptions') || {});
                    $this.countTo(options);
                });
            });
        } else if(($().countTo)){
            $('.ct-js-counter').data('countToOptions', {
                formatter: function (value, options) {
                    return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ' ');
                }
            });
            $('.ct-js-counter').each(function (options) {
                var $this = $(this);
                var $speed = validatedata($this.attr('speed'), 1200);
                options = $.extend({}, options || {
                        speed: $speed
                    }, $this.data('countToOptions') || {});
                $this.countTo(options);
            });
        }

        $('.ct-js-pieChart').each(function () {
            var $this = $(this);
            var $color = validatedata($this.attr('data-ct-firstColor'), "#2b8be9");
            var $color2 = validatedata($this.attr('data-ct-secondColor'), "#eeeeee");
            var $cutout = validatedata($this.attr('data-ct-middleSpace'), 90);
            var $stroke = validatedata($this.attr('data-ct-showStroke'), false);
            var $margin = validatedata($this.attr('data-ct-margin'), false);
            $this.parent().css('margin-left',$margin + 'px').css('margin-right',$margin + 'px');
            var options = {
                responsive: true, percentageInnerCutout: $cutout, segmentShowStroke: $stroke, showTooltips: false
            };
            var doughnutData = [{
                value: parseInt($this.attr('data-ct-percentage'), 10), color: $color, label: false
            }, {
                value: parseInt(100 - $this.attr('data-ct-percentage'), 10), color: $color2
            }];

            if (($().appear) && ($("body").hasClass("cssAnimate"))) {
                $('.ct-js-pieChart').appear(function () {
                    var ctx = $this[0].getContext("2d");
                    window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, options);
                });
            } else {
                var ctx = $this[0].getContext("2d");
                window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, options);
            }
        })



        //=================================================== Add Color ================================================

        $(".ct-js-color").each(function(){

            var $this = $(this);
            $this.css("color", '#' + $this.attr("data-color"));
        });


        //======================================================== Tabs ================================================

        $('#productGuide a , #productGuide a').on("click", function (e) {

            e.preventDefault();
            $(this).tab('show');
            return false;
        })


        //======================================================== Menu ================================================


        // Onepager Close on click

        var $mobileOnepager = $('.ct-menuMobile .ct-menuMobile-navbar .onepage');

        $mobileOnepager.on("click", function(e){
            return false;
        });
        $mobileOnepager.on("click", function(e){
            return false;
        });




        // Snap Navigation in Mobile open // ---------------------------------------------------------------------------

        var menuElementToClick = $('.mega-menu-wrap .mega-menu > .mega-menu-item  > .mega-menu-link');

        menuElementToClick.on("click", function() {
            if($(this).parent().find('> .mega-sub-menu').length > 0)
                return false;
        });
        menuElementToClick.on("click", function(){
            var $this = $(this);
            if($this.parent().hasClass('active')){
                $this.parent().removeClass('active');
            } else{
                //$('.ct-menuMobile .ct-menuMobile-navbar .dropdown.open').toggleClass('active');
                $this.parent().addClass('active');
            }

        });

        // To Top Button // --------------------------------------------------------------------------------------------


        $('.ct-js-btnScrollUp').on("click", function (e) {
            e.preventDefault();
            $("body,html").animate({scrollTop: 0}, 1200);
            $navbarel.find('.onepage').removeClass('active');
            $navbarel.find('.onepage:first-child').addClass('active');
            return false;
        });

        //================================================== Tooltip ===================================================

        // Tooltip init // ---------------------------------------------------------------------------------------------

        $("[data-toggle='tooltip']").tooltip();


        //================================================ Animations ==================================================

        // Animations Init // ------------------------------------------------------------------------------------------

        if ($().appear) {
            if (device.mobile() || device.tablet()) {
                $("body").removeClass("cssAnimate");
            } else {
                $('.cssAnimate .animated').appear(function () {
                    var $this = $(this);
                    $this.each(function () {
                        if ($this.data('time') != undefined) {
                            setTimeout(function () {
                                $this.addClass('activate').addClass($this.data('fx'));
                            }, $this.data('time'));
                        } else {
                            $this.addClass('activate').addClass($this.data('fx'));
                        }
                    });
                }, {accX: 50, accY: -350});
            }
        }

        //================================================ Modal ==================================================


        var $modal = $('.ct-modal');

        $modal.each(function(){
            var $this = $(this);
            var $modalDialog = $this.find('.ct-modalDialog');
            var $modalContent = $modalDialog.find('.ct-modalContent');
            var $modalContentHeight = $modalContent.height();
            var $footer = $modalContent.find('.ct-modalFooter');

            var $imageBG = $this.attr("data-bg-image");
            var $discountBG = $footer.attr('data-discount-image');

            $modalContent.css('background-image', 'url(\'' + $imageBG + '\')');
            $footer.css('background-image', 'url(\'' + $discountBG + '\')');

            $modalDialog.css("height", $modalContentHeight + "px");

            if($deviceheight < $modalContentHeight){
                $modalDialog.css({
                    "position": "static",
                    "padding-top": "17px"
                })
            }
        });


        var $neverAsk = $('#neverAsk');
        var $laterAsk = $('#laterAsk');
        var $close = $('#modal1 .close');


        var a1 = getCookie("subscribeLocal");
        var a2 = getCookie("subscribeSession");

        if((a1 !== "1") && (a2 !== "1")){
            $('#popup').click();
        }

        $neverAsk.on("click", function(e){
            e.preventDefault();

            setCookie("subscribeLocal", "1", 99999);
            $close.click();

            return false;

        });

        $laterAsk.on("click", function(e){
            e.preventDefault();

            setCookie("subscribeSession", "1", "default");
            $close.click();

            return false;
        });


    });


    $(window).on("load", function() {

        var $preloader = $('.ct-preloader');
        var $content = $('.ct-preloader-content');

        var $timeout = setTimeout(function(){
            $($preloader).addClass('animated').addClass('fadeOut');
            $($content).addClass('animated').addClass('fadeOut');
        }, 0);
        var $timeout2 = setTimeout(function(){
            $($preloader).css('display', 'none').css('z-index', '-9999');
        }, 500);

        $('.ct-js-magnificPopupImage').magnificinfinitescroll();

    });

    $(window).on("load resize", function(){


        //================================================== Slider ====================================================

        var $slider = $('.ct-js-slick');


        $slider.each(function(){
            var $this = $(this);

            if($this.hasClass('ct-slick-arrow--type0') || $this.hasClass('ct-slick-arrow--type6')){
                var $buttons = $this.find('> button');

                var topPosition = 136;

                if($this.hasClass('ct-slick-arrow--type6')){
                    topPosition = 605;
                }
                else{
                    topPosition = 117;
                }

                $buttons.each(function(){
                    $(this).css("top", topPosition + "px");
                });
            }
        });

        $slider.each(function(){
            var $this = $(this);

            if($this.hasClass('ct-slick-arrow--type0') || $this.hasClass('ct-slick-arrow--type6')){
                var $buttons = $this.find('> button');

                var $buttonHeight = $buttons.first().height();
                var $images = $this.find('.item figure .ct-imageBox-container');
                var $imageHeight = 999999;

                $images.each(function(){
                    var height = $(this).height();
                    if(height < $imageHeight){
                        $imageHeight = height;
                    }
                })



                var topPosition = 136;

                if($this.hasClass('ct-slick-arrow--type6')){
                    topPosition = $imageHeight + 33;
                }
                else{
                    topPosition = ($imageHeight / 2) - ($buttonHeight / 2) + 7;
                }

                $buttons.each(function(){
                    $(this).css("top", topPosition + "px");
                });
            }
        });

        var $slickSyncedTypeTwo = $('.ct-slick--synced--type2');

        if ($slickSyncedTypeTwo.length > 0){
            var $sliderheight = $slickSyncedTypeTwo.find('.ct-js-slick-for').height();

            var $slickPrev = $slickSyncedTypeTwo.find('.slick-prev');
            var $slickNext = $slickSyncedTypeTwo.find('.slick-next');

            $slickPrev.css('top', $sliderheight/2 - 20 + 'px');
            $slickNext.css('top', $sliderheight/2 - 20 + 'px');
        }

    });

    $(window).on("scroll", function(){

        var scroll = $(window).scrollTop();

        if (scroll > 300) {
            jQuery('.ct-js-btnScrollUp').addClass('is-active');
        } else {
            jQuery('.ct-js-btnScrollUp').removeClass('is-active');
        }


        if($navbarel.find('.onepage').length <= 0){
            var isTransparent = false;

            if($bodyel.hasClass("navbar--transparent")){
                isTransparent = true;
            }


            if (scroll > 100) {
                $bodyel.removeClass("navbar--transparent");
            } else {
                $bodyel.addClass("navbar--transparent");
            }
        }

        else{
            if (scroll > 100) {
                $bodyel.addClass("navbar--makeSmaller");
            } else {
                $bodyel.removeClass("navbar--makeSmaller");
            }
        }

    });

}(jQuery));