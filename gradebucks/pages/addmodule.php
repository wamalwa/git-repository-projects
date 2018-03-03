<div class="col-md-2"></div>
 <div class="panel panel-primary col-md-6 col-sm-12" style="padding:0px">
  <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.2em">New Module!</h3>
  </div>
  <div class="panel-body">
  <form method="post" id="register_form" action="common/core/action.php">  
  <input type="hidden" name='actiontype' id="actiontype" value="AddNewModule">
   <div class="body bg-gray">
	<div id="not"><?php $fn->setFlash();?></div>
  <div class="row">
      <div class="col-md-12"> 
       <div class="control-label">Module Name</div>
       <input type="text" name="roleName" id="roleName" class="form-control" placeholder="Module Name" required="true"/>
  </div>
  </div>
        <div class="row"><br> 
      <div class="form-group col-md-12">            
    <div class="control-label ">Module Description</div>
    <textarea name="roleDescription" id="roleDescription" class="form-control" placeholder="Module Description" required="true"></textarea>
        </div>
  </div>
  </div> 
  <div class="row"> <br>
    <div class="form-group col-md-12">                           
        <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg" id="saveModule">Save Module</button> 
    </div>
    </div>
   </div>
</form>