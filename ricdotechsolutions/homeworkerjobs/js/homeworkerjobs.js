$(document).ready(function(){
  
    //--Global variables declearation------//
  
    var receivecalls=0;
    var totalcost=0;
    var spacing=0;    
    var files =0;
    var docFiles = new FormData();
        
    //-----------------end------------//
        
    $('#login').click(function(){
        var emailaddress=$('#emailaddress').val();
        var userpassword=$('#userpassword').val();       
        Login(emailaddress, userpassword);
    }) ; 


    $('#register').click(function(){
        var surname=$('#surname').val();
        var firstname=$('#firstname').val();  
        var lastname=$('#lastname').val(); 
        var phonenumber=$('#phonenumber').val();
        var country=$('#country').val();
        var emailaddress=$('#emailaddress').val();
        Register(surname, firstname,lastname, phonenumber,country,emailaddress);
     
    }) ; 
    
    //  Order now continue button onclick event
    $('#continue').click(function(){
        var emailaddress=$('#email').val();        
       
        if(emailaddress=='')
        {
            $("#not").fadeTo(200,0.1,function() { //start fading the messagebox 			 
                $(this)
                .html('<span class="glyphicon glyphicon-warning-sign"></span> Please enter your Email Address!')
                .addClass('alert alert-warning')
                .fadeTo(600,1);
                        
            }); 
              return false;
        }
        else
        {
            $("#not").hide();
            CreateAccount(emailaddress,documenttype,pagenumbers);
                   
        }
       
    }) ; 
  
  
    $('#typeofdocument').click(function(){
        doCalculation();
    }) ; 
  
    $('#SubujectArea').click(function(){
        doCalculation();
    }) ; 
    
    $('#numberofpages').click(function(){
        doCalculation()
    }) ; 

    $('#writing_style').click(function(){
        doCalculation();
    }) ; 

    $('#academic_level').click(function(){
        doCalculation();
    }) ; 
  
    $('#urgency').click(function(){
        doCalculation();
    }) ; 
  
    //checkbox
    $('#singlespace').click(function(){
        doCalculation();
    }) ; 
  
  //uploading files to form data
     $('#uploadedfiles').change(function(){  
      if(files<5){     
          
         var uploadedfiles= document.getElementById('uploadedfiles').files[0];         
         docFiles.append('uploadedfiles_'+files, uploadedfiles);
         
         $('<h5>'+(files+1)+'. Filename: '+$('#uploadedfiles').val()+' </h5>').appendTo('#atachfile');
       
         files++;
      }
    else{alert('File number limit reached!');}
      
    }) ; 
  
//  //add atachment button
//  $('#addAttachment').click(function(){  
//      
//      if(files<5){
//          
//          var x = document.createElement("INPUT");
//              x.setAttribute("type", "file");
//              x.setAttribute("id", "file_"+files);
//              x.setAttribute("class", "btn btn-default btn-primary");
//          $(x).appendTo('#atachfile');
//         files++;
//      }
//    else{alert('File number limit reached!');}
//
//      return false;
// });
   
    $('#receivephonecalls').click(function(){
        if ( $('#receivephonecalls').is(':checked') ) {
            receivecalls=1;
        }
        else         {
            receivecalls=0;
        }

    }) ;   
  
    $('#agree').click(function(){
        if ( $('#agree').is(':checked') ) {
            $('#preview').show();
        }
        else
        {
            $('#preview').hide();
        }
       
    }) ; 

    $('#preview').click(function(){        
        //order deatils
        var topic=$('#topic').val();
        
        var writing_style=$('#writing_style').val();
        
        var language=$('#language').val();
        
        var instruction=$('#instruction').val();  
        
        var typeofdocument=$('#typeofdocument').find(":selected").text();
        
        var SubujectArea=$('#SubujectArea').find(":selected").text();
        
        var numberofpages=$('#numberofpages').find(":selected").text();
        
        var urgency =$('#urgency').find(":selected").text();
        
        var academic_level=$('#academic_level').find(":selected").text();
		var uploadedfiles=$('#uploadedfiles').val();
        
        //total price
        totalcost=parseFloat(totalcost);
       
        
        $.post("./dbcom/dbcalls.php",
        {
            transType:4,
            iduser:$('#iduser').val(),
            surname:$('#surname').val(),
            firstname:$('#firstname').val(),
            lastname:$('#lastname').val(),
            phonenumber:$('#phonenumber').val(),
            emailaddress:$('#emailaddress').val(),
            country:$('#country').val(),
            //---order details---
            topic:topic,
            writing_style:writing_style,
            numberofpages:numberofpages,
            SubujectArea:SubujectArea,
            instruction:instruction,
            typeofdocument:typeofdocument,
            urgency:urgency,
            academic_level:academic_level,
            language:language,
            receivecalls:receivecalls,
            spacing:spacing,
            //----total price---//
            totalcost:totalcost,  
            uploadedfiles:$('#atachfile').text(),			
            rand:Math.random()
        } ,
        function(data)   {
            if(data=='0')	{ //if correct login detail
                $("#not").hide();
                 uploadFile();
               document.location='preview.php';                       
            }		 		  
            else 	{
                $("#not").fadeTo(200,0.1,function() { //start fading the messagebox 			 
                    $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,error occured').addClass('alert alert-warning').fadeTo(600,1);
                });		
            }
				
        });
   
        return false;
      
    }) ; 
    
    $('#btnpayment').click(function(){
	
	var uploadedfiles=$('#uploadedfiles').val();
	var iduser=$('#iduser').val();
	var orderno=$('#orderno').val();
	var topic=$('#topic').val();        
    var writing_style=$('#writing_style').val();        
    var language=$('#language').val();
    var instruction=$('#instruction').val(); 
	var typeofdocument=$('#typeofdocument').val();
	var SubujectArea=$('#SubujectArea').val();        
	var numberofpages=$('#numberofpages').val();        
    var urgency =$('#urgency').val();
    var academic_level=$('#academic_level').val();
	var spacing=$('#spacing').val();
	var receivecalls=$('#receivecalls').val();
	var totalcost=$('#totalcost').val();
          //should save it into the database and generates a order number
   $.post("./dbcom/dbcalls.php",
            { 
               transType:5,
					iduser:iduser,
					//---order details---
					orderno:orderno,
					topic:topic,
					typeofdocument:typeofdocument,
					SubujectArea:SubujectArea,
					numberofpages:numberofpages,
					spacing:spacing,
					writing_style:writing_style,
					academic_level:academic_level,
					language:language,
					instruction:instruction,
					urgency:urgency,
					receivecalls:receivecalls,
					//----total price---//
					totalcost:totalcost,
					uploadedfiles:uploadedfiles,
                rand:Math.random()
            } ,
			function(data)   {
                if(data=='0')	{ //if correct login detail
                  
				document.location='payment.php';
                            }	
               	 		  
                else 	  {
                   alert('Sorry, your order could not be saved! each order is unique');
                }
				
            });
               return false; //not to post the  form physically 
				
    }) ;        

 
	
    function preLogin(emailaddress, userpassword) {		
      
        $("#not").removeAttr("style").addClass('alert alert-default').text('Verifying...').fadeIn(1000);		
        $.post("./dbcom/dbcalls.php",
        {
            transType:0,
            emailaddress:emailaddress,
            userpassword:userpassword,
            rand:Math.random()
        } ,
        function(data)   {
            if(data=='0')	{ //if correct login detail
                $("#not").hide();
				
                document.location='ordernow.php';                       
            }		 		  
            else 	{
                $("#not").fadeTo(200,0.1,function() { //start fading the messagebox 			 
                    $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Invalid login ceredntials! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                });		
            }
				
        });
        return false; //not to post the  form physically
       
    }
    function Login(emailaddress, userpassword) {		
        $("#login_form").submit(function(e)
        {
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Verifying...').fadeIn(1000);		
            $.post("./dbcom/dbcalls.php",
            {
                transType:0,
                emailaddress:emailaddress,
                userpassword:userpassword,
                rand:Math.random()
            } ,
            function(data)   {
                if(data=='0')	{ //if correct login detail
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span> Success, we are loggin you.')
                        .fadeTo(600,1,
                            function()
                            { 
                                document.location='home.php';
                             
                            });
			  
                    });
                }
                  else  if(data=='2')	{ //if correct login detail
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span> Welcome Admin, we are loggin you.')
                        .fadeTo(600,1,
                            function()
                            { 
                                document.location='adminhome.php';
                             
                            });
			  
                    });
                }
                else 	  {
                    $("#not").fadeTo(200,0.1,function() { //start fading the messagebox 			 
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span>  Sorry,Invalid login ceredntials! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });		
                }
				
            });
            return false; //not to post the  form physically
        });
    }
    function CreateAccount(emailaddress,documenttype,pagenumbers) {		
        $("#order_form").submit(function(e)
        {
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Validating details...').fadeIn(1000);		
            $.post("./dbcom/dbcalls.php",
            {
                transType:2,
                emailaddress:emailaddress,
                documenttype:documenttype,
                pagenumbers:pagenumbers,
                rand:Math.random()
            } ,
            function(data)   {
                if(data!='1')	{ 
                    $("#not").hide();
					 SendMail(emailaddress);
               preLogin(emailaddress, data);
                   
                }		 		  
                else 	  {
                    $("#not").fadeTo(200,0.1,function() { //start fading the messagebox 			 
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry, we are unable to register you!').addClass('alert alert-warning').fadeTo(600,1);
                    });		
                }
				
            });
            return false; //not to post the  form physically
        });
    }  
    
    function Register(surname, firstname, lastname, phonenumber,country,emailaddress) {		
        $("#register_form").submit(function(e)
        {
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Validating details...').fadeIn(1000);		
            $.post("./dbcom/dbcalls.php",
            { 
                transType:1,
                surname:surname,
                firstname:firstname,
                lastname:lastname,
                phonenumber:phonenumber,
                emailaddress:emailaddress,
                country:country,               
                rand:Math.random()
            } ,
            function(data)   {
                if(data=='0')	{ //if correct login detail
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span> You are Now Registered Successfully! Please check your mail to Login')
                        .fadeTo(600,1,
                            function()
                            { 
                                SendMail(emailaddress);
                            });			  
                    });
                }		 		  
                else 	  {
                    $("#not").fadeTo(200,0.1,function() { //start fading the messagebox 			 
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry, we are unable to register you!').addClass('alert alert-warning').fadeTo(600,1);
                    });		
                }
				
            });
            return false; //not to post the  form physically
        });
    } 
	
    function OrderNow(iduser,orderno,topic,typeofdocument,SubujectArea,numberofpages,spacing,urgency,writing_style,academic_level,language,instruction,totalcost,receivecalls) 
			 {				 		
                //should save it into the database and generates a order number
   $.post("./dbcom/dbcalls.php",
            { 
               transType:5,
					iduser:iduser,
					//---order details---
					orderno:orderno,
					topic:topic,
					typeofdocument:typeofdocument,
					SubujectArea:SubujectArea,
					numberofpages:numberofpages,
					spacing:spacing,
					writing_style:writing_style,
					academic_level:academic_level,
					language:language,
					instruction:instruction,
					urgency:urgency,
					receivecalls:receivecalls,
					//----total price---//
					totalcost:totalcost,               
                rand:Math.random()
            } ,
			function(data)   {
                if(data=='0')	{ //if correct login detail
                  
								document.location='payment.php';
                            }	
               	 		  
                else 	  {
                   alert('Sorry, your order could not be saved!');
                }
				
            });
               return false; //not to post the  form physically
    }  
    
    
    function doCalculation()
    { 
        var numberofpages=1;
        
         var numberofpagesarr=$('#numberofpages').val().split('-');
             numberofpages = parseFloat(numberofpagesarr[1]);
         
         var typeofdocumentarr=$('#typeofdocument').val().split('-');
         var typeofdocument = parseFloat(typeofdocumentarr[1]);
         
        var SubujectArea=parseFloat($('#SubujectArea').val());
        
         var urgencyarr=$('#urgency').val().split('-');
         var urgency = parseFloat(urgencyarr[1]);
         
          var academic_levelarr=$('#academic_level').val().split('-');
          var academic_level = parseFloat(academic_levelarr[1]);
        
        if ( $('#singlespace').is(':checked') ) { 
            $('#pages').html('approximately 550 words per page'); 
            spacing=2;
           
        }
        else         {
            $('#pages').html('approximately 275 words per page'); 
            spacing=1;
        }
         
        var costPerPage=0;
       
        costPerPage=(typeofdocument + (SubujectArea) + academic_level + urgency)*spacing;
        totalcost=parseFloat(costPerPage) * numberofpages;
        
        $("#costperpage").html('<font style="font-size: 1.5em;">Cost Per Page:<b>USD$ '+costPerPage.toFixed(2)+'</b></font>'); 
        $("#totalcost").html('<font style="font-size: 2em;color: green">Total Cost:<b>USD$'+totalcost.toFixed(2)+'</b></font>'); 
        totalcost=totalcost.toFixed(2);
        return false; 
    }
    
    
  
	
	
    function SendMail(emailaddress){
    
    $.post("./dbcom/dbcalls.php",
    {
        transType:3,
        emailaddress:emailaddress,
        rand:Math.random()
    } ,
    function(data)   {
        if(data=='0')	{ //if correct login detail
            alert('Please check your email account');
        }		 		  
        else 	  {
            alert('Error sending message');		
        }				
    });
    return false; //not to post the  form physically
    
}

