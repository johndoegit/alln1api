 
<script type='text/javascript'>

    function hide(){
			document.getElementById('linkquery').style = 'visibility:hidden; position: absolute;'; 
			document.getElementById('singlewhere').style = 'visibility:hidden; position: absolute;';
			document.getElementById('single').style = 'visibility:hidden; position: absolute;';    	
			document.getElementById('three_table').style = 'visibility:hidden; position: absolute;';    	
    	
    }

	function show_selected(e){
 
		var selected = e.value;
		console.log(selected);
		if(selected === 'single'){
			hide();
			document.getElementById('single').style = 'visibility:visible; position: relative;';
		}else if(selected === 'singlewhere'){
			hide();
			document.getElementById('singlewhere').style = 'visibility:visible; position: relative;';
		}else if(selected === 'linkquery'){
			hide();
			document.getElementById('linkquery').style = 'visibility:visible; position: relative;';    
		}else if(selected === 'three_tables'){
			hide();
			document.getElementById('three_table').style = 'visibility:visible; position: relative;';    	
		}
	}

	function radio_select(e){
 
	}

	function api_three_tbl(e){
		var selected = e.value;
		console.log(selected);
	}

	function show_btn(id){
		document.getElementById('alln1api_bottom_menu_'+id+'').style = 'visibility:visible;  background: #f1f1f1;';
	}

	function hide_btn(id){
		document.getElementById('alln1api_bottom_menu_'+id+'').style = 'visibility:hidden;  background: #f1f1f1;';
	}	

 

</script>

 