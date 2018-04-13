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
            font-family:'myfirstfont';
            src: url(<?php echo base_url('assets/fonts/digital-7.ttf'); ?>);
        }
        @font-face{
            font-family:'mysecondfont';
            src: url(<?php echo base_url('assets/fonts/arsenal-regular.otf'); ?>);
        }
        
        @font-face{
            font-family:'mythirdfont';
            src: url(<?php echo base_url('assets/fonts/arsenal-bold.otf'); ?>);
        }
		
        .strikeout {
            line-height: 1em;
            position: relative;
        }
        .strikeout::after {
          border-bottom: 0.125em solid black;
          content: "";
          left: 5%;
          margin-top: calc(0.125em / 2 * -1);
          position: absolute;
          right: 25%;
          top: 50%;
        }
        .header{
            font-family:mythirdfont;
        }
        .isi{
            font-family:mysecondfont;
        }
        .barisMeja{
            height: 350px;
        }
	</style>
	
</head>
<body class="grey">
<div id="container" class="grey">
	<div class="row" >
		<div class="card col m2 z-depth-1 blue-grey darken-4" style="height: 700px; font-family:myfirstfont">
			<div class="font_clock" style="color:white; font-size:24pt; text-align:center;"><?php echo date('Y/m/d'); ?></div>
            <div class="font_clock" id="clock" style="color:white;font-size:34pt; text-align:center;">00:00:00</div>
			<table class="col m12 ">
				<tbody>
					<tr style="padding:0; color:white;">
						<td style="padding:0;"><i class="material-icons-sidebar">receipt</i></td>
						<td id="totalmeja" style="padding:0;" class="font_info"><?php echo $totalmeja; ?></td>
						<td style="padding:0;"><i class="material-icons-sidebar">people</i> </td>
						<td style="padding:0;" class="font_info">40</td>
						<td style="padding:0;"><i class="material-icons-sidebar">room_service</i></td>
						<td id="dashtotalorder" style="padding:0;" class="font_info"><?php echo $totalfinishorder." / ".$totalorder; ?></td>
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
            
            <a id="btnReport1" class="waves-effect waves-light btn-large col s12" style="margin-top:10%;"><i class="material-icons left">book</i>LAPORAN REKAP MENU</a>
            <a id="btnReport2" class="waves-effect waves-light btn-large col s12" style="margin-top:10%;"><i class="material-icons left">book</i>LAPORAN MENU</a>
			
		</div>
		<div id="checker_container" class="col m10">
		</div>
	</div>
</div>
    
<!-- modal -->
<div id="modal1" class="modal modal-fixed-footer" style="width: 50%; margin:center;overflow:hidden;" >
    <div class=" row" style="margin-top:2%; z-index: 1;">
        <div id="h_modal1" class="col m12 header modal-trigger waves-effect waves-light" style="overflow:hidden;">
                <div id="m_mode" class="col m12 font_cardheader blue-grey lighten-3 " style="text-align:center; font-size:24px; color:red;">FINISH</div>
				<div id="m_nomeja" class="col m8 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : 1</div>
				<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="align-text: right">BILL : 567512</div>
				<div class="col m5 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
				<div class="col m3 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
				<div class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
			</div>
		<div class="col m12" style="margin: 0px; padding:0px;">
			<ul class="tabs tabs-fixed-width " style="overflow-x:hidden;">
				<li id="btnmodal1finish" class="tab col m6"><a href="#testmodal1"><i class="material-icons-card">play_circle_filled</i></a></li>
				<li id="btnmodal1unfinish" class="tab col m6"><a href="#testmodal2"><i class="material-icons-card">stop</i></a></li>
				<!--<div class="indicator grey" style="z-index:1"> </div>-->
			</ul>
		</div>
    </div>
	<div class="modal-content isi" style="padding-bottom:18%; margin-top:-5%; z-index: -1;">
	
		<div id="testmodal1" class="col m12" style="margin: 0px; padding:0px;" >
			<ul id="listmodal" class="collection white font_cardlist scrollable_list" style="overflow-y:auto;">
			</ul>
		</div>
		<div id="testmodal2" class="col m12" style="margin: 0px; padding:0px;"  >
			<ul id="listmodal2" class="collection white font_cardlist scrollable_list" style="overflow-y:auto;">
			</ul>
		</div>
	</div>
	<div class="modal-footer">
        <button id="submitmodal" class="modal-action modal-close waves-effect waves-green btn waves-effect waves-light">Submit</button>
	</div>
