<?php
  if(isset($id)){

     $model   =$fn->find_all_orders("order_no='$id' ORDER BY `orderid` ASc    LIMIT 0 , 1")[0]; 
   
    $_revision = $fn->find_revisions("id=".$id);
    $rmodel = $_revision[0];
    $attachments = $fn->find_order_attachments($model['order_no'],"AND uploadtype='Client Revision'"); 
    }
?>
<div class="panel panel-primary col-md-9 col-sm-12" style="padding:0px">
  <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.2em">Revision Details</h3>
  </div>
  <div class="panel-body">
  <form method="post" id="register_form" action="common/core/action.php" enctype="multipart/form-data">  
  <input type="hidden" name='actiontype' id="actiontype" value="SubmitMyRevision"> 
 <div class="body bg-gray">
  <div id="not"><?php $fn->setFlash();?></div>
 <div class="row"> 
      <div class="col-md-6 control-label">Order Number:
      <input type="text" name='order_no' value="<?= $model['order_no'] ?>" class="form-control" readonly="true"/>
      </div>
      <div class="col-md-6 control-label">Type of Service:
            <input type="text" value="<?= $model['servicename'] ?>" class="form-control" readonly="true"/>
      </div>    
  </div>
    <div class="row"><br> 
      <div class="col-md-6 control-label">Current Urgency Level:
      <input type="text" value="<?= $model['duration'] ?>" class="form-control" readonly="true"/> 
      </div> 
      <div class="col-md-6 control-label">Topic:
      <input type="text" value="<?= $model['topic'] ?>" class="form-control" readonly="true"/> 
      </div>
  </div>
 <div class="row"><br> 
    <div   class="col-md-6 control-label">New Urgency Level  
      <input type="text" value="<?= $rmodel['duration'] ?>" class="form-control" readonly="true"/> 
  </div>
</div>
  <div class="row"><br>
      <div class="col-md-12 control-label">Topic Description:
       <textarea class="form-control" readonly="true"><?= $model['topicdescription'] ?></textarea>
      </div> 
  </div>
   <div class="row"><br>            
    <div class="col-md-4 control-label" style="text-align: right">Revision Description</div> 
    <div class="col-md-8">
        <textarea name="revision_description"  class="form-control" ><?= $rmodel['revision_description'] ?></textarea>
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
 </div>
  </form>
  </div>
</div>
<?php require 'common/sidebar.php'; ?>