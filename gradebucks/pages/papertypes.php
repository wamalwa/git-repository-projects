 <?php 
    if(isset($id)){
     $actiontCaption = '<a href="index.php?r=pages/papertypes&p=Paper Types">Edit Paper Type id :'.$id.'</a>';              
     $model   = $fn->find_paper_types(null,"typeid=$id")[0]; 
     $actiontValue   = 'UpdatePaperType';
     $actiontButton  = 'Update Paper Type';
    }
    else{
        $actiontCaption =  'New Paper Type';
        $actiontValue   = 'AddNewPaperType';
        $actiontButton  = 'Save Paper Type';
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
       <div class="control-label">Type Name</div>
       <input type="text" name="typename" value="<?= $model['typename'] ?>" class="form-control" placeholder="Type Name" required="true"/>
  </div>
  </div>
  <div class="row"><br> 
      <div class="form-group col-md-12">            
    <div class="control-label ">Type Description</div>
    <textarea name="typedescription" id="typedescription" class="form-control" placeholder="Type Description" required="true"><?= $model['typedescription'] ?></textarea>
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
        <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg" id="saveModule"><?= $actiontButton ?></button> 
    </div>
    </div>
    </form>
   </div>
</div>
<!--List all available services-->
<div class="panel panel-primary col-md-8 col-sm-12" style="padding:1px">
   <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.2em">List of Paper Types</h3>
  </div>
  <div class="panel-body">
    <?php  $listdata = $fn->find_paper_types(); ?>
  <table class='table' style="font-size: 0.8em">
   <thead><tr><th>ID</th> <th style="width:120px">Type Name</th> <th style="width:200px">Type Description</th> <th>Created On</th><th>Created By</th><th>Action</th> </tr></thead>
   <tbody>
    <?php foreach ($listdata as $key => $trdata) {
       echo  "<tr class='active'>";       
       echo "<td>" . $trdata['typeid'] . "</td>
       <td>" . $trdata['typename'] . "</td> 
       <td style='width:200px'>" . $trdata['typedescription'] . "</td>
       <td>".  $trdata['createdon'] . "</td>
       <td>" . $trdata['createdby'] . "</td>
       <td><a href='index.php?r=pages/papertypes~id=" . $trdata['typeid'] . "&p=Edit Paper Type : ".$trdata['typename']."'><button type='submit' class='btn btn-primary' id='btnpaywith_".$key."' style='font-size: 0.9em'>Edit Details</button></a> </td>";              
       echo  "</tr>";
    }   ?>
   </tbody>
 </table>


 </div> 
    
</div>