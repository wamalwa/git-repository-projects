<!--Master Page display-->
<?php 


$orderno=$_GET['orderno'];
$title=$orderno."-Order Details";
$home="class='active'";
include_once ('ui/adminheader.php');

include_once ("dbcom/config.php");
include_once ("dbcom/homeworkerjob_com.php");
$obj = new HomeWorkerJobsDAO();

?>

<div class="container">
    
      <div class="well panel-primary col-md-12 col-sm-12" style="padding:0px">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 1.5em">Order Details</h3>
            </div>
            <div class="panel-body">
                <div class="body bg-gray">
      <?php echo $obj->getOrdersDetailsfromDB($orderno); ?> 
           </div>
        </div>  
</div>
    
    
    
   <div class="well panel-primary col-md-12 col-sm-12" style="padding:0px">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 1.5em">Attachments(<?php if (!empty($_SESSION["files"])) {  echo $_SESSION["files"];}?>)</h3>
            </div>
            <div class="panel-body">
                <div class="body bg-gray">
                                    
    <!-- Display all the attachments-->
    
    <?php echo  $obj->showUploadedFiles($orderno); ?>
    
    <!-- end it here-->

            </div>
        </div>  
</div>

</div>
<!--Footer-->
<?php include_once ('ui/footer.php'); ?>
