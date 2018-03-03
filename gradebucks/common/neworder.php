<?php
 $model  = $_POST; 
 $all_countries   = $fn->find_countries(); 
?>
 <div class="panel panel-primary col-md-9 col-sm-12" style="padding:0px">
  <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.2em">New Order</h3>
  </div>
  <div class="panel-body">
  <form method="post" id="register_form" action="common/core/action.php" enctype="multipart/form-data">  
  <input type="hidden" name='actiontype' id="actiontype" value="AddNewOrder"> 
  <input type="hidden" name='total_price' id="total_price" value="<?= $model['total_price'] ?>">
  <input type="hidden" id="languagestyle_value" value="0">
  <div id="all_countries"  style="display: none" ><?= json_encode($all_countries)  ?></div>
 <div class="body bg-gray">
	<div id="not"><?php $fn->setFlash();?></div>
        <ul class="nav nav-tabs">
            <li class="active" id="paper_details"><a>Paper Details</a></li>
            <li id="contact_info"><a>Contact Information</a></li>
        </ul> 
<div id="div_paper_details"> 
    <br>
  <div class="row"> 
      <div class="col-md-4 control-label" style="text-align: right">Type of Service </div>
      <div class="col-md-8">
       <?php $fn->dropdwonList($fn->find_all_services('dropdown'),
                  array('class'=>'form-control','name'=>'type_service'),$model['type_service']);
            ?>
      </div>
  </div>
  <div class="row"> <br>  
       <div class="col-md-4 control-label" style="text-align: right">Subject Area </div>
       <div class="col-md-8">
        <?php   $fn->dropdwonList($fn->find_subjcet_area('dropdown'),
                    array('class'=>'form-control','name'=>'subjectname'),$model['subjectname']); ?>
      </div>
  </div> 
  <div class="row"> <br>  
       <div class="col-md-4 control-label" style="text-align: right">Type of Paper </div>
       <div class="col-md-8">
        <?php   $fn->dropdwonList($fn->find_paper_types('dropdown'),
                    array('class'=>'form-control','name'=>'paper_type'),$model['paper_type']); ?>
      </div>
  </div>  
  <div class="row"><br>  
       <div  class="col-md-4 control-label" style="text-align: right">Pages(1 page = 300 words) </div>
       <div class="col-md-8">
       <input type="number" id="page_numbers" name="page_numbers" required="true" value="<?= $model['page_numbers'] ?>" class="form-control" placeholder="Number of Pages" required="true"/>
      </div>
  </div>
  <div class="row"><br>            
    <div  class="col-md-4 control-label" style="text-align: right"class="control-label ">Academic Level: </div>
       <div class="col-md-8">
   <?php $fn->dropdwonList($fn->find_academiclevels('dropdown'),
                array('class'=>'form-control','name'=>'academic_level','id'=>'academic_level'),$model['academic_level']); ?>
        </div>
  </div>
  <div class="row"><br> 
    <div   class="col-md-4 control-label" style="text-align: right">Urgency Level </div>
    <div class="col-md-8">
  <?php $fn->dropdwonList($fn->find_urgencies('dropdown'),
                array('class'=>'form-control','name'=>'urgency_level','id'=>'urgency_level'),$model['urgency_level']); ?>
         </div>
  </div>
  <div class="row"><br> 
       <div class="col-md-4 control-label" style="text-align: right">Topic</div> 
       <div class="col-md-8">
       <input type="text" name="topic" class="form-control" placeholder="Topic" required="true"/>
  </div>
  </div>
     <div class="row"><br>            
    <div class="col-md-4 control-label" style="text-align: right">Topic Description</div> 
    <div class="col-md-8">
    <textarea name="topicdescription" id="topicdescription" class="form-control" placeholder="Topic Description" required="true"></textarea>
        </div>
  </div>
   <div class="row"><br>            
    <div class="col-md-4 control-label" style="text-align: right">Spacing</div> 
    <div class="col-md-8"><div class="col-md-12">
    <div class="col-md-6">            
        <input type="radio" name="spacing"  value="Double" required="true" checked="checked">Double
    </div><div class="col-md-6"> 
     <input type="radio" name="spacing"  value="Single" required="true" >Single
    </div>
    </div>
  </div>  
  </div>
    
  <div class="row"><br> 
       <div class="col-md-4 control-label" style="text-align: right">Paper Format</div> 
       <div class="col-md-8">
           <select name="writing_format" class="form-control" >
                <option value="APA">APA</option>                    
                <option value="MLA">MLA</option>
                <option value="Turabian">Turabian</option>
                <option value="Chicago">Chicago</option>
                <option value="Harvard">Harvard</option>
                <option value="Oxford">Oxford</option>
                <option value="Vancouver">Vancouver</option>
                <option value="CBE">CBE</option>
                <option value="Other">Other</option>
           </select></div>
  </div> 
  <div class="row"><br> 
       <div class="col-md-4 control-label" style="text-align: right">Additional Materials</div> 
       <div class="col-md-8">
       <div id="atachfile" >
           <input id="uploadedfiles"  type="file" name="uploadedfiles[]" multiple="multiple" class="btn btn-default"/>
       </div> </div>
  </div>
   
 <div class="row"><br>            
    <div class="col-md-4 control-label" style="text-align: right">Order Instructions</div> 
    <div class="col-md-8">
    <textarea name="order_instructions"  class="form-control" placeholder="Order Instructions" ></textarea>
        </div>
  </div>
    
   <div class="row"><br>            
    <div class="col-md-4 control-label" style="text-align: right">Preferred Language style:</div> 
    <div class="col-md-8"><div class="col-md-12">
    <div class="col-md-6">            
        <label> <input type="radio" name="languagestyle"  id="USWriter" value="USWriter" required="true" checked="checked">I want US Writer</label>
    </div><div class="col-md-6"> 
        <label> <input type="radio" name="languagestyle" id="UKWriter" value="UKWriter" required="true" >I want UK Writer</label>
    </div>
    </div>
  </div>  
  </div>
    
 <div class="row"> <br>
 <div class="col-md-4"></div>
 <div id="total_price_div" class="col-md-8" style="text-align: center;font-size: 1.7em;background-color: navy;color: gold;"> 
   Total Price:$ <b><?= $model['total_price'] ?></b>
