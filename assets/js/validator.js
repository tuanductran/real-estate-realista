( function($) {
  'use strict';


	/*-------------------------------------------------------------------------------
	  Ajax Form
	-------------------------------------------------------------------------------*/

	$('.submit').on('click', function(){
	   if($('#name').val() != '' && $('#email').val() != ''){
	   		$(".success-message").show();
	   		$(".error-message").hide();
		}
	});


	$('.submit').on('click', function(){
	   if($('#name').val() == ''){
	   		$("#name").addClass("required");
	   		$(".error-message").show();
	   }
	   else {
	   		$("#name").removeClass("required");
	   }
	   if($('#email').val() == ''){
	   		$("#email").addClass("required");
	   		$(".error-message").show();
	   }
	   else {
	   		$("#email").removeClass("required");
	   }
	});



	// if ($('.js-ajax-form').length) {
	// 	$('.js-ajax-form').each(function(){
	// 		$(this).validate({
	// 			errorClass: 'error wobble-error',
	// 		    submitHandler: function(form){
	// 	        	$.ajax({
	// 		            type: "POST",
	// 		            url:"http://localhost/next-property/wp-comments-post.php",
	// 		            data: $(form).serialize(),
	// 		            success: function() {
	// 	                	$('.col-message, .success-message').show();
	// 	                },

	// 	                error: function(){
	// 		            }
	// 		        });
	// 		    }
	// 		});
	// 	});
	// }
})(jQuery);
