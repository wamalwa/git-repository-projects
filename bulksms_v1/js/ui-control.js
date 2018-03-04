	//events
   $(document).ready(function(){

           //login
        $('#btnlogin').click(function(){

            var actiontype=$('#actiontype').val();   //show the type of action to be called in action.php
            var username=$('#myusername').val();
            var userpassword=$('#mypassword').val(); 
            Login(actiontype,username, userpassword);
       
        }) ; 
     
     
     //register
        $('#btncreateaccount').click(function(){
            var actiontype=$('#actiontype').val();  
            var surName=$('#surName').val();
            var firstName=$('#firstName').val();  
            var nationalID=$('#nationalID').val(); 
            var gender =$('input:radio[name=radiogender]:checked').val();
            var emailAddress=$('#emailAddress').val();
            var phoneNumber=$('#phoneNumber').val();
            var physicalAddress=$('#physicalAddress').val();
            var postID=$('#addaccountselectPost').val();
            var regionID=$('#addaccountselectRegion').val();
                   
  if(confirm("Do you wish to Add "+surName+" "+firstName+" Account?") === true){  
            CreateAccount(actiontype,surName, firstName,nationalID,gender, emailAddress,phoneNumber,physicalAddress,postID,regionID);

            $('#surName').val("");
            $('#firstName').val("");
            $('#nationalID').val(""); 
            ('#emailAddress').val("");
            $('#phoneNumber').val("");
            $('#physicalAddress').val("");
            }
        }) ; 
        
 //checkbox  var gender =$('input:radio[name=radiogender]:checked').val();
//     $('#myregioncontacts').click(function(){ 
//         
//         if(this.checked===true){
//         alert("selected "+$('input:radio[name=checkboxcontacts]:checked').val());
//     }
//     }) ; 
     
     $('#mycontacts').click(function(){  
        if(this.checked===true){         
           $('#contactGroupView').show();
     }else
     {
         $('#contactGroupView').hide(); 
     }
     }) ; 
     
     
    $('#btnAddFirstNameparam').click(function(){         
        var param=$('#btnAddFirstNameparam').text();//text to add        
        var messageText=$('#message').val();
        var messageContainer = jQuery("#message");
        InserttextParams(param,messageText,messageContainer);       
        
    }) ; 
    
     $('#btnAddAvailableBalanceparam').click(function(){         
        var param=$('#btnAddAvailableBalanceparam').text();//text to add        
        var messageText=$('#message').val();
        var messageContainer = jQuery("#message");
        InserttextParams(param,messageText,messageContainer);       
        
    }) ; 
  
     $('#btnAddPostparam').click(function(){         
        var param=$('#btnAddPostparam').text();//text to add        
        var messageText=$('#message').val();
        var messageContainer = jQuery("#message");
        InserttextParams(param,messageText,messageContainer);       
        
    }) ; 
    
      $('#btnAddclientNameparam').click(function(){         
        var param=$('#btnAddclientNameparam').text();//text to add        
        var messageText=$('#message').val();
        var messageContainer = jQuery("#message");
        InserttextParams(param,messageText,messageContainer);       
        
    }) ; 
//      $('#btncreatesms').click(function(){
//
//            var actiontype=$('#actiontype').val();      
//            var message=$('#message').val();
//            var comments=$('#name').val();       
//            CreateMessage(actiontype,message, comments);
//        }) ; 


     $('#btnAddWardView').click(function(){
        $('#sectionAddWard').show();
//hide the others
        $('#sectionAddConstituency').hide(); 
        $('#sectionAddCounty').hide(); 
        $('#sectionAddPost').hide();
        $('#sectionAddRole').hide();
        
      }) ; 
     $('#btnAddConstituencyView').click(function(){
        $('#sectionAddConstituency').show(); 
//hide the others
        $('#sectionAddWard').hide(); 
        $('#sectionAddCounty').hide(); 
        $('#sectionAddPost').hide();
        $('#sectionAddRole').hide();
      }) ; 

     $('#btnAddCountyView').click(function(){
        $('#sectionAddCounty').show(); 
//hide the others
         $('#sectionAddWard').hide(); 
         $('#sectionAddConstituency').hide(); 
         $('#sectionAddPost').hide();
         $('#sectionAddRole').hide();
      }) ;
       
      $('#btnAddPostView').click(function(){
         $('#sectionAddPost').show(); 
//hide the others
        $('#sectionAddWard').hide(); 
        $('#sectionAddConstituency').hide(); 
        $('#sectionAddCounty').hide(); 
         $('#sectionAddRole').hide();
      }) ;
      
       $('#btnAddRoleView').click(function(){
         $('#sectionAddRole').show(); 
//hide the others
        $('#sectionAddWard').hide(); 
        $('#sectionAddConstituency').hide(); 
        $('#sectionAddCounty').hide(); 
         $('#sectionAddPost').hide();
      }) ;
      
      
$('#btnContactUploadView').click(function(){
       
       if( document.getElementById('sectionAddcontanct').style.display==='none'){          
             $('#sectionAddcontanct').show();
             $('#sectionUploadExcelSheet').hide(); 
                $('#sectionAddContactGroup').hide();
            $('#btnContactUploadView').text('Upload CSV/Excel Sheet');
       }
       else{
           $('#btnContactUploadView').text('Create New Contact');
              $('#sectionUploadExcelSheet').show();
              $('#sectionAddcontanct').hide(); 
              $('#sectionAddContactGroup').hide();
             
       }
        
        
      }) ;  
   
 //contact group
 $('#btnAddContactGroupView').click(function(){
       
       if( document.getElementById('sectionAddContactGroup').style.display==='none'){          
             $('#sectionAddContactGroup').show();
             $('#sectionAddcontanct').hide(); 
             $('#sectionUploadExcelSheet').hide(); 
//            $('#btnContactUploadView').text('Upload CSV/Excel Sheet');
       }
       else{
//           $('#btnAddContactGroupView').text('Create New Contact');
              $('#sectionAddcontanct').show();
              $('#sectionAddContactGroup').hide();
              $('#sectionUploadExcelSheet').hide(); 
             
       }
        
        
      }) ; 

    //ADD COUNTY
    $('#btnaddCounty').click(function(){
        var actiontype=$('#actiontypeaddCounty').val();      
        var CountyName=$('#CountyName').val();
        AddCounty(actiontype,CountyName);
        $('#CountyName').val("");

      }) ; 

 //ADD CONSTITUENCY
    $('#btnaddConstituency').click(function(){
        var actiontype=$('#actiontypeaddConstituency').val();      
        var countyID=$('#ConstituencySelectCounty').val();      
        var ConstituencyName=$('#ConstituencyName').val();
        
      if(confirm("Do you wish to Add "+ConstituencyName+" as a Constituency?") === true){        
        AddConstituency(actiontype,countyID,ConstituencyName);
        $('#ConstituencyName').val("");
    }

      }) ; 
//change county
 $('#wardSelectCounty').change(function() {     
 var actiontype='LoadConsperCounty';
 var countyID=$('#wardSelectCounty').val();
    GetConstituenciesofCounty(actiontype,countyID);
 }) ; 
 
 //select post
 
  $('#addaccountselectPost').change(function() {     
 var actiontype='LoadregionToView';
 var postID=$('#addaccountselectPost').val();
    GetRegiontoViewForPost(actiontype,postID);
 }) ; 
 
// $('#userselectAccount').change(function() {     
// var actiontype='LoadAccountDetails';
// var clientID=$('#userselectAccount').val();
//    GetAccountDetails(actiontype,clientID);
// }) ;



//ADD WARD
    $('#btnaddward').click(function(){
        var actiontype=$('#actiontypeaddward').val();      
        var countyID=$('#wardSelectCounty').val();      
        var ConstituencyID=$('#wardSelectConstituecny').val();
        var wardName=$('#wardName').val();
        
       if(confirm("Do you wish to Add "+wardName+" as a Ward?") === true){   
        AddWard(actiontype,countyID,ConstituencyID,wardName);
                //clear inputs
         $('#wardName').val("");
     }
      }) ;
      
     

//ADD POST 
   $('#btnaddPost').click(function(){
        var actiontype=$('#actiontypeaddPost').val();      
        var PostName=$('#PostName').val();      
        var PostDescription=$('#PostDescription').val();
        var postScope=$('#postScope').val();
  if(confirm("Do you wish to Add "+PostName+" as a Post?") === true){   
        AddPost(actiontype,PostName,PostDescription,postScope);
            //        clear inputs
            $('#PostDescription').val("");
            $('#PostName').val("");
        }
    }) ;    
      
 //ADD ROLE     
     $('#btnaddRole').click(function(){
        var actiontype=$('#actiontypeaddRole').val();      
        var RoleName=$('#RoleName').val();      
        var RoleDescription=$('#RoleDescription').val();
        
  if(confirm("Do you wish to Add "+RoleName+" as a Role?") === true){   
        AddRole(actiontype,RoleName,RoleDescription);
            //        clear inputs
            $('#RoleDescription').val("");
            $('#RoleName').val("");
        }
    }) ;    
   
        //Create User     
     $('#btncreateuser').click(function(){
        var actiontype=$('#actiontype').val();      
        var clientID=$('#userselectAccount').val();      
        var RoleID=$('#userselctUserRoles').val();
if(confirm("Do you wish to Add this User?") === true){  
        CreateUSer(actiontype,clientID,RoleID);
            //        clear inputs
        }
            
    }) ;
    //save CONTACT
// btnaddcontact
 //btnuploadexcelsheet
 //
     $('#btnaddcontact').click(function(){
            var actiontype=$('#actiontypeaddcontact').val();      
            var firstName=$('#firstName').val();
            var otherNames=$('#otherNames').val();  
            var phoneNumber=$('#phoneNumber').val(); 
            var gender =$('input:radio[name=radiogender]:checked').val();
            var yob=$('#yob').val();  
            var addaccountselectRegion=$('#addaccountselectRegion').val();
            
  if(confirm("Do you wish to Add "+firstName+" as Contact?") === true){   
        AddContact(actiontype,firstName,otherNames,phoneNumber,gender,yob,addaccountselectRegion);
            //        clear inputs
             $('#firstName').val("");
            $('#otherNames').val("");
            $('#phoneNumber').val("");
            $('#yob').val("");
        }
    }) ;     
      
   //ADD CONTACT GROUP
//   
 $('#btnSaveContactGroup').click(function(){
     
            var actiontype=$('#actiontypecontactgroup').val();      
            var groupName=$('#groupName').val();
            var GroupDescription=$('#GroupDescription').val(); 
            
  if(confirm("Do you wish to Add "+groupName+" as Contact Group?") === true){   
        AddContactGroup(actiontype,groupName,GroupDescription);
            //        clear inputs
             $('#groupName').val("");
            $('#GroupDescription').val("");
        }
    }) ;     
        
 //add group contact
 
   $('#btnsavegroupcontacts').click(function(){
     
            var actiontype=$('#actiontypegroupcontact').val();      
            var groupID=$('#selectgroupContact').val();
         var firstName=$('#firstName').val();
            var otherNames=$('#otherNames').val();  
            var phoneNumber=$('#phoneNumber').val(); 
            var gender =$('input:radio[name=radiogender]:checked').val();
            var yob=$('#yob').val();  
            var addaccountselectRegion=$('#addaccountselectRegion').val();
            
  if(confirm("Do you wish to Add "+firstName+" as Contact?") === true){   
        AddGroupContact(actiontype,groupID,firstName,otherNames,phoneNumber,gender,yob,addaccountselectRegion);
            //        clear inputs
             $('#firstName').val("");
            $('#otherNames').val("");
            $('#phoneNumber').val("");
            $('#yob').val("");
        }
    }) ;       
//End of events 
});

