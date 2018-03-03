	//events
$(document).ready(function(){
var _totadivs=7;
 $('#fileUpload').on("change" ,function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  }) ;
  
  var postCategory = $('#postCategory').val();
  $("#selectAllCategories option:contains("+postCategory+")").attr('selected', true);
  
    //login
 $('#btnlogin').click(function(){

     var actiontype   = $('#actiontype').val();   //show the type of action to be called in action.php
     var username     = $('#myusername').val();
     var userpassword = $('#mypassword').val(); 
     Login(actiontype,username, userpassword);

 }) ; 
 
    $('#btnPendingPostsView').click(function(){
          
       for(var i=0;i<_totadivs;i++){ 
        $('#'+i).hide();
        }
       $('#1').show();   
      }) ;
    
     $('#btnApprovedPostsView').click(function(){
          
       for(var i=0;i<_totadivs;i++){ 
        $('#'+i).hide();
        }
       $('#2').show();   
      }) ;
       
     $('#btnDeclinedPostsView').click(function(){
          
       for(var i=0;i<_totadivs;i++){ 
        $('#'+i).hide();
        }
       $('#3').show();   
      }) ;
      
 
    $('#btnPendingCommentsView').click(function(){
          
       for(var i=0;i<_totadivs;i++){ 
        $('#'+i).hide();
        }
       $('#4').show();   
      }) ;
    
     $('#btnApprovedCommentsView').click(function(){
          
       for(var i=0;i<_totadivs;i++){ 
        $('#'+i).hide();
        }
       $('#5').show();   
      }) ;
       
     $('#btnDeclinedCommentsView').click(function(){
          
       for(var i=0;i<_totadivs;i++){ 
        $('#'+i).hide();
        }
       $('#6').show();   
      }) ;
   //changing Views     
 $('#btnAddUserGroupView').click(function(){
    $('#sectionAddUserGroup').show(); 
//hide the others
   $('#sectionAddCategories').hide(); 
  
 }) ; 
 
$('#btnAddCategoryView').click(function(){
    $('#sectionAddCategories').show(); 
//hide the others
   $('#sectionAddUserGroup').hide(); 
  
 }) ; 
 
// btnaddCategory
$('#btnaddCategory').click(function(){

    var actiontype    = $('#actiontypeaddcategory').val();
    var categoryName  = $('#categoryName').val();      
    var categoryDescription=$('#categoryDescription').val();    

if(categoryName==='' || categoryDescription===''){ 

    $("#notAddCategory").fadeTo(200,0.1,function() { 
    $(this).html('<span class="glyphicon glyphicon-warning-sign"> Please fill all the fields and try again!</span>').addClass('alert alert-warning').fadeTo(600,1);
     });  
    return false;
    }

else{
    if(confirm("Do you wish to Add "+categoryName+" as a Category?") === true){   
       AddCategory(actiontype,categoryName,categoryDescription);
        //clear inputs
        $('#categoryName').val("");
        $('#categoryDescription').val("");
    }
}
}) ;
 
 //ADD User group     
$('#btnaddUserGroup').click(function(){

   var actiontype       = $('#actiontypeaddUserGroup').val();      
   var groupName        = $('#groupName').val();      
   var groupDescription = $('#groupDescription').val();

if(groupName==='' || groupDescription===''){ 

   $("#notAddUserGroup").fadeTo(200,0.1,function() { 
   $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
    });  
   return false;
   }

else{

if(confirm("Do you wish to Add "+groupName+" as a User group?") === true){   
  AddUsergroup(actiontype,groupName,groupDescription);
       //clear inputs
       $('#groupDescription').val("");
       $('#groupName').val("");
   }
}
}) ;  
 
//btnAddUser 
$('#btnAddUser').click(function(){

    var actiontype      = 'AddUser';       
    var lastname        = $('#lastname').val();
    var firstname       = $('#firstname').val(); 
    var emailaddress    = $('#emailaddress').val();
    var phonenumber     = $('#phonenumber').val();
    var gender          = $('input:radio[name=radiogender]:checked').val();    
    var selectUsergroup = $('#selectUsergroup').val();

if(lastname==='' || firstname==='' || emailaddress===''){ 

   $("#not").fadeTo(200,0.1,function() { 
   $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
    });  
   return false;
   }

else{

if(confirm("Do you wish to Add "+lastname+" as a User?") === true){   
  AddUser(actiontype,lastname,firstname,phonenumber,emailaddress,gender,selectUsergroup);
       //clear inputs
       $('#lastname').val("");
       $('#lastname').val("");
       $('#phonenumber').val("");
       $('#emailaddress').val("");
   }
}
});

//btnAddPost
$('#btnAddPost').click(function(){
         
        var actiontype      = $('#actiontypeaddNewPost').val();      
        var postTitle       = $('#postTitle').val();      
        var categoryID      = $('#selectAllCategories').val();
        var postDescription = $('#postDescription').val();
        var linkName        = $('#linkName').val();
        var postLink        = $('#postLink').val();
        
   if(postTitle==='' || postDescription==='' || linkName==='' || postLink===''){  
       
        $("#not").fadeTo(200,0.1,function() { 
        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
         });  
        return false;
        }         
  else{
     
  if(confirm("Do you wish to Add "+postTitle+" as a Post?")){  
      
       AddNewPost(actiontype,postTitle,postDescription,categoryID,linkName,postLink);
//            //clear inputs
//            $('#postTitle').val("");
//            $('#postDescription').val("");
//            $('#linkName').val("");
//            $('#postLink').val("");
        }
    }
}) ;  
 

 //btnApprovePost
$('#btnApprovePost').click(function(){
         
        var actiontype  = "ApprovePost";      
        var postCode    = $('#postCode').val();      
        var postRemarks = $('#postRemarks').val();
        
        
   if(postRemarks===''){  
       
        $("#not").fadeTo(200,0.1,function() { 
        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please add Remarks and try again!').addClass('alert alert-warning').fadeTo(600,1);
         });  
        return false;
        }         
  else{
     
  if(confirm("Do you wish to Approve post "+postCode+"?") === true){  
      
       ApprovePost(actiontype,postCode,postRemarks);
            //clear inputs
            $('#postRemarks').val("");
        }
    }
});  

//btnDeclinePost
$('#btnDeclinePost').click(function(){
         
        var actiontype  = "DeclinePost";      
        var postCode    = $('#postCode').val();      
        var postRemarks = $('#postRemarks').val();
        
        
   if(postRemarks===''){  
       
        $("#not").fadeTo(200,0.1,function() { 
        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please add Remarks and try again!').addClass('alert alert-warning').fadeTo(600,1);
         });  
        return false;
        }         
  else{
     
  if(confirm("Do you wish to Decline post "+postCode+"?") === true){  
      
       DeclinePost(actiontype,postCode,postRemarks);
            //clear inputs
            $('#postRemarks').val("");
        }
    }
});
//btnUpdatePost

$('#btnUpdatePost').click(function(){
         
        var actiontype      = "UpdatePost";      
        var postCode        = $('#postCode').val();      
        var postTitle       = $('#postTitle').val();      
        var categoryID      = $('#selectAllCategories').val();
        var postDescription = $('#postDescription').val();
        var linkName        = $('#linkName').val();
        var postLink        = $('#postLink').val();
        
        
   if(postTitle==='' || postDescription==='' || linkName==='' || postLink===''){  
       
        $("#not").fadeTo(200,0.1,function() { 
        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
         });  
        return false;
        }         
  else{
     
  if(confirm("Do you wish to Update this post "+postCode+"?") === true){  
      
       UpdatePost(actiontype,postCode,postTitle,postDescription,categoryID,linkName,postLink);
         
        }
    }
}) ;  
//btnUpdateDeclinedPost

$('#btnUpdateDeclinedPost').click(function(){
         
        var actiontype      = "UpdateDeclinedPost";      
        var postCode        = $('#postCode').val();      
        var postTitle       = $('#postTitle').val();      
        var categoryID      = $('#selectAllCategories').val();
        var postDescription = $('#postDescription').val();
        var linkName        = $('#linkName').val();
        var postLink        = $('#postLink').val();
        
        
   if(postTitle==='' || postDescription==='' || linkName==='' || postLink===''){  
       
        $("#not").fadeTo(200,0.1,function() { 
        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
         });  
        return false;
        }         
  else{
     
  if(confirm("Do you wish to Update this post "+postCode+"?") === true){  
      
       UpdatePost(actiontype,postCode,postTitle,postDescription,categoryID,linkName,postLink);
         
        }
    }
}) ;




//End of events 
});

 function setselectOption(selectControl,optionName)
 {
     $(selectControl).selected(text(optionName));
 }
     