</div>

<div id="modal2" class="modal modal-fixed-footer" style="width: 25%;">
	<div class="modal-content">
		<div class="row">
			<div id="judulmenu" class="col m12 modal-trigger waves-effect waves-light" style="font-size:24px; font-family:mythirdfont; text-align:center">
                NAMA MENU
			</div>
            <div id="judulkode" class="col m12 modal-trigger waves-effect waves-light" style="visibility:hidden;">
                
			</div>
		</div>
		<div class="col m12" style="margin: 0px; padding:0px;">
			<ul class="tabs tabs-fixed-width " style="">
				<!--<div class="indicator grey" style="z-index:1"> </div>-->
			</ul>
		</div>
		<div class="col m12" style="margin: 0px; padding:0px;">
            <div class="row" style="font-family:mythirdfont;">
                <div class="col s8">NOMOR MEJA</div>
                <div class="col s4">FINISH</div>
            </div>
        </div>
        <div class="col m12" style="margin: 0px; padding:0px;">
			<ul id="listmodal21" class="collection white font_cardlist scrollable_list" style="font-family:mysecondfont;">
				
			</ul>
		</div>
	</div>
	<div class="modal-footer">
        <button id="submitmodal2" class="modal-action modal-close waves-effect waves-green btn waves-effect waves-light">Submit</button>
	</div>
</div>

<!-- modal 3-->    
<div id="modal3" class="modal modal-fixed-footer" style="width: 50%; overflow:auto;">
	<div class="modal-content">
        <div class="row">
			<div id="judulreport" class="col m12 modal-trigger waves-effect waves-light" style="font-size:24px; font-family:mythirdfont; text-align:center">
                NAMA REPORT
			</div>
		</div>
        <div class="col m12" style="margin: 0px; padding:0px;">
            <div class="row" style="font-family:mythirdfont;">
                <div class="col s6">NAMA MENU RECIPE</div>
                <div class="col s2">QTY</div>
                <div class="col s4">TABLE</div>
            </div>
        </div>
		<div class="col m12" style="margin: 0px; padding:0px;">
            <ul id="listmodal31" class="collection white font_cardlist scrollable_list" style="font-family:mysecondfont;">
				
			</ul>
        </div>
	</div>
</div>   
    