//functions 

function Login(actiontype,username, userpassword) {        
    $(document).off('submit');
    $(document).on('submit',"#login_form",function(e)    
//    $("#login_form").submit(function(e)
        {
            if(username==='' || userpassword===''){
               $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
                    });  
            }
       else{
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Verifying...').fadeIn(1000);        
            $.post("./serverside/action.php",
            {
                actiontype:actiontype,
                myusername:username,
                mypassword:userpassword,
                rand:Math.random()
            } ,
            function(data)   {
                data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct login detail
             
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>Welcome '+data+', we are loggin you.')
                        .fadeTo(600,1,
                            function()  {    document.location='home.php'; });
              
                    });                
                  
                }
                //inavlid login details
                else  if(data==='-1')   {
                    $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span>  Sorry,Invalid login ceredntials! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });     
                }
                 else{
                      $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Server error! Could not reach Server or Server returned NULL').addClass('alert alert-warning').fadeTo(600,1);
                    });
                }
            });
        }
            return false; //not to post the  form physically
        });
    }
 
function CreateMessage(actiontype,message, name) {        
        $("#frmcreatesms").submit(function(e)
        {
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Creating new Message...').fadeIn(1000);        
            $.post("serverside/action.php",
            {
                actiontype:actiontype,
                message:message,
                name:name,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='0' && data!=='')   { //if correct login detail
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New SMS created Successfullly!.')
                        .fadeTo(600,1,
                            function()
                            { 
                                // document.location='home.php';
                             
                            });
              
                    });                
                  
                }
                //inavlid login details
                else  if(data==='0')   {
                    $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span>  Sorry,Could not create SMS ceredntials! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });     
                }
                 else{
                      $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Server error! Could not reach Server or Server returned NULL').addClass('alert alert-warning').fadeTo(600,1);
                    });
                }
            });
            return false; //not to post the  form physically
        });
    }