</div>
 </div>
 <div class="row"> <br>
     <div class="col-md-4"></div><div class="form-group col-md-8">                           
        <button type="button" class="btn btn-primary btn-block " id="next_step"> >> Next Step</button> 
    </div>
    </div>   
</div>
        
 <div id="div_contact_info" style="display: none">
    <br>  
  <div class="row"><br> 
       <div class="col-md-4 control-label" style="text-align: right">First Name</div> 
       <div class="col-md-8">
       <input type="text" name="firstname" class="form-control" placeholder="First Name" required="true"/>
  </div>
  </div> 
  <div class="row"><br> 
       <div class="col-md-4 control-label" style="text-align: right">Other Name</div> 
       <div class="col-md-8">
       <input type="text" name="lastname" class="form-control" placeholder="Other Name" required="true"/>
  </div>
  </div>
    <div class="row"><br>            
    <div class="col-md-4 control-label" style="text-align: right">Gender</div> 
    <div class="col-md-8"><div class="col-md-12">
    <div class="col-md-6">            
        <input type="radio" name="gender"  value="Male" required="true" checked="checked">Male
    </div><div class="col-md-6"> 
     <input type="radio" name="gender"  value="Female" required="true" >Female
    </div>
    </div>
  </div>  
   </div> 
  <div class="row"><br> 
       <div class="col-md-4 control-label" style="text-align: right">Email Address</div> 
       <div class="col-md-8">
       <input type="email" name="email_address" class="form-control" placeholder="Email Address" required="true"/>
  </div>
  </div> 
  <div class="row"><br> 
       <div class="col-md-4 control-label" style="text-align: right">Country</div> 
       <div class="col-md-8">
         <?php   $fn->dropdwonList($fn->find_countries('dropdown'),
                    array('name'=>'country','id'=>'my_country','class'=>'form-control')); ?>
  </div>
  </div> 
  <div class="row"><br> 
       <div class="col-md-4 control-label" style="text-align: right">Phone Number</div> 
       <div class="col-md-8" style="padding-left: 1px;padding-right: 1px;"><div class="col-md-2"><input type="text" disabled="disabled" name="phone_prefix" id="phone_prefix" maxlength="4" class="form-control" style="padding-right: 8px;padding-left: 8px;"/></div>
           <div class="col-md-10">
       <input type="text"  name="phone_number" maxlength="10" class="form-control" placeholder="Phone Number" required="true"/></div>
  </div>
  </div>  
  <div class="row"><br> 
       <div class="col-md-4 control-label" style="text-align: right">New Password</div> 
       <div class="col-md-8">
       <input type="password"  name="new_password"  id="new_password" class="form-control" placeholder="New Password" required="true"/>
  </div>
  </div>     
  <div class="row"><br> 
       <div class="col-md-4 control-label" style="text-align: right">Confirm Password</div> 
       <div class="col-md-8">
       <input type="password"  name="confirm_password" id="confirm_password"  class="form-control" placeholder="Confirm Password" required="true"/>
  </div>
  </div>
   
        
  <div class="row">
  <div class="form-group col-md-12 required"><br>
      <span> <input type="checkbox" name="terms_and_conditions" id="terms_and_conditions" required="true"/>I agree with
          <a href="common/core/fileUplaods/MONEY BACK GUARANTEE.docx">Money Back Guarantee,</a>
          <a href="common/core/fileUplaods/Terms and Conditions.docx">Privacy Policy</a>and 
          <a href="common/core/fileUplaods/Terms and Conditions.docx">Terms of Use</a></span>
  </div>
  </div>
  <div class="row"> <br>
   <div class="col-md-4"></div><div class="form-group col-md-8">                           
        <button type="submit" class="btn btn-primary btn-block " >Proceed to Payment</button> 
    </div>
    </div> 