//functions 

function GetAllCategories() {
    
        $.post("serverside/action.php",
            {
                actiontype:'GetAllCategories',
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




function Login(actiontype,username, userpassword) {        
    $(document).off('submit');
    $(document).on('submit',"#login_form",function(e)    
        {
            if(username==='' || userpassword===''){
               $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Please fill all the fields and try again!').addClass('alert alert-warning').fadeTo(600,1);
                    });  
            }
       else{
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Verifying...').fadeIn(1000);        
            $.post("common/core/action.php",
            {
                actiontype:actiontype,
                myusername:username,
                mypassword:userpassword,
                rand:Math.random()
            } ,
            function(data)   {

                var jsonObject = JSON.parse($.trim(data));

                if(jsonObject.status === 'Succsesfull')   { //if correct login detail
                  
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>Welcome '+jsonObject.data+', we are loggin you.')
                        .fadeTo(600,1,
                            function()  {    document.location='index.php?r=pages/home&p=Dashboard'; 
                          });
              
                    });                
                  
                }
                //inavlid login details
                else  if(jsonObject.status === 'Failed')   {
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

function  AddCategory(actiontype,categoryName,categoryDescription){
    $(document).off('submit');
    $(document).on('submit',"#frmaddcategory",function(e) 
    {
            e.preventDefault();
            $("#notAddCategory").removeAttr("style").addClass('alert alert-default').text('Adding New Category...').fadeIn(1000);        
            $.post("common/core/action.php",
            {
                actiontype:actiontype,
                categoryName:categoryName,
                categoryDescription:categoryDescription,
                rand:Math.random()
            } ,
            function(data)   {
                var jsonObject = JSON.parse($.trim(data));

                if(jsonObject.status === 'Succsesfull')   {  //if status is Succsesfull
                    $("#notAddCategory").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New Category '+categoryName+' Added Successfullly!.')
                        .fadeTo(600,1,
                
                        function (){ document.location='index.php?r=systemadmin&p= Add New Category'; } );              
                    });                
                  
                }
                //if status is Failed
                else  if(jsonObject.status === 'Failed')   {
                    $("#notAddCategory").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Add Category! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });     
                }
                else{
                      $("#notAddCategory").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Server error! Could not reach Server or Server returned NULL').addClass('alert alert-warning').fadeTo(600,1);
                    });
                }
                
            });
        
            return false; //not to post the  form physically
        });
 }