function AddCounty(actiontype,CountyName) {  
    $(document).off('submit');
    $(document).on('submit',"#frmaddCounty",function(e)
//        $("#frmaddCounty").submit(function(e)
        {
              if(CountyName===''){
               $("#notAddCounty").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
                    });  
            }
       else{
            e.preventDefault();
            $("#notAddCounty").removeAttr("style").addClass('alert alert-default').text('Adding New County...').fadeIn(1000);        
            $.post("serverside/action.php",
            {
                actiontype:actiontype,
                CountyName:CountyName,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct login detail
                    $("#notAddCounty").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New County Added Successfullly!.')
                        .fadeTo(900,1,function()  {  document.location='systemadmin.php';  });              
                    });                
                  
                }
                //inavlid login details
                else  if(data==='-1')   {
                    $("#notAddCounty").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Add County! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });     
                }
                else{
                      $("#notAddCounty").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Server error! Could not reach Server or Server returned NULL').addClass('alert alert-warning').fadeTo(600,1);
                    });
                }
                
            });
        }
            return false; //not to post the  form physically
        });
    }
 
function AddConstituency(actiontype,countyID,ConstituencyName)  {
    $(document).off('submit');
    $(document).on('submit',"#frmaddConstituency",function(e) 
//      $("#frmaddConstituency").submit(function(e)
      
        {   if(ConstituencyName==='' || countyID===''){
               $("#notAddConstituency").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
                    });  
            }
       else{
            e.preventDefault();
            $("#notAddConstituency").removeAttr("style").addClass('alert alert-default').text('Adding New Constituency...').fadeIn(1000);        
            $.post("serverside/action.php",
            {
                actiontype:actiontype,
                countyID:countyID,
                ConstituencyName:ConstituencyName,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct login detail
                    $("#notAddConstituency").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New Constituency Added Successfullly!.')
                        .fadeTo(900,1,function()   {  document.location='systemadmin.php'; });              
                    });                
                  
                }
                //inavlid login details
                else  if(data==='-1')   {
                    $("#notAddConstituency").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Add Constituency! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });     
                }
                else{
                      $("#notAddConstituency").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Server error! Could not reach Server or Server returned NULL').addClass('alert alert-warning').fadeTo(600,1);
                    });
                }
                
            });
        }
            return false; //not to post the  form physically
        });
 }      

