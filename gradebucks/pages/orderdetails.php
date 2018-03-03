<?php
  if(isset($id)){
     $model   = $fn->find_all_orders("order_no='$id' ORDER BY `orderid` ASc    LIMIT 0 , 1")[0]; 
     $attachments = $fn->find_order_attachments($model['order_no']); 
    }
?>
<div class="panel panel-primary col-md-9 col-sm-12" style="padding:0px">
  <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.2em">My Order Details - <?php
     $approved = $model['approved'];
        switch($approved){
            case '0':case 0:
                $approved = 'Pending Payment';
                break;            
            case '1':case 1:
                $approved = 'Ongoing';
                break;                       
            case '2':case 2:
                $approved = 'Completed';
                break;                      
            case '3':case 3:
                $approved = 'Under Revision';
                break;                     
            case '5':case 5:
                $approved = 'Pending Client Response';
                break;                    
            case '6':case 6:
                $approved = 'Declined';
                break;                   
            case '7':case 7:
                $approved = 'Partial Payment';
                break;
            default:
                $approved;
                break;
        }
      echo "<b>".$approved."</b>" ;
        ?></h3>
  </div>
  <div class="panel-body">
  <form method="post" id="register_form" action="common/core/action.php" enctype="multipart/form-data">  
  <input type="hidden" name='actiontype' id="actiontype" value="MarkasComplete"> 
  <input type="hidden" name='total_price' id="total_price" value="">
  <input type="hidden" id="languagestyle_value" value="0">
 <div class="body bg-gray">
	<div id="not"><?php $fn->setFlash();?></div>
  
        <hr>
  <div class="row"> 
      <div class="col-md-6 control-label">Order Number:
      <input type="text" value="<?= $model['order_no'] ?>" class="form-control" readonly="true"/>
      </div>
      <div class="col-md-6 control-label">Type of Service:
            <input type="text" value="<?= $model['servicename'] ?>" class="form-control" readonly="true"/>
      </div>    
  </div>
  <div class="row"> <br>  
      <div class="col-md-6 control-label">Subject Area:
      <input type="text" value="<?= $model['subjectname'] ?>" class="form-control" readonly="true"/> 
      </div>
      <div class="col-md-6 control-label">Type of Paper: 
      <input type="text" value="<?= $model['typename'] ?>" class="form-control" readonly="true"/></div>
  </div> 
  <div class="row"> <br>  
      <div class="col-md-6 control-label">Pages(1 page = 300 words):
      <input type="text" value="<?= $model['pagesorwords'] ?>" class="form-control" readonly="true"/> 
      </div> 
      <div class="col-md-6 control-label">Academic Level:
      <input type="text" value="<?= $model['levelname'] ?>" class="form-control" readonly="true"/> 
      </div>
  </div> 
  <div class="row"><br> 
      <div class="col-md-6 control-label">Urgency Level:
      <input type="text" value="<?= $model['duration'] ?>" class="form-control" readonly="true"/> 
      </div> 
      <div class="col-md-6 control-label">Topic:
      <input type="text" value="<?= $model['topic'] ?>" class="form-control" readonly="true"/> 
      </div>
  </div>
  <div class="row"><br>
      <div class="col-md-12 control-label">Topic Description:
       <textarea class="form-control" readonly="true"><?= $model['topicdescription'] ?></textarea>
      </div> 
  </div>
   <div class="row"><br>        
      <div class="col-md-6 control-label">Spacing:
      <input type="text" value="<?= $model['spacing'] ?>" class="form-control" readonly="true"/> 
      </div>
      <div class="col-md-6 control-label">Paper Format:
      <input type="text" value="<?= $model['writing_format'] ?>" class="form-control" readonly="true"/> 
      </div>
  </div>
 <div class="row"><br>
    <div class="col-md-6 control-label">Preferred Language style:
      <input type="text" value="<?= $model['languagestyle'] ?>" class="form-control" readonly="true"/> 
      </div>
 </div>
<div class="row"><br>  
    
    <div class="col-md-12 control-label">Order Instructions:
       <textarea class="form-control" readonly="true"><?= $model['order_instructions'] ?></textarea>
      </div>
 </div>
 
  <div class="row"><br> 
       <div class="col-md-12 control-label">Additional Materials:
       </div> 
      <?php foreach ($attachments as $key => $trdata) { $fname = explode('/', $trdata['filepath']);    ?>
     <div class="col-md-1"></div><div class="col-md-11 control-label">
         <a href="common/<?= $trdata['filepath'] ?>"><button type='button' class='btn btn-primary'> <?= ($key+1).'. ' ?><?= $fname[1] ?></button></a>
      </div>
    <?php
    }   ?>
  </div>       
<div class="row"><br>        
 <div id="total_price_div" class="col-md-12" style="text-align: center;font-size: 1.7em;background-color: navy;color: gold;"> 
   Total Price:$ <b><?= $model['total_price'] ?></b>
</div>
</div>
        <br>
        <hr>
     
        
</div>
</form>
  </div>
</div>
<?php require 'common/sidebar.php'; ?>