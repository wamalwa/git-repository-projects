<?php 
    if(isset($id)){
     $actiontCaption = '<a href="index.php?r=pages/academiclevels&p=Academic Levels">Edit Academic Level id :'.$id.'<span class="pull-right btn btn-success">New</span></a>';              
     $model   = $fn->find_academiclevels(null,"levelid=$id")[0]; 
     $actiontValue   = 'UpdateAcademicLevel';
     $actiontButton  = 'Update Academic Level';
    }
    else{
        $actiontCaption = 'New Academic Level';
        $actiontValue   = 'AddNewAcademicLevel';
        $actiontButton  = 'Save Academic Level';
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
       <div class="control-label">Level Name</div>
       <input type="text" name="levelname" value="<?= $model['levelname'] ?>" class="form-control" placeholder="Level Name" required="true"/>
  </div>
  </div>
     <div class="row"><br> 
      <div class="form-group col-md-12">            
    <div class="control-label ">Level Description</div>
    <textarea name="levelDescription" id="levelDescription" class="form-control" placeholder="Level Description" required="true"><?= $model['levelDescription'] ?></textarea>
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
    <h3 class="panel-title" style="font-size: 1.2em">List of Academic Levels</h3>
  </div>
  <div class="panel-body">
    <?php  $listdata = $fn->find_academiclevels(); ?>
  <table class='table' style="font-size: 0.8em">
   <thead><tr><th>ID</th> <th style="width:120px">Academic Level</th> <th style="width:200px">Level Description</th> <th>Created On</th><th>Created By</th><th>Action</th> </tr></thead>
   <tbody>
    <?php foreach ($listdata as $key => $trdata) {
       echo  "<tr class='active'>";       
       echo "<td>" . $trdata['levelid'] . "</td>
       <td>" . $trdata['levelname'] . "</td> 
       <td style='width:200px'>" . $trdata['levelDescription'] . "</td>
       <td>".  $trdata['createdon'] . "</td>
       <td>" . $trdata['createdby'] . "</td>
       <td><a href='index.php?r=pages/academiclevels~id=" . $trdata['levelid'] . "&p=Edit Academic Level'><button type='submit' class='btn btn-primary' id='btnpaywith_".$key."' style='font-size: 0.9em'>Edit Details</button></a> </td>";              
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