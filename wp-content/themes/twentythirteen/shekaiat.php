<?php
/*
 Template Name: Complaints-suggestions
 */
get_header();
get_sidebar();
?>
<div class="sfContentBlock moduleTitle"><h4 class = "Critics_heading" ><?php echo __( 'Critics and suggestions', 'twentythirteen' );?></h4></div> 
<div id = "notif" class="text" style = " background-color:orange; margin-right:200px; margin-left:400px; "><strong class ="text"><?php echo __( 'user dear', 'twentythirteen' );?> </strong> 
	<p><h4 class = "Critics_notif"><?php echo __( 'please to write Critical and suggestions in the form below as soon as possible to address them.', 'twentythirteen');?></h4></p> 
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
			<textarea name = "criticism_form_message" id = "criticism_form_messages" style="margin-top:30px;margin-right:30px" class = "criticism_text_area"  cols = "35" rows = "5" value = ""></textarea>
		</div> 
		<p id="submit_wrapper">
			<input type = "submit" value = "<?php echo __( 'save','twentythirteen' );?>" class = "submit_form"/>
		</p>
	</form>
</div>
<?php  form_response();?>
	
	
	