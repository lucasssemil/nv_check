<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Checker System</title>
	<link href="<?php echo base_url('assets/css/materialize.css'); ?>" type="text/css" rel="stylesheet"></link>
	<link href="<?php echo base_url().'assets/css/material_icon.css'; ?>" type="text/css" rel="stylesheet"></link>
	<link href="<?php echo base_url().'assets/css/custom_font.css'; ?>" type="text/css" rel="stylesheet"></link>
	<link href="<?php echo base_url().'assets/css/custom_css.css'; ?>" type="text/css" rel="stylesheet"></link>

	<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/materialize.min.js'); ?>"></script>
	<script src="<?php echo base_url('websocket/fancywebsocket.js'); ?>"></script>
	<style>
		.collection{
			margin: 0;
		}
		.collection .collection-item {
			background-color: #fff;
			line-height: 1.5rem;
			padding: 5px 5px;
			margin: 0;
			border-bottom: 1px solid #e0e0e0;
		}
		.row2 {
		  margin-left: auto;
		  margin-right: auto;
		  margin-bottom: 20px;
		  margin-top: 5px;
		}
        .center {
            margin: auto;
            width: 50%;
            padding: 10px;
        }
		
	</style>
	
</head>
<body>
<h1 style="text-align:center;">CASHIER</h1>
<div id="container">
	<div class="row col s12">
	<form class="col s4" action="<?php echo base_url('index.php/Controller/inserttorder') ?>" method="POST"> 
        <div class="center"><h2>TORDER</h2></div>
        <div>
            KODETRANS: <input type="text" id="kt" name="kodetrans"><br>
            NOMEJA: <input type="text" name="nomeja"><br>
            TOTAL CUSTOMER: <input type="text" name="totalcustomer"><br>
        </div>
		<input type="submit" class="btn waves-effect waves-light" name="insertdtl" value="INSERT TORDER">
	</form>
  <form class="col s4" action="<?php echo base_url('index.php/Controller/inserttorderdtl') ?>" method="POST"> 
        <div class="center"><h2>TORDERDTL</h2></div>
        <div>
            KODETRANS:
            <select name="kodetrans" style="display:inline">
                <?php
                    foreach($torder as $t)
                    {
                    
                        echo '<option value="'.$t["KODETRANS"].'">'.$t["KODETRANS"].'</option>';
                    }
                ?>
              </select>
            NAMAMAKANAN:
            <select name="makanan" style="display:inline">
                    <?php
                    foreach($makanan as $t)
                    {
                    
                        echo '<option value="'.$t["kodemenurecipe"].'">'.$t["namamenurecipe"].'</option>';
                    }
                ?>
            </select>
        </div>
		<input type="submit" class="btn waves-effect waves-light" name="insertdtl" value="INSERT TORDERDTL">
		
	</form>
    <form class="col s4" action="<?php echo base_url('index.php/Controller/insertmodifier') ?>" method="POST"> 
        <div class="center"><h2>MODIFIER</h2></div>
        <div>
            KODETRANS:
            <select name="m_urutan" style="display:inline" size="1">
                <?php
                    foreach($ordermodifier as $t)
                    {
                    
                        echo '<option value="'.$t["URUTAN"].'-'.$t["KODETRANS"].'">'.$t["KODETRANS"].' - '.$t["KODEMENURECIPE"].'</option>';
                    }
                ?>
              </select>
            MODIFIER:
            <select name="kodemodifier" style="display:inline">
                    <?php
                    foreach($modifier as $t)
                    {
                    
                        echo '<option value="'.$t["kodemenurecipe"].'">'.$t["namamenurecipe"].'</option>';
                    }
                ?>
            </select>
        </div>
		<input type="submit" class="btn waves-effect waves-light" name="insertdtl" value="INSERT MODIFIER">
		
	</form>
	</div>
</div>

<script>

var Server;
Server = new FancyWebSocket('ws://127.0.0.1:9300');
Server.connect();
		
$(document).ready(function(){
	// // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
	$('.modal').modal();
	$('ul.tabs').tabs({
		swipeable : false
	  
	});
	$(".btn").click(function() {
		//$( "#formemployee" ).submit();
		var kodetrans = $("#kodetrans").val();
		var tglomset = $("#tglomset").val();
		var nomormeja = $("#nomormeja").val();

	});
	// //$('ul.tabs').tabs('select_tab', 'tab_id');
});
</script>
</body>
</html>