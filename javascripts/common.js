$(document).ready(function() {
    /// make loader hidden in start
    $('#Loading1').hide();   
	$('#Loading2').hide(); 
	function finishAjax(id, response){
	  $('#'+id).html(unescape(response));
	  $('#'+id).fadeIn();
	}
/*    $('#registeremail').blur(function(){
	var a = $("#registeremail").val();
	var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
       // check if email is valid
	if(filter.test(a)){
                // show loader 
		$('#Loading1').show();
		$.post("check_email_availablity", {
			email: $('#registeremail').val()
		}, function(response){
                        //#emailInfo is a span which will show you message
			$('#Loading1').hide();
			setTimeout(finishAjax('Loading1', escape(response)), 400);
		});
		return false;
	}
});

	$('#registerusername').blur(function(){
	   
		// show loader 
		$('#Loading2').show();
		$.post("check_username_availablity", {
			username: $('#registerusername').val()
		}, function(response){
                        //#emailInfo is a span which will show you message
			$('#Loading2').hide();
			setTimeout(finishAjax('Loading2', escape(response)), 400);
		});
		
});*/

 
});


