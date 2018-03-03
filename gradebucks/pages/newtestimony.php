<div class="panel panel-primary col-md-9 col-sm-12" style="padding:0px">
  <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.2em">My Testimony</h3>
  </div>
  <div class="panel-body">
  <form method="post" id="register_form" action="common/core/action.php" enctype="multipart/form-data">  
  <input type="hidden" name='actiontype' id="actiontype" value="SubmitMyTestionial"> 
  <input type="hidden" name='order_no' id="order_no" value="<?= $id ?>">
 <div class="body bg-gray">
	<div id="not"><?php $fn->setFlash();?></div>  
   <div class="row"><br>            
    <div class="col-md-12">
        <textarea name="testimony_description"  class="form-control" required="true" placeholder="Type your Testimonial Here" ></textarea>
        </div>
  </div> 
 <div class="row"> <br>
   <div class="col-md-7"></div><div class="form-group col-md-5">                           
        <button type="submit" class="btn btn-primary btn-block" id="btnSubmitButton" >Submit Testimony</button> 
    </div>
</div>
 </div>
  </form>
  </div>
</div>
<?php require 'common/sidebar.php'; ?>

<script type="text/javascript">
 $(document).ready(function(){
    
        $('#btnSubmitButton').click(function(){
           return confirm('Please confirm submission of this Testimony?');
        }) ; 
}) ;
</script>