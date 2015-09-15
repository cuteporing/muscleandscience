//--------------------------------------------------------------------
// COMMON CONTROLLER
//-------------------------------------------------------------------
var common = {
	
	/**
	 * SEND POST
	 * @param (object) options
	 */
	sendPost: function( options ) {
		console.info( '-- sendPost' );
		console.log( options );
		var posting = $.post( options.getURL(), options.getData() );
			
		return posting;
	}
};