//AddUsergroup
function AddUsergroup(actiontype,groupName,groupDescription) {   
    $(document).off('submit');
    $(document).on('submit',"#frmaddUserGroup",function(e) 
        {
            
            e.preventDefault();
            $("#notAddUserGroup").removeAttr("style").addClass('alert alert-default').text('Adding New User Group...').fadeIn(1000);        
            $.post("common/core/action.php",
            {
                      actiontype:actiontype,
                       groupName:groupName,
                groupDescription:groupDescription,
                            rand:Math.random()
            } ,
            function(data)   {
                var jsonObject = JSON.parse($.trim(data));

                if(jsonObject.status === 'Succsesfull')   {  //if status is Succsesfull
                    $("#notAddUserGroup").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New User group '+groupName+' Added Successfullly!.')
                        .fadeTo(600,1);              
                    });                
                  
                }
                //if status is Failed
                else  if(jsonObject.status === 'Failed')   {
                    $("#notAddUserGroup").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Add User group! Please try again').addClass('alert alert-warning').fadeTo(600,1);
                    });     
                }
                else{
                      $("#notAddUserGroup").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Server error! Could not reach Server or Server returned NULL').addClass('alert alert-warning').fadeTo(600,1);
                    });
                }
                
            });
                  
            
            return false; //not to post the  form physically
        });
    } 
