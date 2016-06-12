( function ( $ ) {

    "use strict";

    window.Marvy = {
        init: function () {
            this.MobileMenu();
            this.sliderParallax();
            this.windowOnLoad();
        },
        MobileMenu: function () {
            $( '.menu-toggle' ).click( function ( e ) {
                e.preventDefault();
                $( 'body' ).toggleClass( 'animate-nav' );
            } );

            $( '.nav-overlay' ).on( 'click', function ( ) {
                $( 'body' ).removeClass( 'animate-nav' );
            } );
        },
        sliderParallax: function () {
            var $slideContent = $( '.home-banner .grid-cell-center' ),
                isNoTouch = $( 'html' ).hasClass( 'no-touch' ),
                range = 200;

            if ( $slideContent.size() === 0 ) {
                return;
            }

            $( window ).bind( 'scroll', function ( e ) {
                var yPos = $( this ).scrollTop(),
                    offset = $slideContent.offset().top,
                    height = $slideContent.outerHeight(),
                    centerValignVal = Math.max( 0, Math.max( yPos / 3.2, 0 ) );

                offset = offset + height / 2;
                var calc = 1 - ( yPos - offset + range ) / range;

                $slideContent.css( { 'opacity': calc } );

                if ( calc > '1' ) {
                    $slideContent.css( { 'opacity': 1 } );
                } else if ( calc < '0' ) {
                    $slideContent.css( { 'opacity': 0 } );
                }

                if ( isNoTouch ) {
                    $slideContent.css( {
                        "transform": "translate3d(0, " + centerValignVal + "px, 0)",
                        "-webkit-transform": "translate3d(0, " + centerValignVal + "px, 0)",
                        "-moz-transform": "translate3d(0, " + centerValignVal + "px, 0)"
                    } );
                }
            } );
        },
        windowOnLoad: function () {
            $( window ).on( 'load', function () {

            } );
        }
    };

    $( document ).on( 'ready', function () {
        Marvy.init();
    } );

} )( jQuery );