//---Uploading single file with JQUERY---XMLHTTP REQUEST-----
function uploadFile()
{
    
var fileno=files;
var transType=7;

  docFiles.append('fileno', fileno);
  docFiles.append('transType',transType);

var  ajax;          
    if (window.XMLHttpRequest) {
        ajax = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        ajax = new ActiveXObject("Microsoft.XMLHTTP");
    }
   ajax.open('POST', './dbcom/dbcalls.php', false);
   ajax.onreadystatechange = function() {   
   if (ajax.readyState == 4 && ajax.status == 200) {
             console.log(ajax.responseText);
            }
            else {
                alert('Sorry,File Upload Failed! ');
            }
    }
   ajax.send(docFiles);

  return false;
}	

//function gotoPayment(topic,orderno,totalcost)
//{  
//
//$.post("./dbcom/dbcalls.php",
//            {
//                transType:8,
//                topic:topic,
//                orderno:orderno, 
//                totalcost:totalcost,
//                rand:Math.random()
//            } ,
//            function(data)   {
//                if(data=='0')	{ 
//                   document.location='payment.php';
//                        
//                }		 		  
//                else 	  {
//                   alert('Sorry,your details could not be processed!')	;
//                }
//				
//            });
//            return false;
//}
//




//end of document ready
});
function gotoPayment(orderno)
{  
$.post("./dbcom/dbcalls.php",
            {
                transType:8,
                orderno:orderno,
                rand:Math.random()
            } ,
            function(data)   {
                if(data=='0')	{ 
                   document.location='payment.php';
                        
                }		 		  
                else 	  {
                   alert('Sorry,your details could not be processed!')	;
                }
				
            });
            return false;
}