function AddWard(actiontype,countyID,ConstituencyID,wardName){
    $(document).off('submit');
    $(document).on('submit',"#frmaddward",function(e) 
//      $("#frmaddward").submit(function(e)
        {
              if(wardName==='' || countyID==='' || ConstituencyID===''){
               $("#notAddWard").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
                    });  
            }
       else{
            e.preventDefault();
            $("#notAddWard").removeAttr("style").addClass('alert alert-default').text('Adding New Ward...').fadeIn(1000);        
            $.post("serverside/action.php",
            {
                actiontype:actiontype,
                countyID:countyID,
                ConstituencyID:ConstituencyID,
                wardName:wardName,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct login detail
                    $("#notAddWard").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New Ward Added Successfullly!.')
                        .fadeTo(600,1);              
                    });                
                  
                }
                //inavlid login details
                else  if(data==='-1')   {
                    $("#notAddWard").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Add Ward! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });     
                }
                else{
                      $("#notAddWard").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Server error! Could not reach Server or Server returned NULL').addClass('alert alert-warning').fadeTo(600,1);
                    });
                }
                
            });
        }
            return false; //not to post the  form physically
        });
 }
        
function GetConstituenciesofCounty(actiontype,countyID) {
    
        $.post("serverside/action.php",
            {
                actiontype:actiontype,
                countyID:countyID,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct  details
                                 
                  var selectOption=$('#wardSelectConstituecny');
                   selectOption.empty();
                    selectOption.append(data);
                   $("#wardSelectConstituecny").selectmenu('refresh'); 
                }
                              
            });
}       
 
 function GetRegiontoViewForPost(actiontype,postID){
       $.post("serverside/action.php",
            {
                actiontype:actiontype,
                postID:postID,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct  details
                                 
                  var selectOption=$('#addaccountselectRegion');
                   selectOption.empty();
                    selectOption.append(data);
                   $("#addaccountselectRegion").selectmenu('refresh'); 
                }
                              
            }); 
  }
  
 function GetAccountDetails(actiontype,clientID){
       $.post("serverside/action.php",
            {
                actiontype:actiontype,
                clientID:clientID,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct  details
                    var fields=res = data.split(":");
                 $('#emailAddress').val(fields[1]);      
                 $('#phoneNumber').val(fields[2]);                
                 
                }
                              
            }); 
  }
