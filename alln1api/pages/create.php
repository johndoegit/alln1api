<?php 
include ALLNONEAPI.'pages/header.php';



?> 

<div class="wrap">
 
<div>
<a href="?page=alln1api" class="page-title-action">< < < Back &nbsp; </a>
<h1 class="wp-heading-inline">&nbsp;  Add New API</h1>
</div>


<div id="ajax-response"></div>

<p>Create an api link with customer query.</p> 
<form method="post"  action="" class="form-table" >
<input name="action" type="hidden" value="createalln1api">
<table class="wp-list-table widefat fixed striped posts">
	<thead>
		<tr>
			<th style='width:50%;'>Name</th>
			<th style='width:50%;'>Value</th>
		</tr>
	</thead>
	<tbody id="the-list">
	<tr class="form-field form-required">
		<th style='width:50%;' ><label for="alln1api_level">API  <span class="description">(type)</span></label></th>
		<td style='width:50%;'>
		<select name='query_select' onchange='show_selected(this)' id='alln1api_level'>
			<option value=''></option>
			<option value='single'>single</option>
			<option value='singlewhere'>single with where</option>
			<option value='linkquery'>table with where with link table</option>
			<option value='three_tables'>link 3 tables</option>
		</select>		
		</td>
	</tr> 
	<tbody id="the-list">
	<tr class="form-field form-required">
		<th style='width:50%;' ><label for="alln1api_level">Method  <span class="description">(POST/GET)</span></label></th>
		<td style='width:50%;'>
		<select name='alln1api_method' required id='alln1api_method'>
			<option value='GET'>GET</option>
			<option value='POST'>POST</option>
		</select>		
		</td>
	</tr> 

	</tbody>

	<tbody id='single' style='visibility:hidden; position: absolute;' >
	<tr class="form-field form-required">
		<th  ><label for="single_option">Select table<span class="description"> (database table)</span></label></th>
		<td><?php echo $alln1api->single('wp001','single_option','single_option'); ?></td>
	</tr>	
	
	</tbody>

	<tbody id='singlewhere' style='visibility:hidden; position: absolute;' >
	<tr class="form-field form-required">
		<th  ><label for="singlewhere_option">Select table<span class="description"> (database table)</span></label></th>
		<td><?php echo $alln1api->singlewhere('wp001','singlewhere_option','singlewhere_option'); ?></td>
	</tr>
	
	<tr class="form-field form-required">
		<th  ><label for="singlewhere_option2">Value of the selected coloumn <br><span class="description"> (enter the value of the selected radio input above)</span></label></th>
		<td><input type='text' name='singlewhere_col_value' value=''></td> 
	</tr>
	</tbody>



	<tbody id='linkquery' style='visibility:hidden; position: absolute;'>
	<tr  class="form-field form-required">
		<th  ><label for="singlewhere_option2">Select table and its column <br><span class="description"> (value of the column here will be match below)</label></th>
		<td><?php echo $alln1api->linkquery1('wp001','linkquery_option1','linkquery_1'); ?></td> 
	</tr>

	<tr  class="form-field form-required">
		<th  ><label for="singlewhere_option2">Select table and its column <br><span class="description"> (value of the column here will be match above)</label></th>
		<td><?php echo $alln1api->linkquery2('wp001','linkquery_option2','linkquery_2'); ?></td> 
	</tr>
	
	<tr  class="form-field form-required">
		<th  ><label for="api_all_table">Add condition <br><span class="description"> ( ex:  select * from wp_posts,wp_postmeta where wp_posts.ID = wp_postmeta.post_id <b style="color:red;">AND wp_posts.ID = '3'</b> sample input value is the red color ) <br></label></th>
		<td><input type='text' name='add_condition'></td> 
	</tr>		
 	</tbody>

<tbody id='three_table' style='visibility:hidden; position: absolute;'>
	<tr id=''  class="form-field form-required">
		<th  style='width:50%;' ><label>First table:<i id='three_table1_id1'></i></label></th>
		<td style='width:50%;'> <?php echo $alln1api->three_table1('wp001','three_table1_form1','three_table1_id1'); ?></td>
	</tr>
	<tr id=''  class="form-field form-required">
		<th  style='width:50%;' ><label>Second table:<i id='three_table1_id2'></i></label></th>
		<td style='width:50%;'> <?php echo $alln1api->three_table1('wp001','three_table1_form2','three_table1_id2'); ?></td>
	</tr>
	<tr id=''  class="form-field form-required">
		<th  style='width:50%;' ><label>Third table:<i id='three_table1_id3'></i></label></th>
		<td style='width:50%;'> <?php echo $alln1api->three_table1('wp001','three_table1_form3','three_table1_id3'); ?></td>
	</tr>	
	<tr id=''  class="form-field form-required">
		<th  ><label for="api_all_table">Add condition <br><span class="description"> ( ex: <b style="color:red;">AND wp_posts.ID = '3'</b> sample input value is the red color )<br></label></th>
		<td><input type='text' name='three_tbl_add_condition' autocomplete="off" required value="AND "></td> 
	</tr>	
</tbody>



 	

</table>

 

<p class="submit"><input type="submit" name="submit_allin1api" id="createalln1apisub" class="button button-primary" value="Submit"></p>
</form>
</div>
<?php 
include ALLNONEAPI.'pages/footer.php';
?>


