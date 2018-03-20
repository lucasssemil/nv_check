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
		
	</style>
	
</head>
<body>

<div id="container">
	<div class="row">
	<form class="col s4" id="form_input">
        <div class="row">
			<div class="input-field col s12">
				<input id="kodetrans" type="text" class="validate">
				<label for="kodetrans">Kode Trans</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input id="tglomset" type="text" class="validate">
				<label for="tglomset">Tanggal Omset</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input id="nomormeja" type="text" class="validate">
				<label for="nomormeja">Nomor Meja</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s4">
				<input id="kodemenurecipe" type="text" class="validate">
				<label for="kodemenurecipe">Kode Menu Recipe</label>
			</div>
			<div class="input-field col s8">
				<input id="namamenurecipe" type="text" class="validate">
				<label for="namamenurecipe">Nama Menu Recipe</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input id="jumlah" type="text" class="validate">
				<label for="jumlah">Jumlah</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input id="harga" type="text" class="validate">
				<label for="harga">harga</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s4">
				<input id="kodedetail" type="text" class="validate">
				<label for="kodedetail">Kode Detail</label>
			</div>
			<div class="input-field col s8">
				<input id="namadetail" type="text" class="validate">
				<label for="namadetail">Nama Detail</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<input id="urutanheader" type="text" class="validate">
				<label for="urutanheader">Urutan Header</label>
			</div>
			<div class="input-field col s6">
				<input id="urutan" type="text" class="validate">
				<label for="urutan">Urutan</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s4">
				<input id="jamorder" type="text" class="validate">
				<label for="jamorder">Jam Order</label>
			</div>
			<div class="input-field col s4">
				<input id="jamtarget" type="text" class="validate">
				<label for="jamtarget">Jam Target</label>
			</div>
			<div class="input-field col s4">
				<input id="jamfinish" type="text" class="validate">
				<label for="jamfinish">Jam Finish</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input id="userorder" type="text" class="validate">
				<label for="userorder">User Order</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input id="userchecker" type="text" class="validate">
				<label for="userchecker">User Checker</label>
			</div>
		</div>
		
		<a class="btn waves-effect waves-light" id="btn_submit" name="btn_submit">Submit
			<i class="material-icons right">send</i>
		</a>
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
	$("#btn_submit").click(function() {
		//$( "#formemployee" ).submit();
		var kodetrans = $("#kodetrans").val();
		var tglomset = $("#tglomset").val();
		var nomormeja = $("#nomormeja").val();

		$.ajax({
			type:"POST",
			url:"<?php echo site_url(); ?>" + "/Controller/insert_table",
			data:{
				"kodetrans":kodetrans,
				"tglomset": tglomset,
				"nomormeja":nomormeja
			},
			success: function(result){
				Server.send( 'message', 'grid' );
				alert('Data Saved');
				//swal('Success', "Add Employee success", 'success');
			}
		});
	});
	// //$('ul.tabs').tabs('select_tab', 'tab_id');
});
</script>
</body>
</html>