function AddPost(actiontype,PostName,PostDescription,postScope) {        
        $("#frmaddPost").submit(function(e)
        {
              if(PostName==='' || PostDescription==='' || postScope===''){
               $("#notAddPost").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
                    });  
            }
       else{
            e.preventDefault();
            $("#notAddPost").removeAttr("style").addClass('alert alert-default').text('Adding New Post...').fadeIn(1000);        
            $.post("serverside/action.php",
            {
                actiontype:actiontype,
                PostName:PostName,
                PostDescription:PostDescription,
                postScope:postScope,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct login detail
                    $("#notAddPost").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New Post Added Successfullly!.')
                        .fadeTo(600,1);              
                    });                
                  
                }
                //inavlid login details
                else  if(data==='-1')   {
                    $("#notAddPost").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Add Post! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });     
                }
                else{
                      $("#notAddPost").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Server error! Could not reach Server or Server returned NULL').addClass('alert alert-warning').fadeTo(600,1);
                    });
                }
                
            });
        }            
            
            return false; //not to post the  form physically
        });
    }
    
function CreateAccount(actiontype,surName, firstName,nationalID,gender, emailAddress,phoneNumber,physicalAddress,postID,regionID)  
{        
        $("#frmcreateaccount").submit(function(e)
        {
              if(surName==='' || firstName==='' || nationalID==='' || emailAddress==='' || 
                      phoneNumber===''||  physicalAddress===''|| regionID===''){
               $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
                    });  
            }
       else{
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Adding New Account...').fadeIn(1000);        
            $.post("serverside/action.php",
            {
                actiontype:actiontype,
                surName:surName,
                firstName:firstName,
                nationalID:nationalID,
                gender:gender,
                emailAddress:emailAddress,
                phoneNumber:phoneNumber,
                physicalAddress:physicalAddress,
                postID:postID,
                regionID:regionID,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct login detail
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New Account Added Successfullly!.')
                        .fadeTo(900,1,function()  {   document.location='account.php';  });                
                    });                
                  
                }
                //inavlid login details
                else  if(data==='-1')   {
                    $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Add Account! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });     
                }
                else{
                      $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Server error! Could not reach Server or Server returned NULL').addClass('alert alert-warning').fadeTo(600,1);
                    });
                }
                
            });
        }            
            
            return false; //not to post the  form physically
        });
    }
    
function AddRole(actiontype,RoleName,RoleDescription) {        
        $("#frmaddRole").submit(function(e)
        {
              if(RoleName==='' || RoleDescription===''){
               $("#notAddRole").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
                    });  
            }
       else{
            e.preventDefault();
            $("#notAddRole").removeAttr("style").addClass('alert alert-default').text('Adding New Role...').fadeIn(1000);        
            $.post("serverside/action.php",
            {
                actiontype:actiontype,
                RoleName:RoleName,
                RoleDescription:RoleDescription,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct login detail
                    $("#notAddRole").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New Role Added Successfullly!.')
                        .fadeTo(600,1);              
                    });                
                  
                }
                //inavlid login details
                else  if(data==='-1')   {
                    $("#notAddRole").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Add Role! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });     
                }
                else{
                      $("#notAddRole").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Server error! Could not reach Server or Server returned NULL').addClass('alert alert-warning').fadeTo(600,1);
                    });
                }
                
            });
        }            
            
            return false; //not to post the  form physically
        });
    } 
    
 function  CreateUSer(actiontype,clientID,RoleID) {    
    $(document).off('submit');
    $(document).on('submit',"#frmcreateuser",function(e) 
//       $("#frmcreateuser").submit(function(e)
        {
        if(clientID==='' || RoleID===''){
         $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                  $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
              });  
         }
       else{
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Creating New User...').fadeIn(1000);        
            $.post("serverside/action.php",
            {
                actiontype:actiontype,
                clientID:clientID,
                RoleID:RoleID,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct login detail
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New User Created Successfullly!.')
                        .fadeTo(900,1, function()   {  document.location='users.php';   });            
                    });                
                  
                }
                //inavlid login details
                else  if(data==='-1')   {
                    $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Create User! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });     
                }
                else{
                      $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Server error! Could not reach Server or Server returned NULL').addClass('alert alert-warning').fadeTo(600,1);
                    });
                }
                
            });
        }            
            
            return false; //not to post the  form physically
        });
    } 
 //convert to currecncy

