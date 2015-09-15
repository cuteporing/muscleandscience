var loginController = (function() {
	var loginBtn = $('#loginBtn');

	function loginUser(e) {
		e.preventDefault();
		var data = {};
		data.username = $('#username').val();
		data.password = $('#password').val();
		
		var options = new OPTIONS( "loginUser" );
		options.setURL( $(this).parents('form').attr('action') );
		options.setData( data );
		
		var posting = common.sendPost( options );

		posting.done(function( data ) {
			list = new LIST( data );
			
			if( list.getErrorCode()!= "" ){
				alert( list.getErrorMsg() );
			} else {
				var data = list.getData();
				if( data.hasOwnProperty("redirect") )
					window.location.assign( data.redirect );
			}
		});
		return false;
	}
	
	loginBtn.bind( "click", loginUser );
})();