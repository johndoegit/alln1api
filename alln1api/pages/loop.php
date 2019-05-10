<div>
<table class="wp-list-table widefat fixed striped posts">
	<thead> 	
	<tr>
		 
		<th><a href='#'>Key</a></th>
		<th><a href='#'>Date</a></th>
 
		<th><a href='#'>Method</a></th>
		<th><a href='#'>Total request</a></th>
		<th><a href='#'>Last request</a></th>
	</tr>
	</thead>
	<?php 
	foreach($wp_query->posts as $value){
		?>
		<tbody id="the-list" onmouseout='hide_btn("<?php echo $value->ID; ?>");' onmouseover='show_btn("<?php echo $value->ID; ?>");'>
		<tr class="iedit author-self level-0 post-54 type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized entry">	
			 <td><a id='alln1api_url'   href='#'><strong><?php echo $value->post_title; ?></strong></a></td>
			 <td><?php echo $value->post_date; ?></td>
			 <td><?php echo $value->post_content_filtered; ?></td>
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
		<tr style='visibility: hidden;' id='alln1api_bottom_menu_<?php echo $value->ID; ?>'>
				<td style='padding-left: 40px;' colspan='5' >
					<?php 
						if($current_page == 'Deleted'){
					?>
					<span><a href='?page=alln1api&restore=<?php echo $value->ID; ?>' >restore</a> | <a style='color:red;' href='?page=alln1api&remove=<?php echo $value->ID; ?>'>delete!</a></span>
					<?php
						   }else{
					?>
					<span><a href='?page=alln1edit&id=<?php echo $value->ID; ?>' >edit</a> | <a href='?page=alln1api&delete=<?php echo $value->ID; ?>'>delete</a> | <a target='_blank' href='<?php echo site_url('').''.PLUGINURL.'/?api_key='.$value->post_title; ?>'>view</a></span>
					<?php  } ?>
				</td>
		</tr>
		</tbody>	
		<?php
	}
	?>
</table>
</div>