<?php
$ordernow="class='active'";
$title="Success-Thank you";
include_once ('ui/myheader.php');
include_once ("dbcom/config.php");
include_once ("dbcom/homeworkerjob_com.php");
$obj = new HomeWorkerJobsDAO();
session_start();
             
?>

<div class="container">
    <p>Thank you for placing an order with us</p>
</div>

<!--Footer-->
<?php include_once ('ui/footer.php'); ?>