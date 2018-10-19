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