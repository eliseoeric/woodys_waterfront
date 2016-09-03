window.nav = (function( window, document, $ ) {

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
	};

	nav.controller = function() {

		nav.$trigger.on( 'click', function( e ) {
			e.preventDefault();
			console.log('click fired');
			if( ! nav.$wrapper.hasClass( 'site-navigation--visible' ) ) {
				console.log('step 1');
				nav.$wrapper.addClass( 'site-navigation--visible' );
			} else {
				console.log('step 2');
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
	}

	$(document).ready( nav.init );

	return nav;
})( window, document, jQuery )