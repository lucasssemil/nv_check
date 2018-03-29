
	//Define websocket server
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
                    
                   
                    //alert(proses);
                    var temp = Math.floor((proses % (1000 * 60 * 60)) / (1000 * 60));
                    //alert(Math.floor(proses % (1000 * 60)/1000));
                    proses = Math.floor(proses % (1000 * 60)/1000)  + (temp*60);
                    var perdetik = 100/(result[i]['durasi']*60);//progressbar berjalan perdetik
                    //alert("AWAL : "+i+": "+proses);
                    warnabar = "greenteal";
                    
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
                    if (result[i]['status']==0){
                   //alert(i+" "+ctr);
                    document.getElementById("pB"+result[i]['nomormeja']+ctr).style.width = proses+"%";
                    document.getElementById("pB"+result[i]['nomormeja']+ctr).style.backgroundColor = warnabar;
                    document.getElementById("countdown"+result[i]['nomormeja']+ctr).innerHTML = m+":"+s;
                    
                    if(result[i]['nomormeja']==myElements)
                    {
                        document.getElementById("pBM"+myElements+ctr).style.width = proses+"%";
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
                    //$('#test'+result[i]['nomormeja']+'1 ul').append('<li class="collection-item "><div class="col m9  ">'+result[i]['namamenurecipe']+'</div><div id="countdown'+result[i]['nomormeja']+ctr+'" class="col m2">0:0</div><div class="progress "><div id="pB'+result[i]['nomormeja']+ctr+'" class="determinate " style="width:0%"></div></div></li>');
                    if(result[i]['status']==1){
                        $('#test'+result[i]['nomormeja']+'3 ul').append('<li class="collection-item "><div class="strikeout">'+result[i]['namamenurecipe']+'</div></li>');
                        $('#test'+result[i]['nomormeja']+'2 ul').append('<li class="collection-item "><div class="strikeout">'+result[i]['namamenurecipe']+'</div></li>');
                    }
                    if (result[i]['status']==0){
                        $('#test'+result[i]['nomormeja']+'3 ul').append('<li class="collection-item ">'+result[i]['namamenurecipe']+'</li>');
                        
                        $('#test'+result[i]['nomormeja']+'1 ul').append('<li class="collection-item "><div class="col m9 ">'+result[i]['namamenurecipe']+'</div><div id="countdown'+result[i]['nomormeja']+ctr+'" class="col m2">0:0</div><div class="progress "><div id="pB'+result[i]['nomormeja']+ctr+'" class="determinate " style="width:0%"></div></div></li>');
                        ctr = ctr+1;
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
                    //$('#test'+result[i]['nomormeja']+'1 ul').append('<li class="collection-item "><div class="col m9  ">'+result[i]['namamenurecipe']+'</div><div id="countdown'+result[i]['nomormeja']+ctr+'" class="col m2">0:0</div><div class="progress "><div id="pB'+result[i]['nomormeja']+ctr+'" class="determinate " style="width:0%"></div></div></li>');
                  
                    if (result[i]['status']==0){
                        $('#test'+result[i]['nomormeja']+'3 ul').append('<li class="collection-item ">'+result[i]['namamenurecipe']+'</li>');
                        $('#test'+result[i]['nomormeja']+'1 ul').append('<li class="collection-item "><div class="col m9 ">'+result[i]['namamenurecipe']+'</div><div id="countdown'+result[i]['nomormeja']+ctr+'" class="col m2">0:0</div><div class="progress "><div id="pB'+result[i]['nomormeja']+ctr+'"  class="determinate" style="width:0%"></div></div></li>');
                        ctr = ctr+1;
                    } 
                    if(result[i]['status']==1){
                        $('#test'+result[i]['nomormeja']+'3 ul').append('<li class="collection-item "><div class="strikeout">'+result[i]['namamenurecipe']+'</div></li>');
                        $('#test'+result[i]['nomormeja']+'2 ul').append('<li class="collection-item "><div class="strikeout">'+result[i]['namamenurecipe']+'</div></li>');
                    }
                    
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
                                    +'<div class="col s4 menu modal-trigger waves-effe" name="'+result[i]['NAMAMENURECIPE']+"_"+result[i]['KODEMENURECIPE']+'" href="#modal2">'+result[i]['NAMAMENURECIPE']+'</div>'
                                    +'<div id="countdownM'+myElements+ctr2+'" class="col s4">00:00</div>'
                                    +'<div class="col s4"><input type="checkbox" class="filled-in" id="cb'+i+'" name="f_'+result[i]['KODETRANS']+'" /><label for="cb'+i+'">Finish</label></div>'
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
                        var hasil = hitungDurasi(result[i]['TANGGALOMSET'],result[i]['JAMTARGET']);
                        var m = Math.floor((hasil['durasi'] % (1000 * 60 * 60)) / (1000 * 60));
                        var s = Math.floor((hasil['durasi'] % (1000 * 60)) /1000);
                         str = '<li class="collection-item ">'
                                +'<div class="row">'
                                    +'<div class="col s4">'+result[i]['NAMAMENURECIPE']+'</div>'
                                    +'<div class="col s4">'+m+':'+s+'</div>'
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
			url: "<?php echo site_url(); ?>" + "/Controller/get_multimeja/"+kodemenu, 
			data:{ "mode":"resep" },                                     
			success :function(result){
                totaldatamodal=result.length;
                $('#listmodal21').empty();
                $('#listmodal22').empty();
                for(i=0;i<result.length;i++)
                {
                        var strg = '<li class="collection-item ">'
                                +'<div class="row">'
                                    +'<div class="col s4">'+result[i]['NOMORMEJA']+'</div>'
                                    +'<div class="col s4">'+result[i]['jumlah']+'</div>'
                                    +'<div class="col s4"><input type="checkbox" class="filled-in" id="cb1'+i+'" name="'+result[i]['NOMORMEJA']+'"/><label for="cb1'+i+'">Finish</label></div>'
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
                reloaddata(myElements);
            }, error: function(msg){
                alert('Submit Modal Error');
            }
        });
   });
       
   $("#submitmodal2").click(function(){
       var hasil="";
       var kode = document.getElementById('judulkode').innerHTML;
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
			url: "<?php echo site_url(); ?>" + "/Controller/update_statusmulti/"+kode+"/"+hasil, 
			data:{ "mode":"resep" },                                     
			success :function(result){
                for(i=0;i<totaldatamodal;i++)
                {
                    reloaddata(result[i])    
                }
            }, error: function(msg){
                alert('Submit Modal Error');
            }
        });
     $('#modal1').modal('close');
       
   });

         
	$('ul.tabs').tabs({
		swipeable : false
	});
         
		reloadalldata();
        ProgressBarTick();
	// //$('ul.tabs').tabs('select_tab', 'tab_id');
 });