</div> 
</div>  
    </form>
   </div>
</div>

<?php require 'common/sidebar.php'; ?>
<script>
//events
  
$(document).ready(function(){
var files = 0;
var docFiles = new FormData();

        $('#paper_details').click(function(){
         chnageDisplayState('div_paper_details','block'); 
         chnageDisplayState('div_contact_info','none');
         $("#contact_info").removeAttr("class");
         $('#paper_details').addClass('active');
        }) ; 
        
        $('#contact_info').click(function(){            
         chnageDisplayState('div_contact_info','block'); 
         chnageDisplayState('div_paper_details','none');
         $("#paper_details").removeAttr("class");
         $('#contact_info').addClass('active');
         
        }) ; 
        
        $('#next_step').click(function(){
         chnageDisplayState('div_contact_info','block'); 
         chnageDisplayState('div_paper_details','none');
         $("#paper_details").removeAttr("class");
         $('#contact_info').addClass('active');  
        }); 
  
        $('#confirm_password').blur(function(){
         var new_password       = $('#new_password').val();
         var confirm_password   = $('#confirm_password').val();
         
         if(confirm_password.length<6){
             alert('Weak password. Ensure the length is greater than 6 characters');
         }
         else if(!(new_password==confirm_password)){
             alert('The new password and confirm password do not match. Please ensure the passwords are the match')
         }
         else{
             $('#confirm_password').addClass('sucess');
         }
         
        }); 
        
        $('#my_country').click(function(){
         var selected_country = $('#my_country').val();
         var all_countries = JSON.parse($('#all_countries').html()); 
         var size = all_countries.length;
           for(var i=0;i<size;i++){
               console.log(all_countries[i].currencycode);
               if(selected_country==all_countries[i].contryid){
                  $('#phone_prefix').val(all_countries[i].currencycode) ; 
                 break;   
             }
           }
          
        }) ;
        $('#page_numbers').blur(function(){
            calculatePrice();
        }) ; 
        
         $('#page_numbers').ready(function(){
            calculatePrice();
        }) ;
        
         $('#urgency_level').change(function(){
          calculatePrice();
        });   
         
         $('#academic_level').change(function(){
          calculatePrice();
        });
        
         $('#USWriter').click(function(){
           $('#languagestyle_value').val(0); 
           calculatePrice();           
        }) ;
        
       $('#UKWriter').click(function(){ 
           var total_price = $('#total_price').val();
           var ukwriter = 0.1*total_price;
           $('#languagestyle_value').val(ukwriter); 
           calculatePrice();
        }) ;        
         //uploading files to form data
//     $('#uploadedfiles').change(function(){
//         $('<h5>'+(files+1)+'. Filename: '+$('#uploadedfiles').val()+' </h5>').appendTo('#atachfile');
//          files++;
//    }) ; 
        
});

function chnageDisplayState(element,state){
    document.getElementById(element).style.display=state; 
}
function calculatePrice(){
   var urgency_level =   $('#urgency_level option:selected').text();
   var page_numbers =   $('#page_numbers').val();
   var UKWriter =   $('#languagestyle_value').val();
   var academic_level = $('#academic_level').val();
   var urgency_price = 1;
    var academic_price = 1;
          
          switch(urgency_level){
              case '6 Hours':
                  urgency_price = 6;
                  break;
              case '8 Hours':
                  urgency_price = 6;
                  break;
              case '12 Hours':
                  urgency_price = 5;
                  break;
              case '18 Hours':
                  urgency_price = 5;
                  break;
              case '24 Hours':
                  urgency_price = 4;
                  break;
              case '18 Hours':
                  urgency_price = 5;
                  break;
              case '24 Hours':
                  urgency_price = 4;
                  break;
              case '48 Hours':
                  urgency_price = 4;
                  break;
              case '3 Days':
                  urgency_price = 3;
                  break;
              case '4 Days':
                  urgency_price = 2;
                  break;
              case '5 Days':
                  urgency_price = 1;
                  break;
              case '6 Days':
                  urgency_price = 1;
                  break;
              case '7 Days':
                  urgency_price = 1;
                  break;
                  break;
              case '10 Days':
                  urgency_price = 1;
                  break;
              default:
                  urgency_price = 1;
                  break;
          }
          
            switch(academic_level){
              case '7':
                  academic_price = 3;
                  break;
              case '6':
              case '5':
              case '4':
                  academic_price = 2;
                  break;              
              default:
                  academic_price = 1;
                  break;              
          }
          //price per page
          var page_price = (12.99+urgency_price+academic_price);
        //total price
          var total_price = (page_numbers*page_price)+parseFloat(UKWriter);
          $('#total_price_div').html('Total Price: <b>$'+total_price.toFixed(2)+'</b>');
          $('#total_price').val(total_price.toFixed(2));
 
}



</script>