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
	<script src="<?php echo base_url('websocket/fancywebsocket.js'); ?>"></script>
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
        @font-face{
            font-family:myfirstfont;
            src: url(<?php echo base_url('assets/fonts/digital-7.ttf'); ?>);
        }
		
	</style>
	
</head>
<body class="grey">
<div id="container" class="grey">
	<div class="row" >
		<div class="card col m2 z-depth-1 blue-grey darken-4" style="height: 700px; font-family:myfirstfont">
			<div class="font_clock" style="color:white; font-size:22pt;"><?php echo date('Y/m/d'); ?></div>
            <div class="font_clock" id="clock" style="color:white;font-size:34pt;">00:00:00</div>
			<table class="col m12 ">
				<tbody>
					<tr style="padding:0; color:white;">
						<td style="padding:0;"><i class="material-icons-sidebar">receipt</i></td>
						<td id="totalmeja" style="padding:0;" class="font_info"><?php echo $totalmeja; ?></td>
						<td style="padding:0;"><i class="material-icons-sidebar">people</i> </td>
						<td style="padding:0;" class="font_info">40</td>
						<td style="padding:0;"><i class="material-icons-sidebar">room_service</i></td>
						<td style="padding:0;" class="font_info"><?php echo "0 / ".$totalorder; ?></td>
					</tr>
					<tr style="color:white;">
						<td style="padding:0;"><i class="material-icons-sidebar">sentiment_very_satisfied</i></td>
						<td style="padding:0;" class="font_info">20</td>
						<td style="padding:0;"><i class="material-icons-sidebar">sentiment_satisfied</i></td>
						<td style="padding:0;" class="font_info">10</td>
						<td style="padding:0;"><i class="material-icons-sidebar">sentiment_very_dissatisfied</i></td>
						<td style="padding:0;" class="font_info">5</td>
					</tr>
				</tbody>
			</table>

			
		</div>
		<div class="col m10">
			<div class="row">
				<div class="card-panel col m3 blue-grey lighten-3 z-depth-1" style="padding: 5px; margin: 0.5rem 0rem 0.1rem 0rem;">
					<div class="meja row2 modal-trigger waves-effe  ct waves-light" name="1" style="" href="#modal1">
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : 1</div>
						<div id="hbill1" class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 567512</div>
						<div id="hmenu1" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div id="hjam1" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div id="hlama1" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
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
							<ul id='list11' class="collection white font_cardlist scrollable_list" style="">
								<!--<li class="collection-item ">
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
								<li class="collection-item">SENCA DINGIN</li>-->
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
					<div class="meja row2 modal-trigger waves-effe  ct waves-light" name="2" style="" href="#modal1">
						<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : 2</div>
						<div id="hbill2" class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 567512</div>
						<div id="hmenu2" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div id="hjam2" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div id="hlama2" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
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
							<ul id='list21' class="collection font_cardlist scrollable_list">
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
						<div id="hbill3" class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 567512</div>
						<div id="hmenu3" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div id="hjam3" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div id="hlama3" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
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
							<ul id='list31' class="collection font_cardlist scrollable_list">
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
						<div id="hbill4" class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 567512</div>
						<div id="hmenu4" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div id="hjam4" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div id="hlama4" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
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
						<ul id='list41' class="collection font_cardlist scrollable_list">
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
						<div id="hbill5" class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 567512</div>
						<div id="hmenu5" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div id="hjam5" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div id="hlama5" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
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
							<ul id='list51' class="collection font_cardlist scrollable_list">
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
						<div id="hbill6" class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 567512</div>
						<div id="hmenu6" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div id="hjam6" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div id="hlama6" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
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
							<ul id='list51' class="collection font_cardlist scrollable_list">
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
						<div id="hbill7" class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 567512</div>
						<div id="hmenu7" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div id="hjam7" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div id="hlama7" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
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
							<ul id='list71' class="collection font_cardlist scrollable_list">
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
						<div id="hbill8" class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 567512</div>
						<div id="hmenu8" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
						<div id="hjam8" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
						<div id="hlama8" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
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
						<ul id='list81' class="collection font_cardlist scrollable_list">
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
    
