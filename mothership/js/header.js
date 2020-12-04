jQuery( document ).ready(function() {
	    jQuery("#show-searchbox").on("click", function(){
	    	$('#hc_hero_search').toggleClass('search-active');
	    	$('#show-searchbox').toggleClass('show-searchbox-active');
	    	$('#s').focus();
	    });

		// Get the modal
		var modal = document.getElementById('hc_hero_search');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		  if (event.target == modal) {
		    $('#hc_hero_search').toggleClass('search-active');
			    	$('#show-searchbox').toggleClass('show-searchbox-active');
		  }
		}
}); //End Document Ready