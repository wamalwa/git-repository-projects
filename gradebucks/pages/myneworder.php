<div class="panel panel-primary col-md-9 col-sm-12" style="padding:0px">
  <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.2em">My New Order</h3>
  </div>
  <div class="panel-body">
  <form method="post" id="register_form" action="common/core/action.php" enctype="multipart/form-data">  
  <input type="hidden" name='actiontype' id="actiontype" value="MyNewOrder"> 
  <input type="hidden" name='total_price' id="total_price" value="">
  <input type="hidden" id="languagestyle_value" value="0">
 <div class="body bg-gray">
	<div id="not"><?php $fn->setFlash();?></div>

<fieldset><legend>Paper Details</legend>
  <div class="row"> 
      <div class="col-md-4 control-label" style="text-align: right">Type of Service </div>
      <div class="col-md-8">
       <?php $fn->dropdwonList($fn->find_all_services('dropdown'),
                  array('class'=>'form-control','name'=>'type_service'));
            ?>
      </div>
  </div>
  <div class="row"> <br>  
       <div class="col-md-4 control-label" style="text-align: right">Subject Area </div>
       <div class="col-md-8">
        <?php   $fn->dropdwonList($fn->find_subjcet_area('dropdown'),
                    array('class'=>'form-control','name'=>'subjectname')); ?>
      </div>
  </div> 
  <div class="row"> <br>  
       <div class="col-md-4 control-label" style="text-align: right">Type of Paper </div>
       <div class="col-md-8">
        <?php   $fn->dropdwonList($fn->find_paper_types('dropdown'),
                    array('class'=>'form-control','name'=>'paper_type')); ?>
      </div>
  </div>  
  <div class="row"><br>  
       <div  class="col-md-4 control-label" style="text-align: right">Pages(1 page = 300 words) </div>
       <div class="col-md-8">
       <input type="number" id="page_numbers" name="page_numbers"  value="1" class="form-control" placeholder="Number of Pages" required="true"/>
      </div>
  </div>
  <div class="row"><br>            
    <div  class="col-md-4 control-label" style="text-align: right"class="control-label ">Academic Level: </div>
       <div class="col-md-8">
   <?php $fn->dropdwonList($fn->find_academiclevels('dropdown'),
                array('class'=>'form-control','name'=>'academic_level','id'=>'academic_level')); ?>
        </div>
  </div>
  <div class="row"><br> 
    <div   class="col-md-4 control-label" style="text-align: right">Urgency Level </div>
    <div class="col-md-8">
  <?php $fn->dropdwonList($fn->find_urgencies('dropdown'),
                array('class'=>'form-control','name'=>'urgency_level','id'=>'urgency_level')); ?>
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
   Total Price:$ <b></b>
</div>
 </div>
 <div class="row"> <br>
   <div class="col-md-4"></div><div class="form-group col-md-8">                           
        <button type="submit" class="btn btn-primary btn-block " >Proceed to Payment</button> 
    </div>
</div>
 </fieldset>
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