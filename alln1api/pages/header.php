<?php
include ALLNONEAPI.'/include/styles.php';
include ALLNONEAPI.'/include/Func.php';
global $wpdb;
$current_page = 'Home';


/*
	Delete 
*/
if(isset($_GET['page'])  && isset($_GET['delete'])){
	$id = $_GET['delete'];
	$wpdb->get_results("UPDATE wp_posts SET post_status = 'trash' WHERE ID = '$id' ");
}

/*
	Remove Deleted
*/
if(isset($_GET['page'])  && isset($_GET['remove'])){
	$id = $_GET['remove'];
	$wpdb->get_results("DELETE FROM wp_posts WHERE ID = '$id' ");
	$wpdb->get_results("DELETE FROM wp_postmeta WHERE post_id = '$id' ");
}





/*
	Restore Deleted
*/
if(isset($_GET['page'])  && isset($_GET['restore'])){
	$current_page = 'Deleted';
	$id = $_GET['restore'];
	$wpdb->get_results("UPDATE wp_posts SET post_status = 'publish' WHERE ID = '$id' ");
	$wp_query = new WP_Query( array( 'post_type' => 'alln1api','post_status' => 'trash'));
	$alln1api_view_all = '';
	$alln1api_view_deleted = 'current';	 
}

/*
	for home page 
*/
if(isset($_POST['alln1_current_page_post'])){
	$page = $_POST['alln1_current_page'];
}else{
	$page = 1;
}
$wp_query = new WP_Query( array( 'post_type' => 'alln1api','posts_per_page' => 10, 'paged' => $page)); 
$alln1api_all = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'alln1api' AND post_status = 'publish' ");	
$alln1api_all_deleted = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'alln1api' AND post_status = 'trash' ");	

/*
	Edit page 
*/ 
if(isset($_GET['page'])  && isset($_GET['id'])){
	$current_page = 'Edit';
	$id = $_GET['id'];
	
	if(isset($_POST['alln1api_clear_logs'])){
		$wpdb->get_results("UPDATE  wp_posts SET comment_count = 0 WHERE ID = '$id' ");	
		$wpdb->get_results("DELETE FROM wp_postmeta WHERE post_id = '$id' ");	
	}

	if(isset($_POST['alln1api_update_method'])){
		$method = $_POST['alln1api_request_method'];
		$sql = $wpdb->get_results("UPDATE wp_posts SET post_content_filtered = '$method' WHERE ID = '$id' ");
	}

	    $wp_query = new WP_Query( array( 'post_type' => 'alln1api', 'p' => $id)); 
		$sql = $wpdb->get_results("SELECT * FROM wp_postmeta WHERE post_id = '$id' ORDER BY meta_id DESC ");	 
}


/*
	View Deleted
*/
if(isset($_GET['page'])  && isset($_GET['viewdeleted']) || isset($_GET['restore']) || isset($_GET['remove'])){
	$current_page = 'Deleted';
	$wp_query = new WP_Query( array( 'post_type' => 'alln1api','post_status' => 'trash')); 
	$alln1api_view_all = '';
	$alln1api_view_deleted = 'current';
	}else{
	$alln1api_view_all = 'current';
	$alln1api_view_deleted = '';
}


 
$alln1api = new Func(); 

/* 
	for create page 
*/
$alln1api->submit_api();




 