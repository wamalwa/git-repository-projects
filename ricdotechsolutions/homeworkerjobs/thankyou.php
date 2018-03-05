<?php
$ordernow="class='active'";
$title="Success-Thank you!";
include_once ('ui/myheader.php');
include_once ("dbcom/config.php");
include_once ("dbcom/homeworkerjob_com.php");
$obj = new HomeWorkerJobsDAO();
session_start();
             
?>

<div class="container">
 <?php echo $obj->updateStatus(2, $_SESSION["orderno"], $_SESSION["UserID"])?>   
 
</div>

<!--Footer-->
<?php include_once ('ui/footer.php'); ?>