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
	<!--
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->

	<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/materialize.min.js'); ?>"></script>
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
	</div>
</div>
<div id="modal1" class="modal modal-fixed-footer">
	<div class="modal-content">
		<h4>Modal Header</h4>
		<p>A bunch of text</p>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
	</div>
</div>

<script>
 $(document).ready(function(){
	// // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
	$('.modal').modal();
	$('ul.tabs').tabs({
		swipeable : false
	  
	});
	// //$('ul.tabs').tabs('select_tab', 'tab_id');
 });
</script>
</body>
</html>