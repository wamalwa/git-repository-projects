<?php
$home="class='active'";
$title="Welcome to Admin Panel";
include_once ('ui/adminheader.php');
session_start();

include_once ("dbcom/config.php");
include_once ("dbcom/homeworkerjob_com.php");
$obj = new HomeWorkerJobsDAO();
?>
<div class="container">
       <div class="panel panel-primary col-md-12 col-sm-12" style="padding:0px">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 1.5em">My Orders(<?php if (!empty($_SESSION["orders"])) {  echo $_SESSION["orders"];}?>)</h3>
            </div>
            <div class="panel-body">
                <div class="body bg-gray">
<!-- Load all orders here-->

<div id="ordersdiv">
		<?php echo $obj->viewAllOrders(); ?>	
</div>	

<!--End -->
            </div>
               
        </div>  
</div>  
</div>
<!--Footer-->
<?php include_once ('ui/footer.php'); ?>