/* function doOrderFormCalculation() {
    var orderForm = document.getElementById('order_form');
    var orderCostPerPage = 0;
    var orderTotalCost = 0;
    var single = orderForm.o_interval.checked;
    var number = orderForm.numpages;
                    
    var discount = orderForm.discount_percent_h.value;
    var wthdy = '';
    var wthdyx = '';
    var oc = 9.25 * doTypeOfDocumentCost(orderForm.document_type) * doAcademicLevelCost(orderForm.academic_level) * doUrgencyCost(orderForm.urgency) * doSubjectAreaCost(orderForm.subject_area) * doCurrencyRate(orderForm.curr);
    orderCostPerPage = (oc - (oc) * discount / 100) + doVasPP(document.getElementsByName('vas_id[]'));
    if (single == true) {
        orderCostPerPage = orderCostPerPage * 2;
        oc = oc * 2;
        number.options[0].value = '1';
        number.options[0].text = '1 page/approx 550 words';
        document.getElementById("num_pg_ord").innerHTML = 'approx 550 words per page';
        for (i = 1; i < number.length; i++) {
                    
            number.options[i].text = (i + 1) + ' pages/approx ' + (2 * (i + 1) * 275) + ' words';
                    
        }
    } else {
        number.options[0].value = '1';
        number.options[0].text = '1 page/approx 275 words';
        document.getElementById("num_pg_ord").innerHTML = 'approx 275 words per page';
        for (i = 1; i < number.length; i++) {
                    
            number.options[i].text = (i + 1) + ' pages/approx ' + ((i + 1) * 275) + ' words';
                    
        }
    }
    number.options[number.selectedIndex].selected = true;
    wthdy = Math.round(orderCostPerPage * Math.pow(10, 2)) / Math.pow(10, 2);
                        
    document.getElementById("cost_per_page").innerHTML = wthdy;		
                        
    orderForm.MTIuOTUYGREXGHNMKJGT23467GGFDSSSbbbbbIOK.value = encode64(wthdy);
    wthdyx = Math.round((orderCostPerPage * number.options[number.selectedIndex].value + doVasPO(document.getElementsByName('vas_id[]'))) * Math.pow(10, 2)) / Math.pow(10, 2);
                        
    document.getElementById("total").innerHTML = wthdyx;		
                        
    orderForm.total.value = wthdyx;
                    
    orderForm.MMNBGFREWQASCXZSOPJHGVNMTIuOTU.value = wthdyx;
                    
                    
}
                  
					   
 */						   
 
    
