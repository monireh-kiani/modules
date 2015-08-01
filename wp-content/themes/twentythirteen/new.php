<?php 

//******************************************
// java script for compliant
//******************************************
?>
<script>
jQuery(document).ready(function( ){
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
			var data = {
				action: 'form_response',
				first_name: name,
				email: email,
				subject: subject,
				criticism_form_message: message 
			}
		
			jQuery.post( admin_url( 'admin-ajax.php' ), data, function( response ){
				if( response ){
					( 'Got this from the server: ' + response );
				}
				else{
					alert( 'error' );
				}
			});	
		}
  });
});
</script>
<?php
 //******************************************
// Add criticism table to database
//******************************************

/*
  Plugin Name: Complaints-suggestions
  Description: Complaints-suggestions
 */
 
function add_criticism_table_to_db(){
	global $wpdb;
	$criticism_table = $wpdb->prefix. 'criticism';
	if( $wpdb->get_var( "SHOW TABLES LIKE '{$criticism_table}'" ) != $criticism_table ){
		$query =
			"CREATE TABLE {$criticism_table} (
			criticism_id BIGINT(20) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY, 
			criticism_name VARCHAR(255) NOT NULL,
			criticism_email VARCHAR(255) NOT NULL,
			criticism_subject VARCHAR(255) NOT NULL,
			criticism_message TEXT NOT NULL
			);";
		require_once( ABSPATH. 'wp-admin/includes/upgrade.php' );
		dbDelta( $query );
	}
}
register_activation_hook(__FILE__, 'add_criticism_table_to_db');


//******************************************
// Add Custom  CSS
//******************************************

function add_form_critism_css() {
	wp_register_style( 'form_complaint_css', get_template_directory_uri() . '/css/form_style.css', false, '1.0' );
	wp_enqueue_style( 'form_complaint_css' );
}
add_action( 'wp_enqueue_scripts', 'add_form_critism_css' );


//*******************************************************
// Template Complaints-suggestions functions
//*******************************************************
/*
 Template Name: Complaints-suggestions
 */
 get_header();
 get_sidebar();
?>
<div class="sfContentBlock moduleTitle"><h4 class = "Critics_heading" ><?php echo __( 'Critics and suggestions', 'twentythirteen' );?></h4></div>
<div id = "notif" class="text"><strong class ="text"><?php echo __( 'user dear', 'twentythirteen' );?> </strong> 
	<p><h4 class = "Critics_notif" ><?php echo __( 'please to write Critical and suggestions in the form below as soon as possible to address them.', 'twentythirteen');?></h4></p> 
</div>
<div class = "form_outer_div" id = "form_outer_div">
	<form action = "enteghad" method = "post"  >
		<div id = "name_wraper" class = "form_fields_wraper" >              
			<label  for = "criticism_form_name" id = "criticism_form_name" ><?php echo  __( 'name', 'twentythirteen' );?> </label>
			<input type = "text" value = "" name = "first_name" id = "first_name" class = "criticism_text_area" style="margin-right:35px" />
		</div>
		<div id = "email_wraper" class = "form_fields_wraper">
			<label for = "criticism_form_email" id = "criticism_form_email"><?php echo  __( 'email', 'twentythirteen' );?> </label>
			<input type = "text" value="" name = "email" id = "email" class = "criticism_text_area" style="margin-right:20px" />
		</div>
		<div id = "subject_wraper" class = "form_fields_wraper">
			<label for = "criticism_form_subject" id = "criticism_form_subject"><?php echo __( 'subject', 'twentythirteen' );?></label>
			<input type = "text" value = "" name="subject" id="subject" class = "criticism_text_area" style="margin-right:8px" />
		</div>
		<div id = "message_wraper" class = "form_fields_wraper">
			<label for = "criticism_form_message" id = "criticism_form_message" style="margin-top:30px"><?php echo __( 'text', 'twentythirteen' );?></label>
			<textarea name = "criticism_form_message" id = "criticism_form_messages" style="margin-top:30px; margin-right:30px" class = "criticism_text_area"  cols = "35" rows = "5" value = ""></textarea>
		</div> 
		<p id="submit_wrapper">
			<input type = "submit" value = "<?php echo __( 'save','twentythirteen' );?>" class = "submit_form"/>
		</p>
	</form>
</div>
<?php
//******************************************
// insert to criticism-table
//******************************************
function form_response(){
	global $wpdb;
	if( !empty( $_POST['first_name'] ) && !empty( $_POST['subject'] ) && !empty( $_POST[ 'email' ] ) && !empty( $_POST[ 'criticism_form_message' ] ) ){
		$criticism_table = $wpdb->prefix . 'criticism';
		$name = sanitize_text_field( $_POST[ 'first_name' ] );
		$email = sanitize_email( $_POST[ 'email' ] );
		$subject = sanitize_text_field( $_POST[ 'subject' ] );
		$message = sanitize_text_field( $_POST[ 'criticism_form_message' ] );
		$headers[] = 'From: \$name\<$email>\n';
		$headers[] = 'Return-Path:  trim( $email )';
		$headers[] = 'Reply-To: trim( $name )';
		$admin_email = get_option( 'admin_email' ); 			
		wp_mail( $admin_email , $subject, $message, $headers ); 
		$data = array(
			'criticism_id' => "",
			'criticism_name' => $name,
			'criticism_email' => $email,
			'criticism_subject' => $subject,
			'criticism_message' => $message
		);
		$format= array('%d','%s','%s','%s','%s');
		$wpdb->insert( $criticism_table , $data , $format );	
	}
	die();
}
add_action( 'wp_ajax_form_response', 'master_response' );
add_action( 'wp_ajax_form_master_response', 'master_response' );
?>


	







