jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},
		speed:'fast'
	});
});

function travel_booking_agency_menu_open() {
	jQuery(".side-menu").addClass('open');
}
function travel_booking_agency_menu_close() {
	jQuery(".side-menu").removeClass('open');
}

function travel_booking_agency_search_show() {
	jQuery(".search-outer").addClass('show');
	jQuery(".search-outer").fadeIn();
}
function travel_booking_agency_search_hide() {
	jQuery(".search-outer").removeClass('show');
	jQuery(".search-outer").fadeOut();
}

(function( $ ) {
	// Back to top
	jQuery(document).ready(function () {
    jQuery(window).scroll(function () {
      if (jQuery(this).scrollTop() > 0) {
      	jQuery('.scrollup').fadeIn();
      } else {
        jQuery('.scrollup').fadeOut();
      }
    });
    jQuery('.scrollup').click(function () {
      jQuery("html, body").animate({
        scrollTop: 0
      }, 600);
      return false;
    });
	});

	// Window load function
	window.addEventListener('load', (event) => {
		jQuery(".preloader").delay(2000).fadeOut("slow");
	});

})( jQuery );

( function( window, document ) {
	function travel_booking_agency_keepFocusInMenu() {
		document.addEventListener( 'keydown', function( e ) {
			const travel_booking_agency_nav = document.querySelector( '.side-menu' );

			if ( ! travel_booking_agency_nav || ! travel_booking_agency_nav.classList.contains( 'open' ) ) {
				return;
			}

			const elements = [...travel_booking_agency_nav.querySelectorAll( 'input, a, button' )],
				travel_booking_agency_lastEl = elements[ elements.length - 1 ],
				travel_booking_agency_firstEl = elements[0],
				travel_booking_agency_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && travel_booking_agency_lastEl === travel_booking_agency_activeEl ) {
				e.preventDefault();
				travel_booking_agency_firstEl.focus();
			}

			if ( shiftKey && tabKey && travel_booking_agency_firstEl === travel_booking_agency_activeEl ) {
				e.preventDefault();
				travel_booking_agency_lastEl.focus();
			}
		} );
	}
	
	function travel_booking_agency_keepfocus_search() {
		document.addEventListener( 'keydown', function( e ) {
			const travel_booking_agency_search = document.querySelector( '.search-outer' );

			if ( ! travel_booking_agency_search || ! travel_booking_agency_search.classList.contains( 'show' ) ) {
				return;
			}

			const elements = [...travel_booking_agency_search.querySelectorAll( 'input, a, button' )],
				travel_booking_agency_lastEl = elements[ elements.length - 1 ],
				travel_booking_agency_firstEl = elements[0],
				travel_booking_agency_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && travel_booking_agency_lastEl === travel_booking_agency_activeEl ) {
				e.preventDefault();
				travel_booking_agency_firstEl.focus();
			}

			if ( shiftKey && tabKey && travel_booking_agency_firstEl === travel_booking_agency_activeEl ) {
				e.preventDefault();
				travel_booking_agency_lastEl.focus();
			}
		} );
	}

	travel_booking_agency_keepFocusInMenu();

	travel_booking_agency_keepfocus_search();
} )( window, document );

jQuery(document).ready(function () {
	jQuery( ".tablinks" ).first().addClass( "active" );
});

function travel_booking_agency_project_tab(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  jQuery('#'+ cityName).show()
  evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
	jQuery('.tabcontent').hide();
	jQuery('.tabcontent:first').show();
});