<script>

	//Define websocket server
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
    var now,hours,minutes,seconds;
    var ctr2=1;
    var boolWindowModal=false;
    var myElements;
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
				reloadalldata();
				break;
		}
	});
	Server.connect();
	
    
    function hitungDurasi(tanggalomset,jamtarget)
    {
         now = new Date().getTime();
         var date = tanggalomset.split("-");
                    e = parseInt(date[1]);
                   var d = month[e-1]+" "+date[2]+", "+date[0];
                
                    //alert(d);
                    
                    var testing = jamtarget.toString();
                    var test2 = d+" "+testing;
                    //alert(test2);
                    //test2 = "MAR 13, 2018 11:18:34";
                    var jamtarget = new Date(test2).getTime();
                    //alert(jamtarget-now);
        var hasil = new Array();
            hasil['durasi'] = jamtarget-now;
                    
            hasil['proses'] = (now-jamtarget)*(-1);
        return hasil;
    }
    
    function hitungSisawaktu(jamtarget,jamfinish)
    { 
        
        var d = "Jan 01, 1997";
        var test = jamtarget.toString();
        var a = d+" "+test;
        jamtarget= new Date(a).getTime();
        test = jamfinish.toString();
        var b = d+" "+test;
        jamfinish = new Date(b).getTime();
        var hasil = jamtarget-jamfinish;
        var m = Math.floor((hasil % (1000 * 60 * 60)) / (1000 * 60));
        var s = Math.floor((hasil % (1000 * 60)) /1000);
        if(hasil<=0)
        {
            m=0;s=0;        
        }
        return m+":"+s;
    }
    
    function getProgress(proses,db_durasi)
    {
        var temp = Math.floor((proses % (1000 * 60 * 60)) / (1000 * 60));
        proses = Math.floor(proses % (1000 * 60)/1000)  + (temp*60);
        var perdetik = 100/(db_durasi*60);//progressbar berjalan berapa perdetik
        var hasil = proses*perdetik;
        return hasil
    }
    
    function ProgressBarTick()
    {
            
            $.ajax({
			type:"GET", 
			dataType: 'json',
			url: "<?php echo site_url(); ?>" + "/Controller/get_allprogress", 
			data:{ "mode":"resep" },                                     
			success :function(result){
                var warnabar="";
                var ctr=1;
                var tmp=result[0]['nomormeja'];
                
                for(i=0;i<result.length;i++)
                {
                    if(tmp!=result[i]['nomormeja'])
                    {
                        ctr=1;
                        tmp=result[i]['nomormeja'];
                    }
                
                    var hasil = hitungDurasi(result[i]['tanggalomset'],result[i]['jamtarget'])
                    var durasi = hasil['durasi'];
                    var proses = hasil['proses'];   
                    
                    var progresbar = getProgress(proses,result[i]['durasi']);
                
                    warnabar = "greenteal";
                    
                    if(progresbar<=0)
                    {
                        progresbar=100;
                        durasi=0;
                        warnabar="red";
                    }
                    else
                    {        
                        if(progresbar<=50)
                        {
                            warnabar="yellow";
                        }
                    }
                    var m = Math.floor((durasi % (1000 * 60 * 60)) / (1000 * 60));
                    var s = Math.floor((durasi % (1000 * 60)) /1000);
                    if (result[i]['status']==0){
                       //alert(i+" "+ctr);
                        //alert(result[i]['nomormeja']+ctr);
                        document.getElementById("pB"+result[i]['nomormeja']+ctr).style.width = progresbar+"%";
                        document.getElementById("pB"+result[i]['nomormeja']+ctr).style.backgroundColor = warnabar;
                        document.getElementById("countdown"+result[i]['nomormeja']+ctr).innerHTML = m+":"+s;
                         document.getElementById("pBa"+result[i]['nomormeja']+ctr).style.width = progresbar+"%";
                        document.getElementById("pBa"+result[i]['nomormeja']+ctr).style.backgroundColor = warnabar;
                        document.getElementById("countdowna"+result[i]['nomormeja']+ctr).innerHTML = m+":"+s;



                        if(result[i]['nomormeja']==myElements && boolWindowModal)
                        {
                            document.getElementById("pBM"+myElements+ctr).style.width = progresbar+"%";
                            document.getElementById("pBM"+myElements+ctr).style.backgroundColor = warnabar;
                            document.getElementById("countdownM"+myElements+ctr).innerHTML = m+":"+s;
                        }

                        ctr=ctr+1;
                    }
                }
                
			}, error: function(msg){
				alert('ProggressBar Error');
			}
		});
    }
    
    function reloaddata(nomeja)
    {
        $.ajax({
			type:"GET", 
			dataType: 'json',
			url: "<?php echo site_url(); ?>" + "/Controller/get_progress/"+nomeja, 
			data:{ "mode":"resep" },                                     
			success :function(result){
				//$('#container').html(JSON.stringify(result));
                //$('#test'+result[0]['nomormeja']+'1').html(JSON.stringify(result));
                //alert(totmeja);
                for(i=0;i<result.length;i++){
                    $('#list'+result[i]['nomormeja']+'1').empty();
                    $('#list'+result[i]['nomormeja']+'3').empty();
                    $('#list'+result[i]['nomormeja']+'2').empty();
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
                     if (result[i]['status']==0){
                        $('#test'+result[i]['nomormeja']+'3 ul').append('<li class="collection-item "><div class="col m9 ">'+result[i]['namamenurecipe']+'</div><div id="countdowna'+result[i]['nomormeja']+ctr+'" class="col m2">0:0</div><div class="progress "><div id="pBa'+result[i]['nomormeja']+ctr+'"  class="determinate" style="width:0%"></div></div></li>');
                        $('#test'+result[i]['nomormeja']+'1 ul').append('<li class="collection-item "><div class="col m9 ">'+result[i]['namamenurecipe']+'</div><div id="countdown'+result[i]['nomormeja']+ctr+'" class="col m2">0:0</div><div class="progress "><div id="pB'+result[i]['nomormeja']+ctr+'"  class="determinate" style="width:0%"></div></div></li>');
                        ctr = ctr+1;
                    } 
                    if(result[i]['status']==1){
                        var sisawaktu = hitungSisawaktu(result[i]['jamtarget'],result[i]['jamfinish']);
                        $('#test'+result[i]['nomormeja']+'3 ul').append('<li class="collection-item "><div class="strikeout col m9">'+result[i]['namamenurecipe']+'</div><div>'+sisawaktu+'</div></li>');
                        $('#test'+result[i]['nomormeja']+'2 ul').append('<li class="collection-item "><div class="strikeout col m9">'+result[i]['namamenurecipe']+'</div><div>'+sisawaktu+'</div></li>');
                    }
                    
                    //alert("meja"+tmp+"ctr"+ctr);    
                }
			}, error: function(msg){
				alert('Reload Data Error');
			}
		});
    }
    
	function reloadalldata(){
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
                    $('#list'+result[i]['nomormeja']+'3').empty();
                    $('#list'+result[i]['nomormeja']+'2').empty();
                }
                var ctrrow=1;
                var tmp =0;
                var ctr=1;
                var ctrmeja=1;
                
                for(i=0;i<result.length;i++)
                {
                    if(tmp!=result[i]['nomormeja'])
                    {
                        //document.getElementById("hjam"+ctr).innerHTML = result[i]['jamorder'];
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
                        ctrmeja++;
                        if(ctrmeja%4==1){
                            ctrrow++;
                        }
                    }
                    //mengeluarkan list pesanan
                    //$('#test'+result[i]['nomormeja']+'1 ul').append('<li class="collection-item "><div class="col m9  ">'+result[i]['namamenurecipe']+'</div><div id="countdown'+result[i]['nomormeja']+ctr+'" class="col m2">0:0</div><div class="progress "><div id="pB'+result[i]['nomormeja']+ctr+'" class="determinate " style="width:0%"></div></div></li>');
                    
                    if (!document.getElementById("meja"+result[i]['nomormeja'])) {
                        if (!document.getElementById("rowid"+ctrrow)){
                            $('#checker_container').append('<div class="row barisMeja" id="rowid'+ctrrow+'"></div>');
                        }
                            $('#rowid'+ctrrow).append('<div id="meja'+result[i]['nomormeja']+'" class="card-panel col m3 blue-grey lighten-3 z-depth-1" style="padding: 5px; margin: 0.5rem 0rem 0.1rem 0rem;">'+
                        '<div class="meja row2 modal-trigger waves-effe  ct waves-light header" name="'+result[i]['nomormeja']+'" style="" href="#modal1">'+
                            '<div class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : '+result[i]['nomormeja']+'</div>'+
                            '<div id="hbill'+result[i]['nomormeja']+'" class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : 567512</div>'+
                            '<div id="hmenu'+result[i]['nomormeja']+'" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>'+
                            '<div id="hjam'+result[i]['nomormeja']+'" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">'+result[i]['jamorder']+'</div>'+
                            '<div id="hlama'+result[i]['nomormeja']+'" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>'+
                        '</div>'+
                        '<div class="row2 isi" id="rowlist'+result[i]['nomormeja']+'">'+
  
                        '</div>'+
                    '</div>');
                    $('#rowlist'+result[i]['nomormeja']).append('<div class="col m12" style="margin: 0px; padding:0px;">'+
                                '<ul class="tabs" id="tabs'+result[i]['nomormeja']+'" style="">'+
                                    '<li class="tab col m4"><a href="#test'+result[i]['nomormeja']+'1"><i class="material-icons-card">play_circle_filled</i></a></li>'+
                                    '<li class="tab col m4"><a href="#test'+result[i]['nomormeja']+'2"><i class="material-icons-card">stop</i></a></li>'+
                                    '<li class="tab col m4"><a href="#test'+result[i]['nomormeja']+'3"><i class="material-icons-card">dashboard</i></a></li>'+
                                '</ul>'+
                            '</div>');
                    $('#rowlist'+result[i]['nomormeja']).append('<div id="test'+result[i]['nomormeja']+'1" class="col m12" style="margin: 0px; padding:0px;">'+
                                '<ul id="list'+result[i]['nomormeja']+'1" class="collection white font_cardlist scrollable_list" style="">'+
                                '</ul>'+
                            '</div>');
                    $('#rowlist'+result[i]['nomormeja']).append('<div id="test'+result[i]['nomormeja']+'2" class="col m12" style="margin: 0px; padding:0px;">'+
                                '<ul id="list'+result[i]['nomormeja']+'2" class="collection white font_cardlist scrollable_list">'+
                                '</ul>'+
                            '</div>');
                    $('#rowlist'+result[i]['nomormeja']).append('<div id="test'+result[i]['nomormeja']+'3" class="col m12" style="margin: 0px; padding:0px;">'+
                                '<ul id="list'+result[i]['nomormeja']+'3" class="collection white font_cardlist scrollable_list">'+
                                '</ul>'+
                            '</div>');
                        
                    var $tabs = $('#tabs'+result[i]['nomormeja']);
                    $tabs.children().removeAttr('style');   
                        
                    }
                    if (result[i]['status']==0){
                        $('#test'+result[i]['nomormeja']+'3 ul').append('<li class="collection-item "><div class="col m9 ">'+result[i]['namamenurecipe']+'</div><div id="countdowna'+result[i]['nomormeja']+ctr+'" class="col m2">0:0</div><div class="progress "><div id="pBa'+result[i]['nomormeja']+ctr+'"  class="determinate" style="width:0%"></div></div></li>');
                        $('#test'+result[i]['nomormeja']+'1 ul').append('<li class="collection-item "><div class="col m9 ">'+result[i]['namamenurecipe']+'</div><div id="countdown'+result[i]['nomormeja']+ctr+'" class="col m2">0:0</div><div class="progress "><div id="pB'+result[i]['nomormeja']+ctr+'"  class="determinate" style="width:0%"></div></div></li>');
                        ctr = ctr+1;
                    } 
                   if(result[i]['status']==1){
                        var sisawaktu = hitungSisawaktu(result[i]['jamtarget'],result[i]['jamfinish']);
                        $('#test'+result[i]['nomormeja']+'3 ul').append('<li class="collection-item "><div class="strikeout col m9">'+result[i]['namamenurecipe']+'</div><div>'+sisawaktu+'</div></li>');
                        $('#test'+result[i]['nomormeja']+'2 ul').append('<li class="collection-item "><div class="strikeout col m9">'+result[i]['namamenurecipe']+'</div><div>'+sisawaktu+'</div></li>');
                    }
                    
                    $tabs.tabs().tabs('select_tab', 'test'+result[i]['nomormeja']+'2');
                    $tabs.tabs().tabs('select_tab', 'test'+result[i]['nomormeja']+'3');
                    $tabs.tabs().tabs('select_tab', 'test'+result[i]['nomormeja']+'1');
                    //alert("meja"+tmp+"ctr"+ctr);    
                }
			}, error: function(msg){
				alert('Reload Data Error');
			}
		});
	}
    
	 $(document).ready(function(){
	// // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
	$('.modal').modal();
         
        //modal 1
       $(document).on("click", ".meja", function () {
        boolWindowModal=true;
        myElements = $(this).attr('name');//dapetin nomor meja
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
                ctr2=1;
                for(i=0;i<result.length;i++)
                {
                    var str="";
                    if(result[i]["STATUS"]!=1)
                    {
                        str = '<li class="collection-item ">'
                                +'<div class="row">'
                                    +'<div class="col s8 menu modal-trigger waves-effe" name="'+result[i]['NAMAMENURECIPE']+"_"+result[i]['KODEMENURECIPE']+'" href="#modal2">'+result[i]['NAMAMENURECIPE']+'</div>'
                                    +'<div id="countdownM'+myElements+ctr2+'" class="col s2">00:00</div>'
                                    +'<div class="col s2"><input type="checkbox" class="filled-in" id="cb'+i+'" name="f_'+result[i]['KODETRANS']+'" /><label for="cb'+i+'"></label></div>'
                                +'</div>'
                                +'<div class="col m2"></div>'
                                +'<div class="progress"><div id="pBM'+myElements+ctr2+'" class="determinate" style="width:'+
                    document.getElementById("pB"+myElements+ctr2).style.width+'"></div></div>'
                            +'</li>'; 
                        $('#listmodal').append(str);
                        ctr2 = ctr2+1;
                    }
                    else
                    {
                        var sisawaktu = hitungSisawaktu(result[i]['JAMTARGET'],result[i]['JAMFINISH']);
                         str = '<li class="collection-item ">'
                                +'<div class="row">'
                                    +'<div class="col s8">'+result[i]['NAMAMENURECIPE']+'</div>'
                                    +'<div class="col s2">'+sisawaktu+'</div>'
                                    +'<div class="col s2"><input type="checkbox" class="filled-in" id="cb'+i+'" name="u_'+result[i]['KODETRANS']+'"/><label for="cb'+i+'"></label></div>'
                                +'</div>'
                                +'<div class="col m2"></div>'
                            +'</li>'; 
                        $('#listmodal2').append(str);
                    }
                }
                
			}, error: function(msg){
				alert('Reload Modal Error');
			}
		});
    });
         
    $(document).on("click", "#btnReport1", function(){
        document.getElementById("judulreport").innerHTML = "LAPORAN REKAP MENU";
        $("#modal3").modal("open");

        
    });
    $(document).on("click", "#btnReport2", function(){
        document.getElementById("judulreport").innerHTML = "LAPORAN MENU";
        $("#modal3").modal("open");
    }); 
    function get_report_data1(){
        $.ajax({
		type:"GET", 
		dataType: 'json',
		url: "<?php echo site_url(); ?>" + "/Controller/getReport1/", 
		data:{ "mode":"resep" },                                     
		success :function(result){
            for(i=0;i<result.length;i++)
            {
                var str = '<li class="collection-item ">'
                                +'<div class="row">'
                                    +'<div class="col s6 menu">'+result[i]['NAMAMENURECIPE']+'</div>'
                                    +'<div class="col s2 menu">'+result[i]['QTY']+'</div>'
                                    +'<div class="col s4 menu">'+result[i]['listmeja']+'</div>'
                                +'</div>'
                            +'</li>'; 
                $("#listmodal31").append(str);
                    
            }
            
        }
       });
    } 
    //modal 2
    $(document).on("click", ".menu", function () {
       
        var bantu = $(this).attr('name').split("_");
        var judulmenu = bantu[0];//dapetin nama menu
        var kodemenu = bantu[1];
        document.getElementById("judulmenu").innerHTML = judulmenu;
        document.getElementById('judulkode').innerHTML = kodemenu;
        $.ajax({
			type:"GET", 
			dataType: 'json',
			url: "<?php echo site_url(); ?>" + "/Controller/get_multimeja/"+kodemenu+"/0", 
			data:{ "mode":"resep" },                                     
			success :function(result){
                totaldatamodal=result.length;
                $('#listmodal21').empty();
                $('#listmodal22').empty();
                for(i=0;i<result.length;i++)
                {
                        var strg = '<li class="collection-item ">'
                                +'<div class="row">'
                                    +'<div class="col s8">'+result[i]['NOMORMEJA']+'</div>'
                                    +'<div class="col s4"><input type="checkbox" class="filled-in" id="cb1'+i+'" name="'+result[i]['KODETRANS']+"_"+result[i]['NOMORMEJA']+'"/><label for="cb1'+i+'"></label></div>'
                                +'</div>'
                            +'</li>'; 
                        $('#listmodal21').append(strg);
                }
                
            },
            error: function(msg){
				alert('Reload Modal 2 Error');
			}
		});
        
    });
         
    
   $("#submitmodal").click(function(){
       boolWindowModal=false;
        var hasil="";
        for(i=0;i<totaldatamodal;i++)
        {
            if($('#cb'+i).is(':checked')==true)
            {      
                hasil = hasil + $('#cb'+i).attr('name')+".";
            }
        }
       hasil = hasil.substring(0,hasil.length-1);
        $.ajax({
			type:"post", 
            dataType:"json",
			url: "<?php echo site_url(); ?>" + "/Controller/update_status/"+hasil, 
			data:{ "mode":"resep" },                                     
			success :function(result){
                document.getElementById('dashtotalorder').innerHTML= result["totalfinishorder"]+" / "+result["totalorder"];
                reloaddata(myElements);
            }, error: function(msg){
                alert('Submit Modal Error');
            }
        });
   });
       
                                 
   $("#submitmodal2").click(function(){
       var hasil="";
       for(i=0;i<totaldatamodal;i++)
        {
            if($('#cb1'+i).is(':checked')==true)
            {
                hasil = hasil +$('#cb1'+i).attr('name')+".";        
            }
        }
       
       hasil = hasil.substring(0,hasil.length-1);
       $.ajax({
			type:"post", 
            dataType:"json",
			url: "<?php echo site_url(); ?>" + "/Controller/update_statusmulti/"+hasil, 
			data:{ "mode":"resep" },                                     
			success :function(result){
                var tmp=0;
                for(i=1;i<totaldatamodal;i++)
                {
                    reloaddata(result[i])
                }
                document.getElementById('dashtotalorder').innerHTML= result["totalfinishorder"]+" / "+result["totalorder"];
            }, error: function(msg){
                alert('Submit Modal Error');
            }
        });
     $('#modal1').modal('close');
       
   });
         
         
   $("#btnmodal1finish").click(function(){
       document.getElementById('m_mode').innerHTML="FINISH";
       document.getElementById('m_mode').style.color="Red";
       
   });

   $("#btnmodal1unfinish").click(function(){
       document.getElementById('m_mode').innerHTML="UNFINISH";
       document.getElementById('m_mode').style.color="Green";
       
   });

         
	$('ul.tabs').tabs({
		swipeable : false
	});
        get_report_data1(); 
		reloadalldata();
        ProgressBarTick();
	// //$('ul.tabs').tabs('select_tab', 'tab_id');
 });
</script>
</body>
</html>