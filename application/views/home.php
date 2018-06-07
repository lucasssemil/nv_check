<?php
$this->load->library('session');
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
        .collapsible li.active {
            background-color: green;
}
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
        .collIsi{
            background: white;
            color: black;
            padding:2px;
        }
        .isi .makeScroll{
            height: 200px;
            overflow-y: auto;
        }
        ::-webkit-scrollbar {
            width: 12px;
        }

        /* Track */
        .isi::-webkit-scrollbar-track {
            background-color:transparent;
        }

        /* Handle */
        div::-webkit-scrollbar-thumb {
            background: lightcyan;
        }
        dv::-webkit-scrollbar-thumb:window-inactive {
            background: rgba(255,0,0,0.4); 
        }
        ::-webkit-scrollbar-track-piece
        {
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
	<div class="row">
		<div class="card col m2 z-depth-1 blue-grey darken-4" style="height: 700px; font-family:myfirstfont; position:fixed;">
			<div class="font_clock" style="color:white; font-size:24pt; text-align:center;"><?php echo date('Y/m/d'); ?></div>
            <div class="font_clock" id="clock" style="color:white;font-size:34pt; text-align:center;">00:00:00</div>
			<table class="col m12 ">
				<tbody>
					<tr style="padding:0; color:white;">
						<td style="padding:0;"><i class="material-icons-sidebar">receipt</i></td>
						<td id="dashtotalmeja" style="padding:0;" class="font_info">0</td>
						<td style="padding:0;"><i class="material-icons-sidebar">people</i> </td>
						<td id="dashtotalorang"style="padding:0;" class="font_info">0</td>
						<td style="padding:0;"><i class="material-icons-sidebar">room_service</i></td>
						<td id="dashtotalorder" style="padding:0;" class="font_info"><?php echo $totalfinishorder." / ".$totalorder; ?></td>
					</tr>
					<tr style="color:white;">
						<td style="padding:0;"><i class="material-icons-sidebar">sentiment_very_satisfied</i></td>
						<td id="dashtotalhappy" style="padding:0;" class="font_info">0</td>
						<td style="padding:0;"><i class="material-icons-sidebar">sentiment_satisfied</i></td>
						<td id="dashtotalnormal" style="padding:0;" class="font_info">0</td>
						<td style="padding:0;"><i class="material-icons-sidebar">sentiment_very_dissatisfied</i></td>
						<td id="dashtotalsad" style="padding:0;" class="font_info">0</td>
					</tr>
				</tbody>
			</table>
            
            <a id="btnReport1" class="waves-effect waves-light btn-large col s12" style="margin-top:10%;"><i class="material-icons left">book</i>LAPORAN REKAP MENU</a>
            <a id="btnReport2" class="waves-effect waves-light btn-large col s12" style="margin-top:10%;"><i class="material-icons left">book</i>LAPORAN MENU</a>
            <a id="btnReport3" class="waves-effect waves-light btn-large col s12" style="margin-top:10%;"><i class="material-icons left">book</i>LAPORAN HARIAN</a>
            <a id="btnReport4" class="waves-effect waves-light btn-large col s12" style="margin-top:10%;"><i class="material-icons left">book</i>LAPORAN RESTORAN</a>
				<label>KODE LOKASI : <?php echo $this->session->userdata('kodelokasi'); ?></label>
				<select id="h_kodelokasi" style="display:inline" onchange="myFunction()">
  				<option value="" disabled selected>Pilih Lokasi</option>
					<?php
						 foreach($kodelokasi as $t)
						{
							echo '<option value="'.$t["KODELOKASI"].'">'.$t["KODELOKASI"].'</option>';
						}
					?>
				</select>
		</div>
		<div id="checker_container" class="col m10" style="margin-left:16%;">
            <div id="loading" style="margin-top:15%; margin-left:35%;  position:fixed; z-index:-1;">
                <div class="preloader-wrapper big active" >
                <div class="spinner-layer spinner-red-only">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>
              </div>
                <BR><B>LOADING...</B>
            </div>
		</div>
	</div>
</div>
    
<!-- modal -->
<div id="modal1" class="modal modal-fixed-footer" style="width: 50%; margin:center;overflow:hidden;" >
    <div class=" row" style="margin-top:2%; z-index: 1;">
        <div id="h_modal1" class="col m12 header modal-trigger waves-effect waves-light" style="overflow:hidden;">
                <div id="m_mode" class="col m12 font_cardheader blue-grey lighten-3 " style="text-align:center; font-size:24px; color:red;">FINISH</div>
				<div id="m_nomeja" class="col m8 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : 1</div>
				<div id="m_bill" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="align-text: right">BILL : 567512</div>
				<div id="m_pesanan" class="col m5 font_cardheader blue-grey lighten-3 black-text" style="">1/4</div>
				<div id="m_jam" class="col m3 font_cardheader blue-grey lighten-3 black-text" style="">14:30:00</div>
				<div id="m_lama" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>
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
	<div class="modal-content" >
		<div class="row" style="position:sticky;">
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
			<ul id="listmodal21" class="collection white font_cardlist scrollable_list" style="font-family:mysecondfont; overflow-y:auto;">
				
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
			<div class="col m12 modal-trigger waves-effect waves-light" style="font-size:24px; font-family:mythirdfont; text-align:center">
                LAPORAN REKAP MENU
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
    
<!-- modal 4-->    
<div id="modal4" class="modal modal-fixed-footer" style="width: 50%; overflow:auto;">
	<div class="modal-content">
        <div class="row">
			<div class="col m12 modal-trigger waves-effect waves-light" style="font-size:24px; font-family:mythirdfont; text-align:center">
                 LAPORAN MENU
			</div>
		</div>
        <div class="col m12" style="margin: 0px; padding:0px;">
            <div class="row" style="font-family:mythirdfont;">
                <div class="col s4">NAMA MENU RECIPE</div>
                <div class="col s2">TABLE</div>
                <div class="col s4">JAM ORDER</div>
                <div class="col s2">DURASI</div>
            </div>
        </div>
		<div class="col m12" style="margin: 0px; padding:0px;">
            <ul id="listmodal41" class="collection white font_cardlist scrollable_list" style="font-family:mysecondfont;">
				
			</ul>
        </div>
	</div>
</div>  

<!--modal 5 report 3-->
    <div id="modal5" class="modal modal-fixed-footer" style="width: 50%; overflow:auto;">
	<div class="modal-content">
        <div class="row">
			<div class="col m12 modal-trigger waves-effect waves-light" style="font-size:24px; font-family:mythirdfont; text-align:center">
                 LAPORAN HARIAN
			</div>
		</div>
        <div class="col m12" style="margin: 0px; padding:0px;">
            <div class="row" style="font-family:mythirdfont;">
                <div class="col s2">TANGGAL</div>
                <div class="col s3">KODE TRANSAKSI</div>
                <div class="col s2">TABLE</div>
                <div class="col s4">NAMA MENU</div>
            </div>
        </div>
		<div class="col m12" style="margin: 0px; padding:0px;">
            <ul id="listmodal51" class="collection white font_cardlist scrollable_list" style="font-family:mysecondfont;">
				
			</ul>
        </div>
	</div>
    </div>  
<!-- modal 6 report 4-->
        <div id="modal6" class="modal modal-fixed-footer" style="width: 50%; overflow:auto;">
	<div class="modal-content">
        <div class="row">
			<div class="col m12 modal-trigger waves-effect waves-light" style="font-size:24px; font-family:mythirdfont; text-align:center">
                 LAPORAN RESTORAN
			</div>
		</div>
        <div class="col m12" style="margin: 0px; padding:0px;">
            <div class="row" style="font-family:mythirdfont;">
                <div class="col s3">KODE LOKASI</div>
                <div class="col s3">NOMOR MEJA</div>
                <div class="col s6">STATUS</div>
            </div>
        </div>
		<div class="col m12" style="margin: 0px; padding:0px;">
            <ul id="listmodal61" class="collection white font_cardlist scrollable_list" style="font-family:mysecondfont;">
				
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
    var totalmeja=0;   
    var data;
    var x = setInterval(function(){
        now = new Date().getTime();
    
        hours = new Date().getHours();
        minutes = Math.floor((now % (1000 * 60 * 60)) / (1000 * 60));
        seconds = Math.floor((now % (1000 * 60)) /1000);
        
        
        
        document.getElementById("clock").innerHTML = hours+" : "+minutes+" : "+seconds;
        
        //for(var i=1;i<7;i++)
        //{
        //    var waktu = new Date("2011/03/04 "+data[i]["jamorder"]);
        //    waktu = now-waktu;
        //    h = Math.floor((waktu % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        //    m = Math.floor((waktu % (1000 * 60 * 60)) / (1000 * 60));
        //    s = Math.floor((waktu % (1000 * 60)) /1000);
        //    document.getElementById('hlama'+i).innerHTML = h+":"+m+":"+s ;        
        //}
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
	
    
    function hitungDurasi(tglomzet,jamtarget)
    {
         now = new Date().getTime();
         var date = tglomzet.split("-");
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
    
    var happy = 0;
    var normal = 0;
    var sad = 0;
    var durasimeja;
    var nomeja;
    
    function getAllData()
    {        
        data=[];
        durasimeja=[];
       
        
         $.ajax({
			type:"GET", 
			dataType: 'json',
			url: "<?php echo site_url(); ?>" + "/Controller/get_allprogress", 
			data:{ "mode":"resep" },                                     
			success :function(result){
            for(i=0;i<result.length;i++)
            {
                data[i]=[];
                data[i]["nomormeja"]=result[i]["nomormeja"];
                data[i]["tglomzet"]=result[i]["tglomzet"];
                data[i]["jamtarget"]=result[i]["jamtarget"];
                data[i]["durasi"]=result[i]["durasi"];
                data[i]["jamorder"]=result[i]["jamorder"];
            }
             for(i=0;i<nomeja.length;i++)
            {
                var d1 = document.getElementById("hjam"+nomeja[i]).innerHTML;
                var d2 = d1.split(":");//d2[0]=jam,d2[1]=menit,d2[2]=detik masuk
                now = new Date().getTime();
                var h = new Date().getHours();
                var m = Math.floor((now % (1000 * 60 * 60)) / (1000 * 60));
                var s = Math.floor((now % (1000 * 60)) / 1000);
                var hs = h-d2[0];
                var ms = m-d2[1];
                var ss = s-d2[2];
                if(ms<0 && hs>0)
                {
                    hs = hs-1;
                    ms = ms+60;
                }
                if(ss<0 && ms >0)
                {
                    ms = ms-1;
                    ss = ss+60;
                }
                d1= hs+":"+ms+":"+ss;
                durasimeja[i]=d1;
            }
                
			}, error: function(msg){
				alert('Ambil data Error');
			}
		});
    }
    
    
    function ProgressBarTick()
    {
        var warnabar="";
        var ctr=1;
        var tmp=data[0]['nomormeja'];
        
        var t = document.getElementById("dashtotalmeja").innerHTML
        for(i=0;i<nomeja.length;i++)
        {
            var d1 = durasimeja[i].split(":");//d1[0]=jam,d1[1]=menit,d1[2]=detik lama meja
            d1[2] = parseInt(d1[2])+1;
            if(d1[2]>=60)
            {
                d1[1]= parseInt(d1[1])+1;
                d1[2]= parseInt(d1[2])-60;
                if(d1[1]>=60)
                {
                    d1[0]=parseInt(d1[0])+1;
                    d1[1]= parseInt(d1[1])-60;
                }
            }
            durasimeja[i] = d1[0]+":"+d1[1]+":"+d1[2];
           document.getElementById("hlama"+nomeja[i]).innerHTML = durasimeja[i];
        }
        
        happy=0;
        normal=0;
        sad=0;
        for(i=0;i<data.length;i++)
        {
            if(tmp!=data[i]['nomormeja'])
            {
                ctr=1;
                tmp=data[i]['nomormeja'];
            }
        
            var hasil = hitungDurasi(data[i]['tglomzet'],data[i]['jamtarget'])
            var durasi = hasil['durasi'];
            var proses = hasil['proses'];   
            
            var progresbar = getProgress(proses,data[i]['durasi']);
        
            warnabar = "greenteal";
            
            if(progresbar<=0)
            {
                progresbar=100;
                durasi=0;
                warnabar="red";
                sad = sad+1;
            }
            else
            {        
                if(progresbar<=50)
                {
                    warnabar="yellow";
                    normal = normal+1;
                }
                else{
                    happy = happy+1;
                }
            }
            var m = Math.floor((durasi % (1000 * 60 * 60)) / (1000 * 60));
            var s = Math.floor((durasi % (1000 * 60)) /1000);
               //alert(i+" "+ctr);
                //alert(result[i]['nomormeja']+ctr);
            document.getElementById("pB"+data[i]['nomormeja']+ctr).style.width = progresbar+"%";
            document.getElementById("pB"+data[i]['nomormeja']+ctr).style.backgroundColor = warnabar;
            document.getElementById("countdown"+data[i]['nomormeja']+ctr).innerHTML = m+":"+s;
            document.getElementById("pBa"+data[i]['nomormeja']+ctr).style.width = progresbar+"%";
            document.getElementById("pBa"+data[i]['nomormeja']+ctr).style.backgroundColor = warnabar;
            document.getElementById("countdowna"+data[i]['nomormeja']+ctr).innerHTML = m+":"+s;
            if(data[i]['nomormeja']==myElements && boolWindowModal)
            {
                document.getElementById("m_lama").innerHTML = document.getElementById("hlama"+myElements).innerHTML;
                document.getElementById("pBM"+myElements+ctr).style.width = progresbar+"%";
                document.getElementById("pBM"+myElements+ctr).style.backgroundColor = warnabar;
                document.getElementById("countdownM"+myElements+ctr).innerHTML = m+":"+s;
            }
            ctr=ctr+1;
        }
        
        document.getElementById("dashtotalhappy").innerHTML = happy;
        document.getElementById("dashtotalnormal").innerHTML = normal;
        document.getElementById("dashtotalsad").innerHTML = sad;
         document.getElementById("loading").style.visibility = "hidden";
    
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
                var tmptotal=0;
                var tmpfinish=0;
                
                ctr=1;
                tmp=result[0]['nomormeja'];
                
                for(i=0;i<result.length;i++){
                    
                    //ganti meja
                    if(tmp!=result[i]['nomormeja'])
                    {
                        ctr=1;
                        tmptotal=0;
                        tmpfinish=0;
                        tmp=result[i]['nomormeja'];
                    }
                    //mengeluarkan list pesanan
                     if(result[i]['URUTANCHECKER']==-1){
                        if (result[i]['status']==0){
                            $('#list'+result[i]['nomormeja']+'3').append('<li class="collection-item ">'+
                            '<div class="collIsi collapsible-header" style="padding:2px;"><div class="col m9 ">'+result[i]['namamenurecipe']+'</div>'+
                            '<div id="countdowna'+result[i]['nomormeja']+ctr+'" class="col m2">0:0</div>'+
                            '</div>'+
                            '<div class="collIsi collapsible-body">'+
                            '<ul id="listModif'+result[i]['URUTAN']+result[i]['nomormeja']+'3" class="collection white font_cardlist  scrollable_list"></ul>'+
                            '</div>'+
                            '<div class="progress "><div id="pBa'+result[i]['nomormeja']+ctr+'"  class="determinate" style="width:0%"></div></div></li>');

                            $('#list'+result[i]['nomormeja']+'1').append('<li class="collection-item ">'+
                            '<div class="collIsi collapsible-header" style="padding:2px;"><div class="col m9 ">'+result[i]['namamenurecipe']+'</div>'+
                            '<div id="countdown'+result[i]['nomormeja']+ctr+'" class="col m2">0:0</div>'+
                            '</div>'+
                            '<div class="collIsi collapsible-body">'+
                            '<ul id="listModif'+result[i]['URUTAN']+result[i]['nomormeja']+'1" class="collection white font_cardlist  scrollable_list"></ul>'+
                            '</div>'+
                            '<div class="progress "><div id="pB'+result[i]['nomormeja']+ctr+'"  class="determinate" style="width:0%"></div></div></li>');
                            ctr = ctr+1;  
                        }
                       if(result[i]['status']==1){
                            var sisawaktu = hitungSisawaktu(result[i]['jamtarget'],result[i]['jamfinish']);
                            $('#list'+result[i]['nomormeja']+'3').append('<li class="collection-item "><div class="collIsi collapsible-header" style="padding:2px;"><div class="col m9"><strike>'+result[i]['namamenurecipe']+'</strike></div><div class="col m2">'+sisawaktu+'</div></div>'+
                            '<div class="collIsi collapsible-body">'+
                            '<ul id="listModif'+result[i]['URUTAN']+result[i]['nomormeja']+'3" class="collection white font_cardlist  scrollable_list"></ul>'+
                            '</div>'+
                            '</li>');
                            $('#list'+result[i]['nomormeja']+'2').append('<li class="collection-item "><div class="collIsi collapsible-header" style="padding:2px;"><div class="col m9"><strike>'+result[i]['namamenurecipe']+'</strike></div><div class="col m2">'+sisawaktu+'</div></div>'+
                            '<div class="collIsi collapsible-body">'+
                            '<ul id="listModif'+result[i]['URUTAN']+result[i]['nomormeja']+'2" class="collection white font_cardlist  scrollable_list"></ul>'+
                            '</div>'+
                            '</li>');
                           tmpfinish = tmpfinish+1;
                        }
                        tmptotal=tmptotal+1; 
                    }else{
                        var temp=str = result[i]['namamenurecipe'].replace(/\s/g, '');
                        //alert(temp);
                        $('#listModif'+result[i]['URUTANCHECKER']+result[i]['nomormeja']+'1').append('<li class="collection-item "><span style="margin-left:13%">'+
                        temp+
                        '</span></li>');
                        
                        $('#listModif'+result[i]['URUTANCHECKER']+result[i]['nomormeja']+'3').append('<li class="collection-item "><span style="margin-left:13%">'+
                        temp+
                        '</span></li>');
                        
                        $('#listModif'+result[i]['URUTANCHECKER']+result[i]['nomormeja']+'2').append('<li class="collection-item "><span style="margin-left:13%">'+
                        temp+
                        '</span></li>');
                        //alert(result[i]['namamenurecipe']+"urutan "+result[i]['URUTANCHECKER']);
                    }
                    document.getElementById("hmenu"+result[i]['nomormeja']).innerHTML = tmpfinish+"/"+tmptotal;
                    
                    //alert("meja"+tmp+"ctr"+ctr);    
                }
			}, error: function(msg){
				alert('Reload Data Error');
			}
		});
        getAllData();
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
                //alert(result);
                for(i=0;i<result['datameja'].length;i++){
                    $('#list'+result['datameja'][i]['nomormeja']+'1').empty();
                    $('#list'+result['datameja'][i]['nomormeja']+'3').empty();
                    $('#list'+result['datameja'][i]['nomormeja']+'2').empty();
                }
                var ctrrow=1;
                var tmp =0;
                var ctr=1;
                var ctrmeja=1;
                
                
                //untuk inisiasi variabel progressbar dan countdown
                ctr=1;
                var ctr2=0;
                var tmpfinish=0;
                var tmptotal=0;
                tmp=result['datameja'][0]['nomormeja'];
                nomeja=[];
                nomeja[ctr2]=tmp;
                for(i=0;i<result['datameja'].length;i++){
                    if(tmp!=result['datameja'][i]['nomormeja'])
                    { 
                        ctr=1;
                        tmptotal=0;
                        tmpfinish=0;
                        ctr2=ctr2+1;
                        tmp=result['datameja'][i]['nomormeja'];
                        nomeja[ctr2]=tmp;
                        ctrmeja++;
                        if(ctrmeja%4==1){
                            ctrrow++;
                        }
                    }
                    //mengeluarkan list pesanan
                    //$('#test'+result[i]['nomormeja']+'1 ul').append('<li class="collection-item "><div class="col m9  ">'+result[i]['namamenurecipe']+'</div><div id="countdown'+result[i]['nomormeja']+ctr+'" class="col m2">0:0</div><div class="progress "><div id="pB'+result[i]['nomormeja']+ctr+'" class="determinate " style="width:0%"></div></div></li>');
                    
                    if (!document.getElementById("meja"+result['datameja'][i]['nomormeja'])) {
                        if (!document.getElementById("rowid"+ctrrow)){
                            $('#checker_container').append('<div class="row barisMeja" id="rowid'+ctrrow+'"></div>');
                        }
                            $('#rowid'+ctrrow).append('<div id="meja'+result['datameja'][i]['nomormeja']+'" class="card-panel col m3 blue-grey lighten-3 z-depth-1" style="padding: 5px; margin: 0.5rem 0rem 0.1rem 0rem;">'+
                        '<div class="meja row2 modal-trigger waves-effe  ct waves-light header" name="'+result['datameja'][i]['nomormeja']+'" style="" href="#modal1">'+
                            '<div id="hmeja'+result['datameja'][i]['nomormeja']+'" class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">TABLE : '+result['datameja'][i]['nomormeja']+'</div>'+
                            '<div id="hbill'+result['datameja'][i]['nomormeja']+'" class="col m6 font_cardheader blue-grey lighten-3 black-text" style="">BILL : '+result['dataheader'][ctr2]['kodetrans']+'</div>'+
                            '<div id="hmenu'+result['datameja'][i]['nomormeja']+'" class="col m4 font_cardheader blue-grey lighten-3 black-text" style=""></div>'+
                            '<div id="hjam'+result['datameja'][i]['nomormeja']+'" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">'+result['datameja'][i]['JAMORDER']+'</div>'+
                            '<div id="hlama'+result['datameja'][i]['nomormeja']+'" class="col m4 font_cardheader blue-grey lighten-3 black-text" style="">00:00</div>'+
                        '</div>'+
                        '<div class="row2 isi" id="rowlist'+result['datameja'][i]['nomormeja']+'">'+
  
                        '</div>'+
                    '</div>');
                    $('#rowlist'+result['datameja'][i]['nomormeja']).append('<div class="col m12" style="margin: 0px; padding:0px;">'+
                                '<ul class="tabs" id="tabs'+result['datameja'][i]['nomormeja']+'" style="">'+
                                    '<li class="tab col m4"><a href="#test'+result['datameja'][i]['nomormeja']+'1"><i class="material-icons-card">play_circle_filled</i></a></li>'+
                                    '<li class="tab col m4"><a href="#test'+result['datameja'][i]['nomormeja']+'2"><i class="material-icons-card">stop</i></a></li>'+
                                    '<li class="tab col m4"><a href="#test'+result['datameja'][i]['nomormeja']+'3"><i class="material-icons-card">dashboard</i></a></li>'+
                                '</ul>'+
                            '</div>');
                    $('#rowlist'+result['datameja'][i]['nomormeja']).append('<div id="test'+result['datameja'][i]['nomormeja']+'1" class="col m12  makeScroll" style="margin: 0px; padding:0px; overflow-y:auto;">'+
                                '<ul id="list'+result['datameja'][i]['nomormeja']+'1" class="collection white font_cardlist collapsible scrollable_list" style="">'+
                                '</ul>'+
                            '</div>');
                    $('#rowlist'+result['datameja'][i]['nomormeja']).append('<div id="test'+result['datameja'][i]['nomormeja']+'2" class="col m12 makeScroll" style="margin: 0px; padding:0px;overflow-y:auto;"" style="margin: 0px; padding:0px;">'+
                                '<ul id="list'+result['datameja'][i]['nomormeja']+'2" class="collection white font_cardlist collapsible scrollable_list">'+
                                '</ul>'+
                            '</div>');
                    $('#rowlist'+result['datameja'][i]['nomormeja']).append('<div id="test'+result['datameja'][i]['nomormeja']+'3" class="col m12 makeScroll" style="margin: 0px; padding:0px;overflow-y:auto;"" style="margin: 0px; padding:0px;">'+
                                '<ul id="list'+result['datameja'][i]['nomormeja']+'3" class="collection white font_cardlist collapsible scrollable_list">'+
                                '</ul>'+
                            '</div>');
                        
                    var $tabs = $('#tabs'+result['datameja'][i]['nomormeja']);
                    $tabs.children().removeAttr('style');   
                    var parent = document.getElementById('#rowlist'+result['datameja'][i]['nomormeja']);
                    var child = document.getElementById('test'+result['datameja'][i]['nomormeja']+'1');
                    child.style.right = child.clientWidth - child.offsetWidth + "px";
                     child = document.getElementById('test'+result['datameja'][i]['nomormeja']+'2');
                    child.style.right = child.clientWidth - child.offsetWidth + "px";
                     child = document.getElementById('test'+result['datameja'][i]['nomormeja']+'3');
                    child.style.right = child.clientWidth - child.offsetWidth + "px";
                    }
                    if(result['datameja'][i]['URUTANCHECKER']==-1){
                        if (result['datameja'][i]['STATUS']==0){
                            $('#list'+result['datameja'][i]['nomormeja']+'3').append('<li class="collection-item">'+
                            '<div class="collIsi collapsible-header" style="padding:2px;"><div class="col m9 ">'+result['datameja'][i]['NAMAMENURECIPE']+'</div>'+
                            '<div id="countdowna'+result['datameja'][i]['nomormeja']+ctr+'" class="col m2">0:0</div>'+
                            '</div>'+
                            '<div class="collIsi collapsible-body">'+
                            '<ul id="listModif'+result['datameja'][i]['URUTAN']+result['datameja'][i]['nomormeja']+'3" class="collection white font_cardlist  scrollable_list"></ul>'+
                            '</div>'+
                            '<div class="progress "  style="background-color:white;"><div id="pBa'+result['datameja'][i]['nomormeja']+ctr+'"  class="determinate" style="width:0%"></div></div></li>');

                            $('#list'+result['datameja'][i]['nomormeja']+'1').append('<li class="collection-item ">'+
                            '<div class="collIsi collapsible-header" style="padding:2px;"><div class="col m9 ">'+result['datameja'][i]['NAMAMENURECIPE']+'</div>'+
                            '<div id="countdown'+result['datameja'][i]['nomormeja']+ctr+'" class="col m2">0:0</div>'+
                            '</div>'+
                            '<div class="collIsi collapsible-body">'+
                            '<ul id="listModif'+result['datameja'][i]['URUTAN']+result['datameja'][i]['nomormeja']+'1" class="collection white font_cardlist  scrollable_list"></ul>'+
                            '</div>'+
                            '<div class="progress" style="background-color:white;"><div id="pB'+result['datameja'][i]['nomormeja']+ctr+'"  class="determinate" style="width:0%"></div></div></li>');
                            ctr = ctr+1;   
                        }
                       if(result['datameja'][i]['STATUS']==1){
                            var sisawaktu = hitungSisawaktu(result['datameja'][i]['JAMTARGET'],result['datameja'][i]['JAMFINISH']);
                            $('#list'+result['datameja'][i]['nomormeja']+'3').append('<li class="collection-item "><div class="collIsi collapsible-header" style="padding:2px;"><div class="col m9"><strike>'+result['datameja'][i]['NAMAMENURECIPE']+'</strike></div><div class="col m2">'+sisawaktu+'</div></div>'+
                            '<div class="collIsi collapsible-body">'+
                            '<ul id="listModif'+result['datameja'][i]['URUTAN']+result['datameja'][i]['nomormeja']+'3" class="collection white font_cardlist  scrollable_list"></ul>'+
                            '</div>'+
                            '</li>');
                            $('#list'+result['datameja'][i]['nomormeja']+'2').append('<li class="collection-item "><div class="collIsi collapsible-header" style="padding:2px;"><div class="col m9"><strike>'+result['datameja'][i]['NAMAMENURECIPE']+'</strike></div><div class="col m2">'+sisawaktu+'</div></div>'+
                            '<div class="collIsi collapsible-body">'+
                            '<ul id="listModif'+result['datameja'][i]['URUTAN']+result['datameja'][i]['nomormeja']+'2" class="collection white font_cardlist  scrollable_list"></ul>'+
                            '</div>'+
                            '</li>');
                           tmpfinish = tmpfinish+1;
                        }
                        
                            tmptotal = tmptotal+1;
                    }else{
                        var temp=result['datameja'][i]['NAMAMENURECIPE'].replace(/\s/g, '');
                        //alert(temp);
                        $('#listModif'+result['datameja'][i]['URUTANCHECKER']+result['datameja'][i]['nomormeja']+'1').append('<li class="collection-item "><span style="margin-left:13%">'+
                        temp+
                        '</span></li>');
                        
                        $('#listModif'+result['datameja'][i]['URUTANCHECKER']+result['datameja'][i]['nomormeja']+'3').append('<li class="collection-item "><span style="margin-left:13%">'+
                        temp+
                        '</span></li>');
                        
                        $('#listModif'+result['datameja'][i]['URUTANCHECKER']+result['datameja'][i]['nomormeja']+'2').append('<li class="collection-item "><span style="margin-left:13%">'+
                        temp+
                        '</span></li>');
                        //alert(result['datameja'][i]['NAMAMENURECIPE']+"urutan "+result['datameja'][i]['URUTANCHECKER']);
                    }
                    
                    $('.collapsible').collapsible();
                    $tabs.tabs().tabs('select_tab', 'test'+result['datameja'][i]['nomormeja']+'2');
                    $tabs.tabs().tabs('select_tab', 'test'+result['datameja'][i]['nomormeja']+'3');
                    $tabs.tabs().tabs('select_tab', 'test'+result['datameja'][i]['nomormeja']+'1');
                    //alert("meja"+tmp+"ctr"+ctr); 
                    document.getElementById("hmenu"+result['datameja'][i]['nomormeja']).innerHTML = tmpfinish+"/"+tmptotal;
                }
                totalmeja=ctrmeja;
                document.getElementById("dashtotalmeja").innerHTML = totalmeja;
                document.getElementById("dashtotalorang").innerHTML = result['totalorang'][0]['jumlah'];
                getAllData(); 
                
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
                document.getElementById("m_nomeja").innerHTML = document.getElementById("hmeja"+result[0]['NOMORMEJA']).innerHTML;
                document.getElementById("m_bill").innerHTML = document.getElementById("hbill"+result[0]['NOMORMEJA']).innerHTML;
                document.getElementById("m_jam").innerHTML = document.getElementById("hjam"+result[0]['NOMORMEJA']).innerHTML;
                document.getElementById("m_pesanan").innerHTML = document.getElementById("hmenu"+result[0]['NOMORMEJA']).innerHTML;
                $('#listmodal').empty();
                $('#listmodal2').empty();
                totaldatamodal=result.length;
                ctr2=1;
                
                var temp;
                for(i=0;i<result.length;i++)
                {
                    var str="";
                    var urutanctr=1;
                        if(result[i]["URUTANCHECKER"]==-1){
                            temp=result[i]['NAMAMENURECIPE'];
                            while(i+urutanctr<result.length){
                                //alert(result[i+urutanctr]["URUTAN"]+result[i+urutanctr]['NAMAMENURECIPE']+result[i+urutanctr]["URUTANCHECKER"]);
                                if(result[i+urutanctr]["KODETRANS"]==result[i]["KODETRANS"]){
                                    if(result[i+urutanctr]["URUTANCHECKER"]==result[i]["URUTAN"])
                                            temp=temp+"+"+result[i+urutanctr]['NAMAMENURECIPE'];
                                }else{
                                    urutanctr=1;
                                    break
                                }
                                urutanctr++;
                            }
                            if(result[i]["STATUS"]!=1)
                            {

                                str = '<li class="collection-item ">'
                                        +'<div class="row">'
                                            +'<div class="col s8 menu modal-trigger waves-effe" style="text-align:center;" name="'+result[i]['NAMAMENURECIPE']+"_"+result[i]['KODEMENURECIPE']+'" href="#modal2">'+temp+'</div>'
                                            +'<div id="countdownM'+myElements+ctr2+'" class="col s2">00:00</div>'
                                            +'<div class="col s2"><input type="checkbox" class="filled-in" id="cb'+i+'" name="f_'+result[i]['KODETRANS']+'_'+result[i]['KODELOKASI']+'_'+result[i]['TGLOMZET']+'_'+result[i]['URUTAN']+'" /><label for="cb'+i+'"></label></div>'
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
                                            +'<div class="col s8" style="text-align:center;">'+temp+'</div>'
                                            +'<div class="col s2">'+sisawaktu+'</div>'
                                            +'<div class="col s2"><input type="checkbox" class="filled-in" id="cb'+i+'" name="u_'+result[i]['KODETRANS']+'_'+result[i]['KODELOKASI']+'_'+result[i]['TGLOMZET']+'_'+result[i]['URUTAN']+'"/><label for="cb'+i+'"></label></div>'
                                        +'</div>'
                                        +'<div class="col m2"></div>'
                                    +'</li>'; 
                                $('#listmodal2').append(str);
                            }
                    }
                }
                
			}, error: function(msg){
				alert('Reload Modal Error');
			}
		});
    });
         
    $(document).on("click", "#btnReport1", function(){
        $('#listmodal31').empty();
        get_report_data1();
        $("#modal3").modal("open");
    });
    $(document).on("click", "#btnReport2", function(){ 
        $('#listmodal41').empty();
        get_report_data2();
        $("#modal4").modal("open");
    }); 
    $(document).on("click", "#btnReport3", function(){ 
        $('#listmodal51').empty();
        get_report_data3();
        $("#modal5").modal("open");
    });  
    $(document).on("click", "#btnReport4", function(){ 
        $('#listmodal61').empty();
        get_report_data4();
        $("#modal6").modal("open");
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
                var str = '<li class="collection-item">'
                                +'<div class="row">'
                                    +'<div class="col s6 menu">'+result[i]['NAMAMENURECIPE']+'</div>'
                                    +'<div class="col s2 menu">'+result[i]['QTY']+'</div>'
                                    +'<div class="col s4 menu">'+result[i]['listmeja']+'</div>'
                                +'</div>'
                            +'</li>'; 
                $("#listmodal31").append(str);
            }
        },
            error: function(msg){
				alert('Reload Modal 3 Error');
			}
       });
    } 
         
    function get_report_data2(){
        $.ajax({
		type:"GET", 
		dataType: 'json',
		url: "<?php echo site_url(); ?>" + "/Controller/getReport2/", 
		data:{ "mode":"resep" },                                     
		success :function(result){
            var tempnama= "";
            var ctr=0;
            var warna="yellow";
            for(i=0;i<result.length;i++)
            {
                var nama="";
                if(tempnama!=result[i]['NAMAMENURECIPE'])
                {
                    if(ctr%2==0)
                    {
                        warna="lightcyan";
                    }
                    else
                    {
                        warna="white";        
                    }
                    ctr= ctr+1;
                    tempnama=result[i]['NAMAMENURECIPE'];
                    nama = result[i]['NAMAMENURECIPE'];
                }
                var str ='<li class="collection-item" style="background-color:'+warna+';">'
                             +'<div class="row" >'
                             +'<div class="col s4">'+nama+'</div>'
                             +'<div class="col s2">'+result[i]['NOMORMEJA']+'</div>'
                             +'<div class="col s4">'+result[i]['JAMORDER']+'</div>'
                             +'<div class="col s2">'+result[i]['DURASI']+'</div>'
                         +'</div>';
                        +'</li>'; 
                $("#listmodal41").append(str);
            }
        },
            error: function(msg){
				alert('Reload Modal 4 Error');
			}
       });
    }
    
        //modal 5 report 3
    function get_report_data3(){
        $.ajax({
		type:"GET", 
		dataType: 'json',
		url: "<?php echo site_url(); ?>" + "/Controller/getReport3/", 
		data:{ "mode":"resep" },                                     
		success :function(result){
            var tempnama= "";
            var tempkode= "";
            var menu="";
            var ctr=0;
            var warna="yellow";
            var tempmenu="";
            for(i=0;i<result.length;i++)
            {
                var nama="";
                var kode="";
                if(tempnama!=result[i]['TGLOMZET'])
                {
                    if(ctr%2==0)
                    {
                        warna="lightcyan";
                    }
                    else
                    {
                        warna="white";        
                    }
                    ctr= ctr+1;
                    tempnama=result[i]['TGLOMZET'];
                    nama = result[i]['TGLOMZET'];
                }
                if(tempkode!=result[i]['KODETRANS']){
                    tempkode=result[i]['KODETRANS'];
                    kode = result[i]['KODETRANS'];
                    tempmenu=result[i]['NAMAMENURECIPE'];
                    if(ctr==1)
                        menu=result[i]['NAMAMENURECIPE'];
                }else{
                    menu=menu+", "+result[i]['NAMAMENURECIPE'];
                    tempmenu=tempmenu+", "+result[i]['NAMAMENURECIPE'];
                }
                if(tempmenu!=menu ){
                var str ='<li class="collection-item" style="background-color:'+warna+';">'
                             +'<div class="row" >'
                             +'<div class="col s2">'+nama+'</div>'
                             +'<div class="col s3">'+kode+'</div>'
                             +'<div class="col s2">'+result[i]['NOMORMEJA']+'</div>'
                             +'<div class="col s4">'+menu+'</div>'
                         +'</div>';
                        +'</li>'; 
                $("#listmodal51").append(str);
                    menu=tempmenu;
                }

            }
        },
            error: function(msg){
				alert('Reload Modal 5 Error');
			}
       });
    }
         
         
    function get_report_data4(){
        $.ajax({
		type:"GET", 
		dataType: 'json',
		url: "<?php echo site_url(); ?>" + "/Controller/getReport4/", 
		data:{ "mode":"resep" },                                     
		success :function(result){
            var tempnama= "";
            var tmpkodelokasi="";
            var ctr=0;
            var warna="white";
            for(i=0;i<result.length;i++)
            {
                //alert(result[i]['NOMORMEJA']);
                var selesai=0;
                var belum =0;
                for(j=0;j<result[i]['STATUS'].length;j++)
                {
                    if(result[i]['STATUS'][j]['STATUS']==1)
                    {
                        selesai = selesai+1;        
                    }
                    else
                    {
                        belum = belum+1;        
                    }        
                }
                if(tmpkodelokasi!=result[i]['KODELOKASI'])
                {
                        tmpkodelokasi=result[i]['KODELOKASI'];
                }
                else
                {
                    result[i]['KODELOKASI']="";        
                }
                var str ='<li class="collection-item" style="background-color:'+warna+';">'
                             +'<div class="row">'
                             +'<div class="col s3">'+result[i]['KODELOKASI']+'</div>'
                             +'<div class="col s3">'+result[i]['NOMORMEJA']+'</div>'
                             +'<div class="col s6">Selesai : '+selesai+'</div>'
                         +'</div>';
                        +'</li>'; 
                $("#listmodal61").append(str);
                
                str ='<li class="collection-item" style="background-color:'+warna+';">'
                             +'<div class="row">'
                             +'<div class="col s3"></div>'
                             +'<div class="col s3"></div>'
                             +'<div class="col s6">Belum : '+belum+'</div>'
                         +'</div>';
                        +'</li>';
                $("#listmodal61").append(str);
            }
        },
            error: function(msg){
				alert('Reload Modal 6 Error');
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
			url: "<?php echo site_url(); ?>" + "/Controller/get_multimeja/"+kodemenu , 
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
                                    +'<div class="col s4"><input type="checkbox" class="filled-in" id="cb1'+i+'" name="'+result[i]['KODETRANS']+'_'+result[i]['KODELOKASI']+'_'+result[i]['TGLOMZET']+'_'+result[i]['URUTAN']+"_"+result[i]['NOMORMEJA']+'"/><label for="cb1'+i+'"></label></div>'
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
                alert('Submit Modal 1 Error');
            }
        });
   }); 
                                 
   $("#submitmodal2").click(function(){
       var hasil="";
       var totalmejamodal=0;
       for(i=0;i<totaldatamodal;i++)
        {
            if($('#cb1'+i).is(':checked')==true)
            {
                totalmejamodal = totalmeja+1;
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
                for(i=1;i<=totalmejamodal;i++)
                {
                    reloaddata(result[i]);
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
		reloadalldata();
	// //$('ul.tabs').tabs('select_tab', 'tab_id');
		 
 });
</script>
<script>
function myFunction() {
	var kodelokasi = document.getElementById('h_kodelokasi').value;
	alert(kodelokasi);
	window.location = "<?php echo base_url('index.php/Controller/changelokasi/') ?>"+kodelokasi;
}
</script>
</body>
</html>