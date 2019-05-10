<?php 
include ALLNONEAPI.'pages/header.php';

?>
<div class="wrap">

	<div>
	<h1 class="wp-heading-inline">All N 1 API</h1>
	<a href="?page=alln1create" class="page-title-action">Add New</a>
	</div>

<?php
if(isset($_GET['alln1edit'])){

}else{ ?>

<?php include ALLNONEAPI.'pages/paged.php'; ?>
<?php include ALLNONEAPI.'pages/loop.php'; ?>
<?php include ALLNONEAPI.'pages/paged.php'; ?>

<?php } ?>

</div>	 

<?php 
include ALLNONEAPI.'pages/footer.php';
?>
