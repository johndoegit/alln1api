<?php

class Func {


function __construct() {
global $wpdb;
global $wp_roles;
}

public function table($table){
global $wpdb;
$sql = $wpdb->get_results("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='$table' ");
return $sql;
}

public function single($table,$form_name,$id){
global $wpdb;
$sql = $wpdb->get_results("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='$table' ");
?>
 
<select name='<?php echo $form_name; ?>' onchange='show_column(this,"<?php echo $id; ?>")'   id='<?php echo $id; ?>'>
	<option></option>
<?php
for($a = 0; $a <= count($sql) - 1; $a++){
	?><option value="<?php echo $sql[$a]->TABLE_NAME; ?>"><?php echo $sql[$a]->TABLE_NAME; ?></option><?php	
}
?></select>
<?php 
}

public function singlewhere($table,$form_name,$id){
global $wpdb;
$rand_number = rand(111111,999999);
$sql = $wpdb->get_results("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='$table' ");

for($b = 0; $b <= count($sql) - 1; $b++){
	 ?>
	 
	 <details>
		<summary>
			<?php echo $sql[$b]->TABLE_NAME; ?>
		</summary>
		
		<?php 
			$tbl = $sql[$b]->TABLE_NAME;
			$tbl_col = $wpdb->get_results("DESCRIBE $tbl");

			foreach($tbl_col as $value){
				echo '<div id="div_'.$value->Field.'"><input checked=false type="radio" id="'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'"   name="'.$form_name.'" value="'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'" ><label onclick="radio_select(this);" ids="'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'" for="'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'">'.$value->Field.'</label></div>';
			}
		?>
	 </details>
	 <?php
}		
}

public function linkquery1($table,$form_name,$id){
global $wpdb;
$rand_number = rand(111111,999999);
$sql = $wpdb->get_results("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='$table' ");

for($b = 0; $b <= count($sql) - 1; $b++){
	 ?>
	 
	 <details>
		<summary>
			<?php echo $sql[$b]->TABLE_NAME; ?>
		</summary>
		
		<?php 
			$tbl = $sql[$b]->TABLE_NAME;
			$tbl_col = $wpdb->get_results("DESCRIBE $tbl");

			foreach($tbl_col as $value){
				echo '<div id="div_'.$value->Field.'"><input checked=false type="radio" id="linkquery1'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'"   name="'.$form_name.'" value="'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'" ><label onclick="radio_select(this);" ids="linkquery1'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'" for="linkquery1'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'">'.$value->Field.'</label></div>';
			}
		?>
	 </details>
	 <?php
}		
}

public function linkquery2($table,$form_name,$id){
global $wpdb;
$rand_number = rand(111111,999999);
$sql = $wpdb->get_results("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='$table' ");

for($b = 0; $b <= count($sql) - 1; $b++){
	 ?>
	 
	 <details>
		<summary>
			<?php echo $sql[$b]->TABLE_NAME; ?>
		</summary>
		
		<?php 
			$tbl = $sql[$b]->TABLE_NAME;
			$tbl_col = $wpdb->get_results("DESCRIBE $tbl");

			foreach($tbl_col as $value){
				echo '<div id="div_'.$value->Field.'"><input checked=false type="radio" id="linkquery2'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'"   name="'.$form_name.'" value="'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'" ><label onclick="radio_select(this);" ids="linkquery2'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'" for="linkquery2'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'">'.$value->Field.'</label></div>';
			}
		?>
	 </details>
	 <?php
}		
}

public function three_table1($table,$form_name,$id){
global $wpdb;
$rand_number = rand(111111,999999);
$sql = $wpdb->get_results("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='$table' ");

for($b = 0; $b <= count($sql) - 1; $b++){
	 ?>
	 
	 <details>
		<summary>
			<?php echo $sql[$b]->TABLE_NAME; ?>
		</summary>
		
		<?php 
			$tbl = $sql[$b]->TABLE_NAME;
			$tbl_col = $wpdb->get_results("DESCRIBE $tbl");

			foreach($tbl_col as $value){
				echo '<div id="div_'.$value->Field.'"><input tbl_val="'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'" onclick="api_three_tbl(this);" checked=false type="radio" id="'.$id.''.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'"   name="'.$form_name.'" value="'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'" ><label onclick="radio_select(this);" ids="linkquery2'.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'" for="'.$id.''.$sql[$b]->TABLE_NAME.'_api_'.$value->Field.'">'.$value->Field.'</label></div>';
			}
		?>
	 </details>
	 <?php
}		
}

public function get_column($table,$name,$id){
global $wpdb;
$sql = $wpdb->get_results("DESCRIBE $table");
?>
<div id='singlewhere_add_where'>
<label>table where</label>
<select name='<?php echo $name; ?>' id='<?php echo $id; ?>'>
	<option value=''></option>
<?php	
for($a = 0; $a <= count($sql) - 1; $a++){
	?>
	<option value='<?php echo $sql[$a]->Field; ?>'><?php echo $sql[$a]->Field; ?></option>
	<?php
}	
?>
</select>
<?php 
if($_GET['id'] == 'linkquery_additional'){ 
?>
<input type='text' name='add_key[]'>
<?php	
}else{

if($_GET['linkquery'] == 'linkquery'){ }else{ ?>
<label>table where value</label>
<input type='text' name='table_where_val[]'>
</div>
<?php	
}
}
}




public function get_role(){
global $wp_roles;
$user = wp_get_current_user();
return $user->allcaps['access_page'];
}



public function submit_api(){
global $wpdb;
if(isset($_POST['submit_allin1api'])){
	 $type = $_POST['query_select'];
	 $table = $_POST['single_option'];
	 $tbl_col = $_POST['singlewhere_option'];
	 $linkquery_option1 = $_POST['linkquery_option1'];
	 $linkquery_option2 = $_POST['linkquery_option2'];
	 $singlewhere_col_value = $_POST['singlewhere_col_value'];
	 $three_table1_form1 = $_POST['three_table1_form1'];
	 $three_table1_form2 = $_POST['three_table1_form2'];
	 $three_table1_form3 = $_POST['three_table1_form3'];
	 $three_tbl_add_condition = $_POST['three_tbl_add_condition'];
	 $add_condition = $_POST['add_condition'];

	 $posts_title = md5(time());
	 $check_title = "SELECT * FROM wp_posts WHERE post_title = '$posts_title' AND post_type = 'alln1api' ";
	 $post_title_result = $wpdb->get_results($check_title);

	 //if(alph){}
	  
	 if(count($post_title_result) >= 1){

	 ?>
	 	<div id="alln1api_css_error">
		 Duplicate  Api URL! 
		</div>	 
	 <?php

	 }else{

	 $css_success = "<div id='alln1api_css_success'>  Api created!  <a href='?page=alln1api' class='page-title-action'>view here</a></div>";	

	 if($type === 'single' && $posts_title != ''){
		 $sql = "SELECT * FROM $table";
		 
		 $post_title = $posts_title; 
		 $insert_api = array(
		 'post_title' => $post_title,
		 'post_name' => $type,
		 'post_content' =>  $sql,
		 'post_status' => 'publish',
		 'post_content_filtered' => $_POST['alln1api_method'],
		 'post_date' => date('Y-m-d H:i:s'),
		 'post_type' => 'alln1api',
		 );	
		 wp_insert_post( $insert_api);
		 echo $css_success;
		 
	 }if($type === 'singlewhere' && $posts_title != ''){
		
		$tbl_explode = explode('_api_',$tbl_col);
		$table = $tbl_explode[0];
		$table_col = $tbl_explode[1];
		 
		 $sql = "SELECT * FROM $table WHERE $table_col = '$singlewhere_col_value' ";
		 
		 $post_title = $posts_title; 
		 $insert_api = array(
		 'post_title' => $post_title,
		 'post_name' => $type,
		 'post_content' =>  $sql,
		 'post_status' => 'publish',
		 'post_content_filtered' => $_POST['alln1api_method'],
		 'post_date' => date('Y-m-d H:i:s'),
		 'post_type' => 'alln1api',
		 );	
		 wp_insert_post( $insert_api);
		 echo $css_success;

	 }else if($type === 'linkquery' && $posts_title != ''){
		
		$tbl_explode1 = explode('_api_',$linkquery_option1);
		 $table1 = $tbl_explode1[0];
		 $table_col1 = $tbl_explode1[1];
		
		$tbl_explode2 = explode('_api_',$linkquery_option2);
		 $table2 = $tbl_explode2[0];
		 $table_col2 = $tbl_explode2[1];			
	
		 $con = htmlspecialchars(htmlentities(strip_tags($add_condition)));
		
		$healthy = array("'","\'");
		$yummy   = array("\"","");

		$conditions = str_replace($healthy, $yummy, $con);			
		
		 $sql = "SELECT * FROM $table1 , $table2 WHERE $table1.$table_col1 = $table2.$table_col2 $conditions ";
 
		 $post_title = $posts_title; 
		 $insert_api = array(
		 'post_title' => $post_title,
		 'post_name' => $type,
		 'post_content' =>  $sql,
		 'post_status' => 'publish',
		 'post_content_filtered' => $_POST['alln1api_method'],
		 'post_date' => date('Y-m-d H:i:s'),
		 'post_type' => 'alln1api',
		 );	
		 wp_insert_post( $insert_api); 
		 echo $css_success;

	 }else if($type === 'three_tables' && $posts_title != ''){
		$con = htmlspecialchars(htmlentities(strip_tags($three_tbl_add_condition)));
		
		$healthy = array("'","\'");
		$yummy   = array("\"","");

		$conditions = str_replace($healthy, $yummy, $con);		

	 	$tbl1 = explode('_api_',$three_table1_form1);
	 	$tbl2 = explode('_api_',$three_table1_form2);
	 	$tbl3 = explode('_api_',$three_table1_form3);	

		$table1_0 = $tbl1[0];
		$table1_1 = $tbl1[1];
		$table2_0 = $tbl2[0];
		$table2_1 = $tbl2[1];		
		$table3_0 = $tbl3[0];
		$table3_1 = $tbl3[1];

		$sql = "SELECT * FROM $table1_0 , $table2_0 , $table3_0 WHERE $table1_0.$table1_1 = $table2_0.$table2_1 AND $table2_0.$table2_1 = $table3_0.$table3_1 $three_tbl_add_condition ";
		 
		 $post_title = $posts_title; 
		 $insert_api = array(
		 'post_title' => $post_title,
		 'post_name' => $type,
		 'post_content' =>  $sql,
		 'post_status' => 'publish',
		 'post_content_filtered' => $_POST['alln1api_method'],
		 'post_date' => date('Y-m-d H:i:s'),
		 'post_type' => 'alln1api',
		 );	
		 wp_insert_post( $insert_api); 
		 echo $css_success;
		 }
	}

} 
}




}//class end
