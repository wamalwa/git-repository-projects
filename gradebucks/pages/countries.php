<?php 
    if(isset($id)){
     $actiontCaption = '<a href="index.php?r=pages/countries&p=Countries">Edit Country id :'.$id.'</a>'; 
     $model   =  $fn->find_countries(null,"contryid=$id")[0];
     $actiontValue   = 'UpdateCountry';
     $actiontButton  = 'Update Country';
 
    }
    else{
        $actiontCaption =  'New Country';
        $actiontValue   = 'AddNewCountry';
        $actiontButton  = 'Save Country';
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
       <div class="control-label">Country Name</div>
       <input type="text" name="country_name" value="<?= $model['country_name'] ?>" class="form-control" placeholder="Country Name" required="true"/>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12"> 
       <div class="control-label">Currency Code</div>
       <input type="text" name="currencycode" value="<?= $model['currencycode'] ?>" class="form-control" placeholder="Country Code" required="true"/>
      </div>
  </div>  
  <div class="row">
      <div class="col-md-12"> 
       <div class="control-label">Currency Name</div>
       <input type="text" name="currencyname" value="<?= $model['currencyname'] ?>" class="form-control" placeholder="Country Name" required="true"/>
      </div>
  </div>
  <div class="row"><br> 
      <div class="form-group col-md-12">            
    <div class="control-label ">Country Description</div>
    <textarea name="country_description"  class="form-control" placeholder="Country Description" required="true"><?= $model['country_description'] ?></textarea>
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
        <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg" id="saveModule"><?= $actiontButton ?></button> 
    </div>
    </div>
    </form>
   </div>
</div>
<!--List all available services-->
<div class="panel panel-primary col-md-8 col-sm-12" style="padding:1px">
   <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.2em">List of Countries</h3>
  </div>
  <div class="panel-body">
    <?php  $services = $fn->find_countries(); ?>
  <table class='table' style="font-size: 0.8em">
   <thead><tr><th>ID</th> <th style="width:120px">Country Name</th> <th style="width:200px">Country Description</th> <th>Currency Code</th><th>Currency Name</th><th>Action</th> </tr></thead>
   <tbody>
    <?php foreach ($services as $key => $trdata) {
       echo  "<tr class='active'>";       
       echo "<td>" . $trdata['contryid'] . "</td>
       <td>" . $trdata['country_name'] . "</td> 
       <td style='width:200px'>" . $trdata["country_description"] . "</td>
       <td>".  $trdata["currencycode"] . "</td>
       <td>" . $trdata["currencyname"] . "</td> 
       <td><a href='index.php?r=pages/countries~id=" . $trdata['contryid'] . "&p=Edit Country : ".$trdata['country_name']."'><button type='submit' class='btn btn-primary' id='btnpaywith_"
               .$key."' style='font-size: 0.9em'>Edit Details</button></a> </td>";              
       echo  "</tr>";
    }   ?>
   </tbody>
 </table>


 </div> 
    
</div>