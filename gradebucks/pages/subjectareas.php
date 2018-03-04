<?php 
    if(isset($id)){
     $actiontCaption = '<a href="index.php?r=pages/subjectareas&p=Subject Areas">Edit Subject Area id :'.$id.'</a>';   
     $model   = $fn->find_subjcet_area(null,"subjectid=$id")[0]; 
     $actiontValue   = 'UpdateSubjectArea';
     $actiontButton  = 'Update Subject Area';
    
    }
    else{
        $actiontCaption = 'New Subject Area';
        $actiontValue   = 'AddNewSubjectArea';
        $actiontButton  = 'Save Subject Area';
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
       <div class="control-label">Subject Name</div>
       <input type="text" name="subjectname" value="<?= $model['subjectname'] ?>" class="form-control" placeholder="Subjcet Name" required="true"/>
  </div>
  </div>
        <div class="row"><br> 
      <div class="form-group col-md-12">            
    <div class="control-label ">Subject Description</div>
    <textarea name="subjectdescription" class="form-control" placeholder="Subject Description" required="true"><?= $model['subjectdescription'] ?></textarea>
        </div>
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
    <h3 class="panel-title" style="font-size: 1.2em">List of Subject Areas</h3>
  </div>
  <div class="panel-body">
    <?php  $listdata = $fn->find_subjcet_area(); ?>
  <table class='table' style="font-size: 0.8em">
   <thead><tr><th>ID</th> <th style="width:120px">Subjcet Name</th> <th style="width:200px">Subjcet Description</th> <th>Created On</th><th>Created By</th><th>Action</th> </tr></thead>
   <tbody>
    <?php foreach ($listdata as $key => $trdata) {
       echo  "<tr class='active'>";       
       echo "<td>" . $trdata['subjectid'] . "</td>
       <td>" . $trdata['subjectname'] . "</td> 
       <td style='width:200px'>" . $trdata["subjectdescription"] . "</td>
       <td>".  $trdata['createdon'] . "</td>
       <td>" . $trdata['createdby'] . "</td>
       <td><a href='index.php?r=pages/subjectareas~id=" . $trdata['subjectid'] . "&p=Edit Subject Area : ".$trdata['subjectname']."'><button type='submit' class='btn btn-primary' id='btnpaywith_".$key."' style='font-size: 0.9em'>Edit Details</button> </a></td>";              
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