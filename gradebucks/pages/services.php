<?php 
    if(isset($id)){
     $actiontCaption = '<a href="index.php?r=pages/services&p=Services">Edit Service id :'.$id.'<span class="pull-right btn btn-success">New</span></a>';              
     $model   = $fn->find_all_services(null,"serviceid=$id")[0]; 
     $actiontValue   = 'UpdateService';
     $actiontButton  = 'Update Service';
   
    }
    else{
        $actiontCaption =  'New Service';
        $actiontValue   = 'AddNewService';
        $actiontButton  = 'Save Service';
    }
?>

<div class="panel panel-primary col-md-4 col-sm-12" style="padding:0px">
  <div class="panel-heading" style="padding-bottom: 20px;">
      <h3 class="panel-title" style="font-size: 1.2em"><?= $actiontCaption ?></h3>
  </div>
  <div class="panel-body">
  <form method="post" id="register_form" action="common/core/action.php">  
  <input type="hidden" name='actiontype' id="actiontype" value="<?= $actiontValue ?>">
  <input type="hidden" name='id' id="id" value="<?= $id ?>">
   <div class="body bg-gray">
	<div id="not"><?php $fn->setFlash();?></div>
  <div class="row">
      <div class="col-md-12"> 
       <div class="control-label">Service Name</div>
       <input type="text" name="servicename" value="<?= $model['servicename'] ?>" class="form-control" placeholder="Service Name" required="true"  />
  </div>
  </div>
        <div class="row"><br> 
      <div class="form-group col-md-12">            
    <div class="control-label ">Service Description</div>
    <textarea name="serviceDescription" class="form-control" placeholder="Service Description" required="true"><?= $model['serviceDescription'] ?></textarea>
        </div>
  </div>
    <div class="row">
      <div class="col-md-12"> 
          <div class="control-label"><i>Created On:<b> <?= $model['createdon'] ?></b></i></div>
      </div>
  </div>
    <div class="row">
      <div class="col-md-12"> 
       <div class="control-label"><i>Created By:<b> <?= $model['createdby'] ?></b></i></div>
      </div>
  </div>
    <div class="row">
      <div class="col-md-12"> 
       <div class="control-label"><i>Status:<b> <?= $model['active'] ?></b></i></div>
      </div>
  </div>
  </div> 
  <div class="row"> <br>
    <div class="form-group col-md-12">                           
        <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg" id="btnSubmitButton"><?= $actiontButton ?></button> 
    </div>
    </div>
    </form>
   </div>
</div>
<!--List all available services-->
<div class="panel panel-primary col-md-8 col-sm-12" style="padding:1px">
   <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.2em">List of Services</h3>
  </div>
  <div class="panel-body">
    <?php  $services = $fn->find_all_services(); ?>
  <table class='table' style="font-size: 0.8em">
   <thead><tr><th>ID</th> <th style="width:120px">Service Name</th> <th style="width:200px">Service Description</th> <th>Created On</th><th>Created By</th><th>Status</th><th>Action</th> </tr></thead>
   <tbody>
    <?php foreach ($services as $key => $trdata) {
       echo  "<tr class='active'>";       
       echo "<td>" . $trdata["serviceid"] . "</td>
       <td>" . $trdata["servicename"] . "</td> 
       <td style='width:200px'>" . $trdata['serviceDescription'] . "</td>
       <td>".  $trdata['createdon'] . "</td>
       <td>" . $trdata['createdby'] . "</td> 
       <td>" . $trdata['active'] . "</td>
       <td><a href='index.php?r=pages/services~id=" . $trdata['serviceid'] . "&p=Edit Service'><button type='submit' class='btn btn-primary' id='btnpaywith_".$key."' style='font-size: 0.9em';>Edit Details</button></a></td>";              
       echo  "</tr>";
    }   ?>
   </tbody>
 </table>


 </div> 
    
</div>
<script type="text/javascript">
 $(document).ready(function(){
    
        $('#btnSubmitButton').click(function(){
           return confirm('Please confirm this Submission?');
        }) ; 
}) ;
</script>