//AddUser
function AddUser(actiontype,lastname,firstname,phonenumber,emailaddress,gender,selectUsergroup){
    $(document).off('submit');
    $(document).on('submit',"#frmadduser",function(e) 
        {            
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Adding New User ...').fadeIn(1000);        
            $.post("common/core/action.php",
            {
                     actiontype:actiontype,
                       lastname:lastname,
                      firstname:firstname,
                    phonenumber:phonenumber,
                   emailaddress:emailaddress,
                         gender:gender,
                selectUsergroup:selectUsergroup,
                           rand:Math.random()
            } ,
            function(data)   {
                var jsonObject = JSON.parse($.trim(data));

                if(jsonObject.status === 'Succsesfull')   {  //if status is Succsesfull
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New User '+lastname+' Added Successfullly!.')
                        .fadeTo(990,1,
                            function()  {   
                               
                                document.location='users.php'; });              
                    });  
                }
                //if status is Failed
                else  if(jsonObject.status === 'Failed')   {
                    $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Add User! Please try again').addClass('alert alert-warning').fadeTo(600,1);
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
    
 //ADD POST
function AddNewPost(actiontype,postTitle,postDescription,categoryID,linkName,postLink) {   
    $(document).off('submit');
    $(document).on('submit',"#frmaddNewPost",function(e) 
        {
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Adding New Post...').fadeIn(1000);        
            $.post("common/core/action.php",
            {
                     actiontype:actiontype,
                      postTitle:postTitle,
                postDescription:postDescription,
                     categoryID:categoryID,
                       linkName:linkName,
                       postLink:postLink,
                           rand:Math.random()
            } ,
            function(data)   {
                var jsonObject = JSON.parse($.trim(data));

                if(jsonObject.status === 'Succsesfull')   {  //if status is Succsesfull
                    
                   var postCode = jsonObject.data; 
                    //postMedia here  
                    var fileUpload= $('#fileUpload').val();
                                      
                   if(fileUpload!==''){
                    UploadMedia(postCode,'uploadMedia');
                }
                    alert('New Post '+postTitle+' Added Successfullly.Waiting Approval !.');
                    //if correct login detail
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>New Post '+postTitle+' Added Successfullly.Waiting Approval !.')
                        .fadeTo(600,1,
                            function()  {                                 
                                document.location='index.php?r=pages/newposts&p=Add New Post'; }); 
                        
                    });                
                
                }
                //if status is Failed
                else  if(jsonObject.status === 'Failed')   {
                    $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Add Post! Please try again').addClass('alert alert-warning').fadeTo(600,1);
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
// ApprovePost
function ApprovePost(actiontype,postCode,postRemarks){
   $(document).off('submit');
    $(document).on('submit',"#frmaddViewPostDetails",function(e) 
        {
            
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Approving Post...').fadeIn(1000);        
            $.post("common/core/action.php",
            {
                actiontype:actiontype,
                postCode:postCode,
                postRemarks:postRemarks,
                rand:Math.random()
            } ,
            function(data)   {
                var jsonObject = JSON.parse($.trim(data));

                if(jsonObject.status === 'Succsesfull')   {  //if status is Succsesfull
                    alert('PostCode '+postCode+' has been Approved Successfullly!.');
                    //if correct login detail
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>PostCode '+postCode+' has been Approved Successfullly!.')
                        .fadeTo(600,1,
                        function()  {    document.location='approveposts.php'; });             
                    });              
                  
                }
                //if status is Failed
                else  if(jsonObject.status === 'Failed')   {
                    $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Approve PostCode '+postCode+'! Please try again').addClass('alert alert-warning').fadeTo(600,1);
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
//declinePOst
function DeclinePost(actiontype,postCode,postRemarks){
   $(document).off('submit');
    $(document).on('submit',"#frmaddViewPostDetails",function(e) 
        {
            
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Dclining Post...').fadeIn(1000);        
            $.post("common/core/action.php",
            {
                actiontype:actiontype,
                postCode:postCode,
                postRemarks:postRemarks,
                rand:Math.random()
            } ,
            function(data)   {
                var jsonObject = JSON.parse($.trim(data));

                if(jsonObject.status === 'Succsesfull')   {  //if status is Succsesfull
                    alert('PostCode '+postCode+' has been Declined Successfullly!.');
                    //if correct login detail
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>PostCode '+postCode+' has been Declined Successfullly!.')
                        .fadeTo(600,1 ,
                        function()  {    document.location='approveposts.php'; });               
                    });              
                  
                }
                //if status is Failed
                else  if(jsonObject.status === 'Failed')   {
                    $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Decline PostCode '+postCode+'! Please try again').addClass('alert alert-warning').fadeTo(600,1);
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
//UpdatePost
function UpdatePost(actiontype,postCode,postTitle,postDescription,categoryID,linkName,postLink){
    $(document).off('submit');
    $(document).on('submit',"#frmViewPostDetails",function(e) 
        {
            e.preventDefault();
            $("#not").removeAttr("style").addClass('alert alert-default').text('Updating Post Please wait...').fadeIn(1000);        
            $.post("common/core/action.php",
            {
                actiontype:actiontype,
                postCode:postCode,
                postTitle:postTitle,
                postDescription:postDescription,
                categoryID:categoryID,
                linkName:linkName,
                postLink:postLink,
                rand:Math.random()
            } ,
            function(data)   {
                var jsonObject = JSON.parse($.trim(data));

                if(jsonObject.status === 'Succsesfull')   {  //if status is Succsesfull
                    //postMedia here 
                   var fileUpload= $('#fileUpload').val();
                                      
                   if(fileUpload!==''){
                    UploadMedia(postCode,'updateMedia');
                   }
                    alert('Post '+postTitle+' details Update Successfullly.');
                    //if correct login detail
                    $("#not").fadeTo(200,0.1,function()  //start fading the messagebox
                    {   //add message and change the class of the box and start fading
                        $(this).removeClass( "alert alert-warning" ).addClass('alert alert-success')
                        .html('<span class="glyphicon glyphicon-thumbs-up"></span>Post '+postTitle+' details Update Successfullly.')
                        .fadeTo(900,1,
                            function()  {    document.location='viewposts.php'; });                         
                    });   
                }
                //if status is Failed
                else  if(jsonObject.status === 'Failed')   {
                    $("#not").fadeTo(200,0.1,function() { //start fading the messagebox              
                        $(this).html('<span class="glyphicon glyphicon-warning-sign"></span> Sorry,Could not Update Post! Please try again').addClass('alert alert-warning').fadeTo(600,1);
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
//upload media
 
function UploadMedia(postCode,actiontype){
     var _success = -1;
     var formData = new FormData($('#frmuploadMedia')[0]);
         formData.append("postCode",postCode);
         formData.append("actiontype",actiontype);
         
   $.ajax({
       url: 'common/core/action.php',
       type: 'POST',
       data: formData,
       async: false,
       cache: false,
       contentType: false,
       enctype: 'multipart/form-data',
       processData: false,
       success: function (response) {
        _success=response;
       }
   });
   return _success;
 }
 
function GetConstituenciesofCounty(actiontype,countyID) {
    
        $.post("common/core/action.php",
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
       $.post("common/core/action.php",
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
  
function InserttextParams(param,messageText,messageContainer)
{
         var caretPos = messageContainer[0].selectionStart;        
        messageContainer.val(messageText.substring(0, caretPos) + param + messageText.substring(caretPos) );
        $('#message').focus();
}
