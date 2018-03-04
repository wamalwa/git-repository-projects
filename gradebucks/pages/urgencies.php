<?php 
    if(isset($id)){
     $actiontCaption = '<a href="index.php?r=pages/urgencies&p=Urgencies">Edit Urgency Level id :'.$id.'</a>'; 
     $model   = $fn->find_urgencies(null,"urgencyid=$id")[0]; 
     $actiontValue   = 'UpdateUrgencyLevel';
     $actiontButton  = 'Update Urgency Level';
     foreach ($all_urgencies as $key => $trdata){
         if(in_array($id, $trdata)){
           $model =  $trdata;
           break;
         }
     }
    }
    else{
        $actiontCaption = 'New Urgency Level';
        $actiontValue   = 'AddNewUrgencyLevel';
        $actiontButton  = 'Save Urgency';
    }
?> 
 <div class="panel panel-primary col-md-4 col-sm-12" style="padding:0px">
  <div class="panel-heading">
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
       <div class="control-label">Urgency Duration</div>
       <div class="col-md-4" style="padding: 1px;">
           <input type="number" name="urgency_value" value="<?= $model['urgency_value'] ?>" style="padding: 1px 6px;" class="form-control" placeholder="Urgency Value" required="true" min="1"/>
       </div>
       <div class="col-md-8" style="padding: 1px;">
      <select type="text" name="urgency_name" class="form-control" placeholder="Urgency Name" required="true"/>
      <option selected="selected" value="<?= !empty($model['urgency_name'])?$model['urgency_name']:'Please select Name' ?>"/><?= !empty($model['urgency_name'])?$model['urgency_name']:'Please select Name' ?></option> 
      <option value="Hours"/>Hours</option> 
      <option value="Days" />Days</option>
      <option value="Weeks"/>Weeks</option>
      <option value="Months"/>Months</option>
      <option value="Minutes"/>Minutes</option>
      <option value="Seconds"/>Seconds</option>
      </select>
       </div>
 </div>
  </div>
   <div class="row"><br> 
      <div class="form-group col-md-12">            
    <div class="control-label ">Urgency Description</div>
    <textarea name="desscription" id="desscription" class="form-control" placeholder="Level Description" required="true"><?= $model['desscription'] ?></textarea>
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
    <h3 class="panel-title" style="font-size: 1.2em">List of Urgency Levels</h3>
  </div>
  <div class="panel-body">
    <?php  $listdata = $fn->find_urgencies(); ?>
  <table class='table' style="font-size: 0.8em">
   <thead><tr><th>ID</th> <th style="width:120px">Urgency Duration</th> <th style="width:200px">Urgency Description</th> <th>Created On</th><th>Created By</th><th>Action</th> </tr></thead>
   <tbody>
    <?php foreach ($listdata as $key => $trdata) {
       echo  "<tr class='active'>";       
       echo "<td>" . $trdata['urgencyid'] . "</td>
       <td>" . $trdata['duration'] . "</td> 
       <td style='width:200px'>" . $trdata['desscription'] . "</td>
       <td>".  $trdata['createdon'] . "</td>
       <td>" . $trdata['createdby'] . "</td>
       <td><a href='index.php?r=pages/urgencies~id=" . $trdata['urgencyid'] . "&p=Edit Urgency Level : ".$trdata['duration']."'><button type='submit' class='btn btn-primary' id='btnpaywith_".$key."' style='font-size: 0.9em'>Edit Details</button> </a></td>";              
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