jQuery(document).ready(function($){
	jQuery('.submit_form').click(function(){
		var count = 0;
		var name = jQuery( "input#first_name" ).val();
		var email = jQuery( "input#email" ).val();
		var subject = jQuery( "input#subject" ).val();
		var message = jQuery( "textarea#criticism_form_messages").val();	 		
		var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		var validate_email = regex.test( email );
	
		if( validate_email == false){ 
			count++;
			jQuery( "input#email" ).css( {"border": "2px solid red"} );
		}
		else{
			jQuery( "input#email").css( {"border": "solid 1px #09C"} );
		}
		if( message == false ){
			count++;
			jQuery( "#criticism_form_messages").css( {"border": "2px solid red"} );  
		}
		else{
			jQuery( "#criticism_form_messages" ).css( {"border": "solid 1px #09C"} );
        }
		if( name == false ){
			count++;
			jQuery("input#first_name").css( {"border": "2px solid red"} );  
		}
		else{
			jQuery( "input#first_name" ).css( {"border": "solid 1px #09C"} ); 
		}
		if( subject == false ){
			count++;
			jQuery( "input#subject" ).css( {"border": "2px solid red"} );  
		}
		else{  
			jQuery( "input#subject" ).css( {"border": "solid 1px #09C"} );  
		}
		if( count == 0 ){
			 document.getElementById("form_outer_div").innerHTML = ajax_object.str;
			var data = {
				action: 'form_response',
				name: name,
				email: email,
				subject: subject,
				message: message 
			}
			jQuery.post( ajax_object.ajax_url, data, function( response){
				if( response ){
			
				}
			});
		}	
  });
});

