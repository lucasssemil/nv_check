<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/materialize.min.js'); ?>"></script>
	<script src="<?php echo base_url('websocket/fancywebsocket.js'); ?>"></script>
</head>
<body>
<div id="container">
	test
    
</div>

<script>
	//Define websocket server
	var Server;
	Server = new FancyWebSocket('ws://127.0.0.1:9300');
	Server.bind('message', function( payload ) {
		switch (payload) {
			case 'grid':
				reloaddata();
				break;
		}
	});
	Server.connect();
	
	function reloaddata(){
		//alert('a1');
		$.ajax({
			type:"GET", 
			dataType: 'json',
			url: "<?php echo site_url(); ?>" + "/Controller/get_table", 
			data:{ "mode":"resep" },                                     
			success :function(result){
				//alert('a2');
				$('#container').html(JSON.stringify(result));
				
			}, error: function(msg){
				alert('a3');
			}
		});
	}
	
	$(document).ready(function(){
		
		reloaddata();
		//alert('a4');
		
		// //$('ul.tabs').tabs('select_tab', 'tab_id');
	});
</script>
</body>
</html>