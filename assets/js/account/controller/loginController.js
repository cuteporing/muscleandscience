var loginController = (function() {
	var loginBtn = $('#loginBtn');
	var loginForm = $('#login-form');
	
	function errorMsg( msg ) {
		if(msg) {
			$('.error-msg .msg').html( msg );
			
			if( $('.error-msg').attr("role") ) {
				$('.error-msg').slideDown(300);
			}
		} else {
			$('.error-msg .msg').html( '&nbsp;' );
			if( $('.error-msg').attr("role") ) {
				$('.error-msg').slideUp(300);
			}
		}
	}

	loginForm.on("submit", function(e){
		e.preventDefault();
		
		if( !$('#username').val().length > 0 || !$('#password').val().length > 0)
			return;
		
		var data = {};
		data.username = $('#username').val();
		data.password = $('#password').val();
		
		var options = new OPTIONS( "loginUser" );
		options.setURL( $(this).attr('action') );
		options.setData( data );
		
		var posting = common.sendPost( options );

		posting.done(function( data ) {
			list = new LIST( data );
			
			if( list.getErrorCode()!= "" ){
				errorMsg(list.getErrorMsg());
			} else {
				var data = list.getData();
				if( data.hasOwnProperty("redirect") )
					window.location.assign( data.redirect );
			}
		});
		loginForm.find('input').on("keydown",function(){
			errorMsg();
		});
	});
	
})();