function AddContact(actiontype,firstName,otherNames,phoneNumber,gender,yob,addaccountselectRegion){
       $("#frmaddcontact").submit(function(e)
        {
              if(firstName==='' || otherNames==='' || phoneNumber==='' || yob===''){
               $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
                    });  
            }
       else{
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Adding New Contact...').fadeIn(1000);        
            $.post("serverside/action.php",
            {
                actiontype:actiontype,
                firstName:firstName,
                otherNames:otherNames,
                phoneNumber:phoneNumber,
                gender:gender,
                yob:yob,
                addaccountselectRegion:addaccountselectRegion,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct login detail
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New Contact Added Successfullly!.')
                        .fadeTo(900,1, function()   {  document.location='contacts.php';   });              
                    });                
                  
                }
                //inavlid login details
                else  if(data==='-1')   {
                    $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Add Contact! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });     
                }
                else{
                      $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Server error! Could not reach Server or Server returned NULL').addClass('alert alert-warning').fadeTo(600,1);
                    });
                }
                
            });
        }            
            
            return false; //not to post the  form physically
        });
}
function AddGroupContact(actiontype,groupID,firstName,otherNames,phoneNumber,gender,yob,addaccountselectRegion){
     $("#frmaddgroupcontact").submit(function(e)
        {
              if(firstName==='' || otherNames==='' || phoneNumber==='' || yob===''){
               $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
                    });  
            }
       else{
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Adding New Contact...').fadeIn(1000);        
            $.post("serverside/action.php",
            {
                actiontype:actiontype,
                groupID:groupID,
                firstName:firstName,
                otherNames:otherNames,
                phoneNumber:phoneNumber,
                gender:gender,
                yob:yob,
                addaccountselectRegion:addaccountselectRegion,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct login detail
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New Contact Added Successfullly!.')
                        .fadeTo(900,1, function()   {  document.location='contacts.php';   });              
                    });                
                }
                //inavlid login details
                else  if(data==='-1')   {
                    $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Add Contact! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });     
                }
                else{
                      $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Server error! Could not reach Server or Server returned NULL').addClass('alert alert-warning').fadeTo(600,1);
                    });
                }
                
            });
        }            
            
            return false; //not to post the  form physically
        });
}
function  AddContactGroup(actiontype,groupName,GroupDescription){
    
    $("#frmaddcontactgroup").submit(function(e)
        {
              if(groupName==='' || GroupDescription===''){
               $("#notContactGroup").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
                    });  
            }
       else{
            e.preventDefault();
            $("#notContactGroup").removeAttr("style").addClass('alert alert-default').text('Adding New Contact Group...').fadeIn(1000);        
            $.post("serverside/action.php",
            {
                actiontype:actiontype,
                groupName:groupName,
                GroupDescription:GroupDescription,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct login detail
                    $("#notContactGroup").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New Contact Group Added Successfullly!.')
                        .fadeTo(900,1, function()   {  document.location='contactgroups.php';   });              
                    });                
                  
                }
                //inavlid login details
                else  if(data==='-1')   {
                    $("#notContactGroup").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Add Contact Group! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });     
                }
                else{
                      $("#notContactGroup").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Server error! Could not reach Server or Server returned NULL').addClass('alert alert-warning').fadeTo(600,1);
                    });
                }
                
            });
        }            
            
            return false; //not to post the  form physically
        });
}

function InserttextParams(param,messageText,messageContainer)
{
         var caretPos = messageContainer[0].selectionStart;        
        messageContainer.val(messageText.substring(0, caretPos) + param + messageText.substring(caretPos) );
        $('#message').focus();
}