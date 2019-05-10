<div>
	<ul class="subsubsub">
		<li class="all"><a href="?page=alln1api" class="<?php echo $alln1api_view_all; ?>" aria-current="page">All <span class="count">(<?php echo count($alln1api_all); ?>)</span></a> |</li>
		<li class="publish"><a class="<?php echo $alln1api_view_deleted; ?>" href="?page=alln1api&viewdeleted=1">Deleted <span class="count">(<?php echo count($alln1api_all_deleted); ?>)</span></a> </li>
	</ul>	
</div>
<div style='clear:both;'></div>
<div>
<hr>
<table class="wp-list-table widefat fixed striped posts">
			<?php
				$max_pages = $wp_query->max_num_pages;
				if($max_pages > 1){
					for($a = 1; $a <= $max_pages; $a++){
						if($page == $a){ $alln1_current_page_class = 'alln1_current_page'; }else{ $alln1_current_page_class = 'alln1_current_page_not_current'; }
						echo "	
								 
								<form action='' method='POST' >
								<input type='hidden' value='".$a."' name='alln1_current_page'> 
							 	<span><button class='button action' id='".$alln1_current_page_class."' type=submit name='alln1_current_page_post' >".$a."</button></span>
							 	</form>
							 	</th>
							 ";
					}
				}
			 ?>
 </table>
 </div>