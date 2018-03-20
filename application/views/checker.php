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
		<div class="card col m2 blue accent-2 z-depth-1">
			<h2 class="white-text">13:20:29</h2>

			<table class="col m12">
				<tbody>
					<tr style="padding:0;">
						<td style="padding:0;"><i class="material-icons">receipt</i></td>
						<td style="padding:0;" class="white-text">10</td>
						<td style="padding:0;"><i class="material-icons-sidebar">people</i> </td>
						<td style="padding:0;" class="white-text">40</td>
						<td style="padding:0;"><i class="material-icons-sidebar">room_service</i></td>
						<td style="padding:0;" class="white-text">45/80</td>
					</tr>
					<tr>
						<td style="padding:0;"><i class="material-icons-sidebar">sentiment_very_satisfied</i></td>
						<td style="padding:0;" class="white-text">20</td>
						<td style="padding:0;"><i class="material-icons-sidebar">sentiment_satisfied</i></td>
						<td style="padding:0;" class="white-text">10</td>
						<td style="padding:0;"><i class="material-icons-sidebar">sentiment_very_dissatisfied</i></td>
						<td style="padding:0;" class="white-text">5</td>
					</tr>
				</tbody>
			</table>

			<table hidden>
				<thead>
					<tr>
						<th>Nama Menu</th>
						<th>Quantity</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Chicken Teriyaki Bento</td>
						<td>6</td>
					</tr>
					<tr>
						<td>Chick Gomadare</td>
						<td>4</td>
					</tr>
					<tr>
						<td>Ebi Mayo Bento</td>
						<td>2</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col m10">
			<div class="row">
				<div class="card-panel col m3 teal z-depth-1">
					<div class="row2">
						<div class="col m6 play-bold white-text">TABLE : 1</div>
						<div class="col m6 play-bold white-text">1/4</div>
						<div class="col m6 play-bold white-text">14:30</div>
						<div class="col m6 play-bold white-text">00:00</div>
					</div>
					<div class="row">
						<div class="col m12">
							<ul class="tabs" style="">
								<li class="tab col m4"><a href="#test11"><i class="material-icons-card">play_circle_filled</i></a></li>
								<li class="tab col m4"><a href="#test12"><i class="material-icons-card">stop</i></a></li>
								<li class="tab col m4"><a href="#test13"><i class="material-icons-card">dashboard</i></a></li>
								
							</ul>
						</div>
						<div id="test11" class="col m12">
							<ul class="collection">
								<li class="collection-item">2 CHIC TRYK BENTO
									<a class="waves-effect waves-light btn-flat">
										<i class="material-icons">check</i>
									</a>
									<div class="progress">
										<div class="determinate" style="width: 70%"></div>
									</div>

								</li>
								<li class="collection-item">1 CHAWAN MUSHI</li>
								<li class="collection-item">1 EBI MAYO BENTO</li>
								<li class="collection-item">1 SENCA DINGIN</li>
							</ul>
						</div>
						<div id="test12" class="col m12">
							<ul class="collection">
								<li class="collection-item">1 ORANGE JUICE</li>
								<li class="collection-item">1 KAKIGORI</li>
							</ul>
						</div>
						<div id="test13" class="col m12">
							<ul class="collection">
								<li class="collection-item">2 CHIC TRYK BENTO</li>
								<li class="collection-item">1 CHAWAN MUSHI</li>
								<li class="collection-item">1 EBI MAYO BENTO</li>
								<li class="collection-item">1 SENCA DINGIN</li>
								<li class="collection-item">1 ORANGE JUICE</li>
								<li class="collection-item">1 KAKIGORI</li>
							</ul>
						</div>
						
					</div>
				</div>
				<div class="card-panel col m3 teal z-depth-1">
					<div class="row">
						<div class="col m6 play-bold white-text">TABLE : 3</div>
						<div class="col m6 play-bold white-text">1/4</div>
						<div class="col m6 play-bold white-text">14:30</div>
						<div class="col m6 play-bold white-text">00:00</div>
					</div>
					<div class="row">
						<div class="col m12">
							<ul class="tabs" style="">
								<li class="tab col m4"><a href="#test21"><i class="material-icons-card">play_circle_filled</i></a></li>
								<li class="tab col m4"><a href="#test22"><i class="material-icons-card">stop</i></a></li>
								<li class="tab col m4"><a href="#test23"><i class="material-icons-card">dashboard</i></a></li>
								
							</ul>
						</div>
						<div id="test21" class="col m12">
							<ul class="collection">
								<li class="collection-item">1 CHAWAN MUSHI</li>
							</ul>
						</div>
						<div id="test22" class="col m12">
							<ul class="collection">
								<li class="collection-item">1 ORANGE JUICE</li>
							</ul>
						</div>
						<div id="test23" class="col m12">
							<ul class="collection">
								<li class="collection-item">2 CHIC TRYK BENTO</li>
								<li class="collection-item">1 CHAWAN MUSHI</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="card-panel col m3 teal z-depth-1">
					3 <br>
					<ul class="collection">
						<li class="collection-item">2 CHIC TRYK BENTO</li>
						<li class="collection-item">1 CHAWAN MUSHI</li>
						<li class="collection-item">1 EBI MAYO BENTO</li>
						<li class="collection-item">1 SENCA DINGIN</li>
					</ul>
				</div>
				
				<div class="card-panel col m3 teal z-depth-1">
					<div class="row modal-trigger waves-effect waves-light" href="#modal1">
						<div class="col m6 play-bold white-text">TABLE : 3</div>
						<div class="col m6 play-bold white-text">1/4</div>
						<div class="col m6 play-bold white-text">14:30</div>
						<div class="col m6 play-bold white-text">00:00</div>
					</div>
					<ul class="collection">
						<li class="collection-item">2 CHIC TRYK BENTO</li>
						<li class="collection-item">1 CHAWAN MUSHI</li>
						<li class="collection-item">1 EBI MAYO BENTO</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="card-panel col m3 blue darken-1 z-depth-1">5
					
				</div>
				<div class="card-panel col m3 blue darken-1 z-depth-1">6
					
				</div>
				<div class="card-panel col m3 blue darken-1 z-depth-1">7</div>
				<div class="card-panel col m3 blue darken-1 z-depth-1">8</div>
			</div>
		</div>
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