

<div class="box">
    
    <!-- /.box-header -->
<div class="box-body">
<div class="col-md-3 col-sm-4"> 
  <div class="well panel-primary col-md-12 col-sm-12" style="margin-top:0px; padding:0px">
  <div class="panel-heading">
      <h3 class="panel-title" style="font-size: 1.5em;text-align: center">Order Now!</h3>
  </div>
  <div class="panel-body">
      <form method="post" id="order_form" action="index.php?r=common/neworder&p=New Order">
      <input type="hidden" name='actiontype' id="newOrder" value="AddNewOrderStepOne"> 
      <input type="hidden" name='total_price' name='total_price' id="total_price_value">
          <div class="body bg-gray" id="new_order_form">
          <span>Type of Service:
              <?php $fn->dropdwonList($fn->find_all_services('dropdown'),
                    array('style'=>'width: 180px;','name'=>'type_service'));
              ?>
          </span>
          <span>Type of Paper:
              <?php   $fn->dropdwonList($fn->find_paper_types('dropdown'),
                      array('style'=>'width: 180px;','name'=>'paper_type')); ?>
          </span>
          <span>Pages (1 page = 300 words):<input type="number" style="width: 180px;" required="true" value="1" id="page_numbers" name="page_numbers"></span>
          <span>Academic Level:<?php $fn->dropdwonList($fn->find_academiclevels('dropdown'),
                  array('style'=>'width: 180px;','name'=>'academic_level','id'=>'academic_level')); ?>
          </span>     
          <span>Urgency:<?php $fn->dropdwonList($fn->find_urgencies('dropdown'),
                  array('style'=>'width: 180px;','name'=>'urgency_level','id'=>'urgency_level')); ?>
          </span>
              
          <hr>
          <div id ="price_perpage" class="col-md-12" style="font-size: 1.2em;background-color: navy;color: gold;">
              
          </div>
          <div id="total_price" class="col-md-12" style="font-size: 1.7em;background-color: navy;color: gold;">
          
          </div>
          </div> 
          <div class="col-md-12">         
          <hr>      
              <button type="submit" class="btn btn-primary" id="continue">Proceed to Order</button> 
          </div>
      </form>
  </div>
  </div>
</div>

<div class="col-md-9 col-sm-8"> 
  <div id="comments">
    <?php
    $all_testimonials   = $fn->find_testimonials(); 
     $model   = ' <ul>';

     foreach ($all_testimonials as $key => $trdata){ 
    $model.='<li>
            <article>
              <header>
                <figure class="avatar"><img src="images/avatar.png" alt=""></figure>
                <address>
                By <a href="#">'.$trdata['createdby'].'</a>
                </address>
                <time datetime="'.$trdata['createdon'].'">'.$fn->format_datetime($trdata['createdon']).'</time>
              </header>
              <div class="comcont">
                <p>" '.$trdata['testimony'].'"</p>              
                </div>
            </article>
          </li>';


      }
      $model.='</ul>';
      echo $model;
?>

</div>

</div>
  <!-- /.box-body -->
 </div>
 
<script>
//events

$(document).ready(function(){
    
        $('#page_numbers').blur(function(){
            calculatePrice();
        }) ; 
        
         $('#page_numbers').ready(function(){
            calculatePrice();
        }) ;
        
         $('#urgency_level').change(function(){
          calculatePrice();
        }) ;
         
         $('#academic_level').change(function(){
          calculatePrice();
        });
}) ;




function calculatePrice(){
   var urgency_level = $('#urgency_level option:selected').text();
   var academic_level = $('#academic_level').val();
   var page_numbers =   $('#page_numbers').val();
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
          $('#price_perpage').html('Price per page: $'+page_price.toFixed(2)+'');
          //total price
          var total_price = page_numbers*page_price;
          $('#total_price').html('Total: <b>$'+total_price.toFixed(2)+'</b>');
          $('#total_price_value').val(total_price.toFixed(2));
 
}
</script>



