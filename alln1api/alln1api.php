<?php

/**
 * Plugin Name: alln1api
 * Plugin URI:  
 * Version:     1.0
 * Description: <a target='_blank' href='../wp-content/plugins/alln1api/readme.html'> ReadMe! </a>
 * Author:      <a target='_blank' href='http://gregoriobalonzo.ml'>http://gregoriobalonzo.ml</a>
 * Author URI:  
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: gregoriobalonzo.ml
 */

date_default_timezone_set("Asia/Manila"); 
define('ALLNONEAPI',plugin_dir_path(__FILE__));
define('PLUGINNAME','alln1api');
define('PLUGINURL','/wp-content/plugins/alln1api');
 
 
  
 
/**
 * Register a custom menu page.
 * 
 * 
 */
 function alln1api_add_menu(){
     add_menu_page( 
         __( 'ALL-API'),
         'alln1api-sql',
         'manage_options',
         'alln1api',
         'alln1api_home_menu'
     );  
     
     add_menu_page( 
         __( 'Create'),
         'Create',
         'manage_options',
         'alln1create',
         'alln1api_create_menu'
     );     
  
     add_menu_page( 
         __( 'ALL-API-Edit'),
         'ALL-API-Edit',
         'manage_options',
         'alln1edit',
         'alln1api_edit_menu'
     );       
     
 }
 
 
 /**
  * Hide admin mune but can visit
  *
  */
 function hide_menu(){
 	remove_menu_page('alln1create');
 	remove_menu_page('alln1edit');
 }
 
 add_action( 'admin_menu', 'alln1api_add_menu' );
 add_action( 'admin_init', 'hide_menu' );
 
 

/**   
 * Display a custom menu page
 * 
 * 
 */
function alln1api_home_menu(){
	include trailingslashit( dirname(__FILE__) ).'pages/home.php';
}
function alln1api_create_menu() {
	include trailingslashit( dirname(__FILE__) ).'pages/create.php';
}
 
function alln1api_edit_menu() {
    include trailingslashit( dirname(__FILE__) ).'pages/edit.php';
}

   