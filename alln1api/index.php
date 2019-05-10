<?php 
require_once("./include/settings.php");
header('Content-Type: application/json'); 

 
function add_visitor($id){
	$data = $_SERVER['SERVER_ADDR'].'--'.$_SERVER['HTTP_USER_AGENT'].'--'.$_SERVER['REQUEST_METHOD'].'--'.time();
	add_post_meta( $id, 'visitor',$data); 	
}
 
 
	$visitor = time();
	$apikey = $_GET['api_key']; 
	$api_query = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "posts WHERE post_title = '$apikey' && post_type = 'alln1api' ");
	$req_method = $api_query[0]->post_content_filtered;
	add_visitor($api_query[0]->ID);
	$method = '';
	if($req_method == 'POST'){
		$method = $_POST['api_key'];
	}else{
		$method = $_GET['api_key'];
	}
	 
	

if(isset($method)){
	$visit = $api_query[0]->comment_count+1;
	$api_query_update = $wpdb->get_results( "UPDATE " . $wpdb->prefix . "posts SET comment_count = $visit, post_excerpt = '$visitor' WHERE post_title = '$apikey' AND post_type = 'alln1api' ");
	if(count($api_query) > 0){
		$api_query_content = $wpdb->get_results($api_query[0]->post_content);
		echo json_encode($api_query_content);
	}else{
		header("HTTP/1.0 404 Not Found");
		exit();
	}
}else{
		header("HTTP/1.0 404 Not Found");
		exit();
} 


?>