<!-- modal -->
<div id="modal1" class="modal modal-fixed-footer" style="width: 25%;">
	<div class="modal-content">
		<div class="row">
			<div class="col m12 modal-trigger waves-effect waves-light" style="">
				<div id="m_nomeja" class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : 1</div>
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
			<ul id="listmodal" class="collection white font_cardlist scrollable_list" style="">
				
			</ul>
		</div>
		<div id="testmodal2" class="col m12" style="margin: 0px; padding:0px;">
			<ul id ="listmodal2" class="collection white font_cardlist scrollable_list" style="">
			</ul>
		</div>
	</div>
	<div class="modal-footer"> 
		<button id="submitmodal" class="modal-action modal-close waves-effect waves-green btn waves-effect waves-light ">Submit</button>
	</div>
</div>

<script>

	//Define websocket server
    var now,hours,minutes,seconds;
    var x = setInterval(function(){
        now = new Date().getTime();
    
        hours = new Date().getHours();
        minutes = Math.floor((now % (1000 * 60 * 60)) / (1000 * 60));
        seconds = Math.floor((now % (1000 * 60)) /1000);
        
        document.getElementById("clock").innerHTML = hours+" : "+minutes+" : "+seconds;
        ProgressBarTick();
    },1000)
    
    
    var Server;
	Server = new FancyWebSocket('ws://127.0.0.1:9300');
	Server.bind('message', function( payload ) {
		switch (payload) {
			case 'grid':
				reloaddata1();
				break;
		}
	});
	Server.connect();
	
    function ProgressBarTick()
    {
        $.ajax({
			type:"GET", 
			dataType: 'json',
			url: "<?php echo site_url(); ?>" + "/Controller/get_table", 
			data:{ "mode":"resep" },                                     
			success :function(result){
				var month = new Array();
                month[0] = "Jan";
                month[1] = "Feb";
                month[2] = "Mar";
                month[3] = "Apr";
                month[4] = "May";
                month[5] = "Jun";
                month[6] = "Jul";
                month[7] = "Aug";
                month[8] = "Sep";
                month[9] = "Oct";
                month[10] = "Nov";
                month[11] = "Dec";
                //alert(d);
                now = new Date().getTime();
                
                var ctr=1;
                var tmp=result[0]['nomormeja'];
                
                for(i=0;i<result.length;i++)
                {
                    if(tmp!=result[i]['nomormeja'])
                    {
                        ctr=1;
                        tmp=result[i]['nomormeja'];
                    }
                    
                    var date = result[i]['tanggalomset'].split("-");
                    e = parseInt(date[1]);
                   var d = month[e-1]+" "+date[2]+", "+date[0];
                
                    //alert(d);
                    
                    var testing = result[i]['jamtarget'].toString();
                    var test2 = d+" "+testing;
                    //alert(test2);
                    //test2 = "MAR 13, 2018 11:18:34";
                    var jamtarget = new Date(test2).getTime();
                    //alert(jamtarget-now);
                    var durasi = jamtarget-now;
                    
                    var proses = (now-jamtarget)*(-1);
                    //alert(proses);
                    var temp = Math.floor((proses % (1000 * 60 * 60)) / (1000 * 60));
                    //alert(Math.floor(proses % (1000 * 60)/1000));
                    proses = Math.floor(proses % (1000 * 60)/1000)  + (temp*60);
                    var perdetik = 100/(result[i]['durasi']*60);//progressbar berjalan perdetik
                    //alert("AWAL : "+i+": "+proses);
                    var warnabar = "greenteal";
                    
                    if(proses*perdetik<=0)
                    {
                        proses=100;
                        durasi=0;
                        warnabar="red";
                    }
                    else
                    {
                        proses = proses*perdetik;        
                        if(proses<=50)
                        {
                            warnabar="yellow";
                        }
                    }
                    var m = Math.floor((durasi % (1000 * 60 * 60)) / (1000 * 60));
                    var s = Math.floor((durasi % (1000 * 60)) /1000);
                    
                    document.getElementById("pB"+result[i]['nomormeja']+ctr).style.width = proses+"%";
                    document.getElementById("pB"+result[i]['nomormeja']+ctr).style.backgroundColor = warnabar;
                    document.getElementById("countdown"+result[i]['nomormeja']+ctr).innerHTML = m+":"+s;
                    
                    ctr=ctr+1;
                   // alert(ctr);
                }
                
			}, error: function(msg){
				alert('ProggressBar Error');
			}
		});
    }
    var totaldatamodal=0;
	function reloaddata1(){
		//alert('a1');
		$.ajax({
			type:"GET", 
			dataType: 'json',
			url: "<?php echo site_url(); ?>" + "/Controller/get_table", 
			data:{ "mode":"resep" },                                     
			success :function(result){
				//$('#container').html(JSON.stringify(result));
                //$('#test'+result[0]['nomormeja']+'1').html(JSON.stringify(result));
                //alert(totmeja);
                for(i=0;i<result.length;i++){
                    $('#list'+result[i]['nomormeja']+'1').empty();
                }
             
                var tmp =0;
                var ctr=1;
                
                for(i=0;i<result.length;i++)
                {
                    if(tmp!=result[i]['nomormeja'])
                    {
                        document.getElementById("hjam"+ctr).innerHTML = result[i]['jamorder'];
                        tmp=result[i]['nomormeja'];  
                        ctr = ctr+1;
                    }
                }
                
                //untuk inisiasi variabel progressbar dan countdown
                ctr=1;
                tmp=result[0]['nomormeja'];
                
                for(i=0;i<result.length;i++){
                    
                    if(tmp!=result[i]['nomormeja'])
                    {
                        ctr=1;
                        tmp=result[i]['nomormeja'];
                    }
                    
                    //mengeluarkan list pesanan
                    $('#test'+result[i]['nomormeja']+'1 ul').append('<li class="collection-item "><div class="col m9  ">'+result[i]['namamenurecipe']+'</div><div id="countdown'+result[i]['nomormeja']+ctr+'" class="col m2">0:0</div><div class="progress "><div id="pB'+result[i]['nomormeja']+ctr+'" class="determinate " style="width:0%"></div></div></li>');
                    
                    ctr = ctr+1;
                }
			}, error: function(msg){
				alert('Reload Data Error');
			}
		});
	}
	 $(document).ready(function(){
	// // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
	$('.modal').modal();
    $(document).on("click", ".meja", function () {
        var myElements = $(this).attr('name');//dapetin nomor meja
        $.ajax({
			type:"GET", 
			dataType: 'json',
			url: "<?php echo site_url(); ?>" + "/Controller/get_menu/"+myElements, 
			data:{ "mode":"resep" },                                     
			success :function(result){
                document.getElementById("m_nomeja").innerHTML = "TABLE : "+result[0]['NOMORMEJA'];
                $('#listmodal').empty();
                $('#listmodal2').empty();
                totaldatamodal=result.length;
                for(i=0;i<result.length;i++)
                {
                    var str="";
                    if(result[i]["STATUS"]!=1)
                    {
                        str = '<li class="collection-item ">'
                                +'<div class="row">'
                                    +'<div class="col s8">'+result[i]['NAMAMENURECIPE']+'</div>'
                                    +'<div class="col s4"><input type="checkbox" class="filled-in" id="cb'+i+'" name="f_'+result[i]['KODETRANS']+'" /><label for="cb'+i+'">Finish</label></div>'
                                +'</div>'
                                +'<div class="col m2"></div>'
                                +'<div class="progress "><div class="determinate " style="width:0%"></div></div>'
                            +'</li>'; 
                        $('#listmodal').append(str);
                    }
                    else
                    {
                         str = '<li class="collection-item ">'
                                +'<div class="row">'
                                    +'<div class="col s8">'+result[i]['NAMAMENURECIPE']+'</div>'
                                    +'<div class="col s4"><input type="checkbox" class="filled-in" id="cb'+i+'" name="u_'+result[i]['KODETRANS']+'"/><label for="cb'+i+'">Unfinish</label></div>'
                                +'</div>'
                                +'<div class="col m2"></div>'
                                +'<div class="progress "><div class="determinate " style="width:0%"></div></div>'
                            +'</li>'; 
                        $('#listmodal2').append(str);
                    }
                }
                
			}, error: function(msg){
				alert('Reload Modal Error');
			}
		});
    });
         
   $("#submitmodal").click(function(){
       
        var hasil="";
        for(i=0;i<totaldatamodal;i++)
        {
            if($('#cb'+i).is(':checked')==true)
            {      
                hasil = hasil + $('#cb'+i).attr('name')+".";
                
            }
        }
       hasil = hasil.substring(0,hasil.length-1);
        alert(hasil);
        $.ajax({
			type:"post", 
            dataType:"json",
			url: "<?php echo site_url(); ?>" + "/Controller/update_status/"+hasil, 
			data:{ "mode":"resep" },                                     
			success :function(result){
                alert(result);
            }, error: function(msg){
                alert('Submit Modal Error');
            }
        });
   });
         
	$('ul.tabs').tabs({
		swipeable : false
	});
         
		reloaddata1();
	// //$('ul.tabs').tabs('select_tab', 'tab_id');
 });
</script>
</body>
</html>