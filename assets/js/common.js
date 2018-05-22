( function( $ ) {
    $.noConflict();

    /**
     * Script On Document Ready
     */
    
    /* Initialize Nicescroll */
    var args = {
        cursorwidth: 4,
        cursorcolor: '#000',
        zindex: 9999999,
        horizrailenabled: false,
        cursorborderradius: 3,
        cursorborder: "1px solid #000",
        background: "transparent",
        autohidemode: true
    };

    $( 'body' ).niceScroll( args );
    
    /* Initialize Object Fit */
    objectFitImages();

    /**
     * Script On Scroll
     */
    $( document ).scroll( function() {
        
    } );

    /**
     * Script On Load
     */
    $( window ).load( function() {
        
    } );

    /**
     * Script On Resize
     */
    $( window ).resize( function() {

    } );

    /**
     * Functions
     */
} ) ( jQuery )