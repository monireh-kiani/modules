<?php
/*
  Plugin Name: Modules
  Description: Modules
 */
 
 
//******************************************
// Add criticism table to database
//******************************************
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
?>