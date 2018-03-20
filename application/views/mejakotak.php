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
		  margin-bottom: 0px;
		  margin-top: 5px;
		}
		
	</style>
	
</head>
<body class="grey">
<div id="container" class="grey">
	<div class="row" >
		<div class="card col m2 z-depth-1 blue-grey darken-4" style="height: 700px">
			<div class="font_clock">13:20:29</div>
			<table class="col m12 ">
				<tbody>
					<tr style="padding:0;">
						<td style="padding:0;"><i class="material-icons-sidebar">receipt</i></td>
						<td style="padding:0;" class="font_info">10</td>
						<td style="padding:0;"><i class="material-icons-sidebar">people</i> </td>
						<td style="padding:0;" class="font_info">40</td>
						<td style="padding:0;"><i class="material-icons-sidebar">room_service</i></td>
						<td style="padding:0;" class="font_info">45/80</td>
					</tr>
					<tr style="">
						<td style="padding:0;"><i class="material-icons-sidebar">sentiment_very_satisfied</i></td>
						<td style="padding:0;" class="font_info">20</td>
						<td style="padding:0;"><i class="material-icons-sidebar">sentiment_satisfied</i></td>
						<td style="padding:0;" class="font_info">10</td>
						<td style="padding:0;"><i class="material-icons-sidebar">sentiment_very_dissatisfied</i></td>
						<td style="padding:0;" class="font_info">5</td>
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
				<div class="card-panel col m3 blue-grey lighten-3 z-depth-1" style="padding: 5px; margin: 0.5rem 0rem 0.1rem 0rem;">
					<div class="row2 modal-trigger waves-effect waves-light" style="" href="#modal1">
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : 1</div>
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 567512</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
					</div>
					<div class="row2">
						<div class="col m12" style="margin: 0px; padding:0px;">
							<ul class="tabs " style="">
								<li class="tab col m4"><a href="#test11"><i class="material-icons-card">play_circle_filled</i></a></li>
								<li class="tab col m4"><a href="#test12"><i class="material-icons-card">stop</i></a></li>
								<li class="tab col m4"><a href="#test13"><i class="material-icons-card">dashboard</i></a></li>
								<!--<div class="indicator grey" style="z-index:1"> </div>-->
							</ul>
						</div>
						<div id="test11" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection white font_cardlist scrollable_list" style="">
								<li class="collection-item ">
									<div class="col m9  ">
										CHIC TRYK BENTO
									</div>
									<div class="col m2">
										05:00
									</div>
									<div class="progress ">
										<div class="determinate " style="width: 70%"></div>
									</div>

								</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">EBI MAYO BENTO</li>
								<li class="collection-item">SENCA DINGIN</li>
								<li class="collection-item">SENCA DINGIN</li>
								<li class="collection-item">SENCA DINGIN</li>
								<li class="collection-item">SENCA DINGIN</li>
							</ul>
						</div>
						<div id="test12" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection white font_cardlist scrollable_list" style="">
								<li class="collection-item">ORANGE JUICE</li>
								<li class="collection-item">ORANGE JUICE</li>
								<li class="collection-item">ORANGE JUICE</li>
								<li class="collection-item">KAKIGORI</li>
								<li class="collection-item">KAKIGORI</li>
							</ul>
						</div>
						<div id="test13" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection white font_cardlist scrollable_list" style="">
								<li class="collection-item">2 CHIC TRYK BENTO</li>
								<li class="collection-item">1 CHAWAN MUSHI</li>
								<li class="collection-item">1 EBI MAYO BENTO</li>
								<li class="collection-item">4 SENCA DINGIN</li>
								<li class="collection-item">3 ORANGE JUICE</li>
								<li class="collection-item">2 KAKIGORI</li>
							</ul>
						</div>
						
					</div>
				</div>
				<div class="card-panel col m3 blue-grey lighten-3 z-depth-1" style="padding: 5px; margin: 0.5rem 0rem 0.1rem 0rem;">
					<div class="row2 modal-trigger waves-effect waves-light" style="" href="#modal1">
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : 2</div>
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 342624</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
					</div>
					<div class="row2">
						<div class="col m12" style="margin: 0px; padding:0px;">
							<ul class="tabs" style="">
								<li class="tab col m4"><a href="#test21"><i class="material-icons-card">play_circle_filled</i></a></li>
								<li class="tab col m4"><a href="#test22"><i class="material-icons-card">stop</i></a></li>
								<li class="tab col m4"><a href="#test23"><i class="material-icons-card">dashboard</i></a></li>
								
							</ul>
						</div>
						<div id="test21" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
							</ul>
						</div>
						<div id="test22" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item"> ORANGE JUICE</li>
							</ul>
						</div>
						<div id="test23" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item">2 CHIC TRYK BENTO</li>
								<li class="collection-item">1 CHAWAN MUSHI</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="card-panel col m3 blue-grey lighten-3 z-depth-1" style="padding: 5px; margin: 0.5rem 0rem 0.1rem 0rem;">
					<div class="row2 modal-trigger waves-effect waves-light" style="" href="#modal1">
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : 3</div>
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 662421</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
					</div>
					<div class="row2">
						<div class="col m12" style="margin: 0px; padding:0px;">
							<ul class="tabs" style="">
								<li class="tab col m4"><a href="#test31"><i class="material-icons-card">play_circle_filled</i></a></li>
								<li class="tab col m4"><a href="#test32"><i class="material-icons-card">stop</i></a></li>
								<li class="tab col m4"><a href="#test33"><i class="material-icons-card">dashboard</i></a></li>
								
							</ul>
						</div>
						<div id="test31" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
							</ul>
						</div>
						<div id="test32" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item"> ORANGE JUICE</li>
							</ul>
						</div>
						<div id="test33" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item">2 CHIC TRYK BENTO</li>
								<li class="collection-item">1 CHAWAN MUSHI</li>
							</ul>
						</div>
					</div>
					
				</div>
				<div class="card-panel col m3 blue-grey lighten-3 z-depth-1" style="padding: 5px; margin: 0.5rem 0rem 0.1rem 0rem;">
					<div class="row2 modal-trigger waves-effect waves-light" style="" href="#modal1">
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : 4</div>
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 799341</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
					</div>
					<div class="row2">
						<div class="col m12" style="margin: 0px; padding:0px;">
							<ul class="tabs" style="">
								<li class="tab col m4"><a href="#test41"><i class="material-icons-card">play_circle_filled</i></a></li>
								<li class="tab col m4"><a href="#test42"><i class="material-icons-card">stop</i></a></li>
								<li class="tab col m4"><a href="#test43"><i class="material-icons-card">dashboard</i></a></li>
								
							</ul>
						</div>
						<div id="test41" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
							</ul>
						</div>
						<div id="test42" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item"> ORANGE JUICE</li>
							</ul>
						</div>
						<div id="test43" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item">2 CHIC TRYK BENTO</li>
								<li class="collection-item">1 CHAWAN MUSHI</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="card-panel col m3 blue-grey lighten-3 z-depth-1" style="padding: 5px; margin: 0.5rem 0rem 0.1rem 0rem;">
					<div class="row2 modal-trigger waves-effect waves-light" style="" href="#modal1">
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : 5</div>
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 274627</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
					</div>
					<div class="row2">
						<div class="col m12" style="margin: 0px; padding:0px;">
							<ul class="tabs " style="">
								<li class="tab col m4"><a href="#test51"><i class="material-icons-card">play_circle_filled</i></a></li>
								<li class="tab col m4"><a href="#test52"><i class="material-icons-card">stop</i></a></li>
								<li class="tab col m4"><a href="#test53"><i class="material-icons-card">dashboard</i></a></li>
								<!--<div class="indicator grey" style="z-index:1"> </div>-->
							</ul>
						</div>
						<div id="test51" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection white font_cardlist scrollable_list" style="">
								<li class="collection-item ">
									<div class="col m9  ">
										CHIC TRYK BENTO
									</div>
									<div class="col m2">
										05:00
									</div>
									<div class="progress ">
										<div class="determinate " style="width: 70%"></div>
									</div>

								</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">EBI MAYO BENTO</li>
								<li class="collection-item">SENCA DINGIN</li>
								<li class="collection-item">SENCA DINGIN</li>
								<li class="collection-item">SENCA DINGIN</li>
								<li class="collection-item">SENCA DINGIN</li>
							</ul>
						</div>
						<div id="test52" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection white font_cardlist scrollable_list" style="">
								<li class="collection-item">ORANGE JUICE</li>
								<li class="collection-item">ORANGE JUICE</li>
								<li class="collection-item">ORANGE JUICE</li>
								<li class="collection-item">KAKIGORI</li>
								<li class="collection-item">KAKIGORI</li>
							</ul>
						</div>
						<div id="test53" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection white font_cardlist scrollable_list" style="">
								<li class="collection-item">2 CHIC TRYK BENTO</li>
								<li class="collection-item">1 CHAWAN MUSHI</li>
								<li class="collection-item">1 EBI MAYO BENTO</li>
								<li class="collection-item">4 SENCA DINGIN</li>
								<li class="collection-item">3 ORANGE JUICE</li>
								<li class="collection-item">2 KAKIGORI</li>
							</ul>
						</div>
						
					</div>
				</div>
				<div class="card-panel col m3 blue-grey lighten-3 z-depth-1" style="padding: 5px; margin: 0.5rem 0rem 0.1rem 0rem;">
					<div class="row2 modal-trigger waves-effect waves-light" style="" href="#modal1">
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : 6</div>
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 346373</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
					</div>
					<div class="row2">
						<div class="col m12" style="margin: 0px; padding:0px;">
							<ul class="tabs" style="">
								<li class="tab col m4"><a href="#test61"><i class="material-icons-card">play_circle_filled</i></a></li>
								<li class="tab col m4"><a href="#test62"><i class="material-icons-card">stop</i></a></li>
								<li class="tab col m4"><a href="#test63"><i class="material-icons-card">dashboard</i></a></li>
								
							</ul>
						</div>
						<div id="test61" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
							</ul>
						</div>
						<div id="test62" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item"> ORANGE JUICE</li>
							</ul>
						</div>
						<div id="test63" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item">2 CHIC TRYK BENTO</li>
								<li class="collection-item">1 CHAWAN MUSHI</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="card-panel col m3 blue-grey lighten-3 z-depth-1" style="padding: 5px; margin: 0.5rem 0rem 0.1rem 0rem;">
					<div class="row2 modal-trigger waves-effect waves-light" style="" href="#modal1">
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : 7</div>
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 423626</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
					</div>
					<div class="row2">
						<div class="col m12" style="margin: 0px; padding:0px;">
							<ul class="tabs" style="">
								<li class="tab col m4"><a href="#test71"><i class="material-icons-card">play_circle_filled</i></a></li>
								<li class="tab col m4"><a href="#test72"><i class="material-icons-card">stop</i></a></li>
								<li class="tab col m4"><a href="#test73"><i class="material-icons-card">dashboard</i></a></li>
								
							</ul>
						</div>
						<div id="test71" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
							</ul>
						</div>
						<div id="test72" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item"> ORANGE JUICE</li>
							</ul>
						</div>
						<div id="test73" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item">2 CHIC TRYK BENTO</li>
								<li class="collection-item">1 CHAWAN MUSHI</li>
							</ul>
						</div>
					</div>
					
				</div>
				<div class="card-panel col m3 blue-grey lighten-3 z-depth-1" style="padding: 5px; margin: 0.5rem 0rem 0.1rem 0rem;">
					<div class="row2 modal-trigger waves-effect waves-light" style="" href="#modal1">
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : 8</div>
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 414221</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
					</div>
					<div class="row2">
						<div class="col m12" style="margin: 0px; padding:0px;">
							<ul class="tabs" style="">
								<li class="tab col m4"><a href="#test81"><i class="material-icons-card">play_circle_filled</i></a></li>
								<li class="tab col m4"><a href="#test82"><i class="material-icons-card">stop</i></a></li>
								<li class="tab col m4"><a href="#test83"><i class="material-icons-card">dashboard</i></a></li>
								
							</ul>
						</div>
						<div id="test81" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
								<li class="collection-item">CHAWAN MUSHI</li>
							</ul>
						</div>
						<div id="test82" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item"> ORANGE JUICE</li>
							</ul>
						</div>
						<div id="test83" class="col m12" style="margin: 0px; padding:0px;">
							<ul class="collection font_cardlist scrollable_list">
								<li class="collection-item">2 CHIC TRYK BENTO</li>
								<li class="collection-item">1 CHAWAN MUSHI</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="modal1" class="modal modal-fixed-footer" style="width: 25%;">
	<div class="modal-content">
		<div class="row">
			<div class="col m12 modal-trigger waves-effect waves-light" style="">
				<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : 1</div>
				<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="align-text: left">BILL : 567512</div>
				<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
				<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
				<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
			</div>
		</div>
		<div class="col m12" style="margin: 0px; padding:0px;">
			<ul class="tabs tabs-fixed-width " style="">
				<li class="tab col m6"><a href="#testmodal1"><i class="material-icons-card">play_circle_filled</i></a></li>
				<li class="tab col m6"><a href="#testmodal2"><i class="material-icons-card">stop</i></a></li>
				<!--<div class="indicator grey" style="z-index:1"> </div>-->
			</ul>
		</div>
		<div id="testmodal1" class="col m12" style="margin: 0px; padding:0px;">
			<ul class="collection white font_cardlist scrollable_list" style="">
				<li class="collection-item ">
					<span class="col m9">
						CHIC TRYK BENTO
					</span>
					<span class="col m2">
						05:00
					</span>
					<a class="waves-effect waves-light btn" style="padding: 0px 7px;">
						<i class="material-icons">check</i>
					</a>
					<div class="progress ">
						<div class="determinate " style="width: 70%"></div>
					</div>

				</li>
				<li class="collection-item">CHAWAN MUSHI</li>
				<li class="collection-item">EBI MAYO BENTO</li>
				<li class="collection-item">SENCA DINGIN</li>
				<li class="collection-item">SENCA DINGIN</li>
				<li class="collection-item">SENCA DINGIN</li>
				<li class="collection-item">SENCA DINGIN</li>
			</ul>
		</div>
		<div id="testmodal2" class="col m12" style="margin: 0px; padding:0px;">
			<ul class="collection white font_cardlist scrollable_list" style="">
				<li class="collection-item">ORANGE JUICE</li>
				<li class="collection-item">ORANGE JUICE</li>
				<li class="collection-item">ORANGE JUICE</li>
				<li class="collection-item">KAKIGORI</li>
				<li class="collection-item">KAKIGORI</li>
			</ul>
		</div>
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