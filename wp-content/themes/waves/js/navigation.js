window.nav = (function( window, document, $, Waypoint ) {

	var nav = {};

	nav.cache = function() {
		nav.$wrapper = $('.site-navigation');
		nav.$menu = $('#primary-menu');
		nav.$trigger = $('.header-menu-trigger');
	};

	nav.init = function() {
		nav.cache();

		nav.assignListeners();
		nav.controller();

		nav.sticky();
	};

	nav.controller = function() {

		nav.$trigger.on( 'click', function( e ) {
			e.preventDefault();
			if( ! nav.$wrapper.hasClass( 'site-navigation--visible' ) ) {
				nav.$wrapper.addClass( 'site-navigation--visible' );
			} else {
				nav.$wrapper.removeClass( 'site-navigation--visible' );
			}
		});
	};

	nav.assignListeners = function() {
		nav.$menu.find( '.submenu > a' ).on( 'click', function( e ) {
			if( !nav.isMenuOpen() ) {
				return;
			}

			e.preventDefault();

			var $this = $(this);

			if( nav.checkSelected( nav.$menu ) ) {
				//check if this is selected

				if( $this.hasClass( 'selected' ) && $this.next('.dropdown').hasClass('dropdown--open')) {
					$this.next('.dropdown').removeClass('dropdown--open');
				} else if ( $this.hasClass('selected') && !$this.next('.dropdown').hasClass('dropdown--open')) {
					$this.next('.dropdown').addClass('dropdown--open');
				} else {
					nav.$activeItem.removeClass('selected');
					nav.$activeItem.next('.dropdown').removeClass('dropdown--open');
					$this.addClass('selected');
					$this.next('.dropdown').addClass('dropdown--open');
					nav.$activeItem = $this;
				}
			} else {
				$this.next('dropdown').addClass('dropdown--open');
				$this.adClass('selected');
				nav.$activeItem = $this;
			}
		});
	};

	nav.isMenuOpen = function() {
		if( nav.$wrapper.hasClass( '.site-navigation--visible' ) && window.innerWidth < 960 ) {
			return true;
		} else {
			return false;
		} 
	};

	nav.checkSelected = function( menu ) {
		return menu.find( '.submenu > a.selected').length != 0;
	};

	nav.sticky = function() {
		var $header = $('.header-wrapper'), // the header
			$hHeight = $header.height(), // get the height of the header#header to use later as starting point
			prevTop = $(window).scrollTop(); // set the initial position to current positon on page

		var navMenu = new Waypoint.Sticky({
			element: $header,
			offset: function(){
				if(Waypoint.viewportWidth() <= 959){
					return -15;
				} else {
					return -120;
				}
			}

		});

		$(window).on('scroll', function(e){
			st = $(this).scrollTop(); // set tht scroll location
			if( st > prevTop && st > $hHeight ) {
				$header.addClass('global-header-scrolling');
				$header.removeClass('global-header-initial');
			} else {
				if( st <= 0 ) {
					$header.removeClass('global-header-scrolling');
					$header.removeClass('global-header-hide');
					$header.removeClass('global-header-initial');
				} else if( st < $hHeight ) {
					$header.addClass('global-header-initial');
				} else {
					$header.removeClass('global-header-scrolling');
					$header.addClass('global-header-hide');
				}
			}
			prevTop = st;
		});

	};

	$(document).ready( nav.init );

	return nav;
})( window, document, jQuery, Waypoint )