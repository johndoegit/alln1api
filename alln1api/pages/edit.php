<?php 
include ALLNONEAPI.'pages/header.php';

?>
<div class="wrap">

	<div>
	<a href="?page=alln1api" class="page-title-action">< < < Back &nbsp; </a>
	<h1 class="wp-heading-inline">&nbsp;  All N 1 API</h1>
	</div>

<?php
if(isset($_GET['page']) && isset($_GET['id'])){
?> 
<table class="wp-list-table widefat fixed striped posts">
	<thead> 	
	<tr>
		<th><a href='#'>Key</a></th>
		<th><a href='#'>Date</a></th>
		<th><a href='#'>Method</a></th>
		<th><a href='#'>Total request</a></th>
		<th><a href='#'>Last request</a></th>
	</tr>
<?php  
foreach ($wp_query->posts as $key => $value) {
	?>
	<tr>
		<td><input type='text' id='alln1api_field' readonly value="<?php echo $value->post_title; ?>"></td>
		<td><?php echo $value->post_date; ?></td>
		<td>
			<form action='' method="POST">
				<select name='alln1api_request_method'>
					<option value="<?php echo $value->post_content_filtered; ?>"><?php echo $value->post_content_filtered; ?></option>
					<option value="GET">GET</option>
					<option value="POST">POST</option>
				</select>
				<input type='submit' class="page-title-action" name='alln1api_update_method' value='Update!'>
			</form>
		</td>
		<td><?php echo $value->comment_count; ?></td>
		  	 <td>
		  	 	<?php
		  	 	 $lasst_request = time() - $value->post_excerpt;
		  	 	 if($value->post_excerpt != ''){
		  	 	 	echo date('i',$lasst_request).' minutes ago.';
		  	 	 }
		  	 	?>
		  	 </td>
	</tr>
	<?php
}
?>
</table>
<?php
}else{
		header("HTTP/1.0 404 Not Found");
		exit();
}
?>
	<div>
	<h1 class="wp-heading-inline">&nbsp; API Logs</h1>
	<form action='' method="POST">
		<input type='hidden' name='key' value="<?php echo $id; ?>">
		<input type='submit' class="page-title-action" name='alln1api_clear_logs' value='Clear logs!'>
	</form>
	</div>

<table class="wp-list-table widefat fixed striped posts">
	<thead> 	
	<tr>
		<th><a href='#'>IP Address</a></th>
		<th><a href='#'>Date</a></th>
		<th><a href='#'>User Agent</a></th>
		<th><a href='#'>Request method</a></th>
	</tr>
<?php
foreach($sql as $value){
	$visitor = explode('--',$value->meta_value);
	?>
	<tr>
		<td><?php echo $visitor[0]; ?></td>	
		<td><?php echo date('F, d, Y H:i:s',$visitor[3]); ?></td>	
		<td><?php echo $visitor[1]; ?></td>	
		<td><?php echo $visitor[2]; ?></td>	
	</tr>
	<?php
}
?>
</div>	 

<?php 
include ALLNONEAPI.'pages/footer.php';
?>
