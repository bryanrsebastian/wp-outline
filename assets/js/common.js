( function( $ ) {
	$.noConflict();

	/**
	 * Script On Document Ready
	 */
	
	/* Nicescroll */
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
	/* Nicescroll */

	autoHeight( '.archive-container .details' );

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
	    autoHeight( '.archive-container .details' );
	} );

	/**
	 * Functions
	 */

	/**
	 * Make the height of all selected class becomes automatic depends on the maximum height. 
	 * @param  {[string]} resource [selected class]
	 * @return {[void]}            [automatic change height]
	 */
	function autoHeight( resource ) {
		$( resource ).height( 'auto' );
		var maxHeight = Math.max.apply( null, $( resource ).map( function() {
		    return $( this ).height();
		} ).get() );

		$( resource ).height( maxHeight );
	}
} ) ( jQuery )