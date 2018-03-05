<!--Master Page display-->
<?php 
$home="class='active'";
$title="Welcome-My Orders";
include_once ('ui/myheader.php'); 
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
		<?php echo $obj->getOrdersfromDB($_SESSION["UserID"]); ?>	
</div>	

<!--End -->
            </div>
                <div class="row">  <div class="col-md-7"></div>
                    <div class="form-group col-md-5 col-md-offset-1"> 
                        <a class="btn btn-primary btn-default btn-flat btn-lg" href="ordernow.php" role="button">New Order</a>
                    </div>
                </div>
        </div>  
</div>
</div>

<!--Footer-->
<?php include_once ('ui/footer.php'); ?>
