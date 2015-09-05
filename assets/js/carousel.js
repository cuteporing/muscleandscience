$(document).ready(function()  {	
	//vertical carousel
	$("#recent_post, #latest_tweets").tinycarousel({
		axis:"y",
		infinite: false 
	});
	
	if( $("#upcoming").length > 0 ) {
		$("#upcoming").tinycarousel({ interval: true });
		var upcoming = $("#upcoming").data("plugin_tinycarousel"); //auto start
		upcoming.start(); 
	}
});
