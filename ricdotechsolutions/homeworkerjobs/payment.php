<?php
$ordernow="class='active'";
$title="Complete Payment!!!";
include_once ('ui/myheader.php');
include_once ("dbcom/config.php");
include_once ("dbcom/homeworkerjob_com.php");
$obj = new HomeWorkerJobsDAO();
session_start();
             
?>

<div class="container">
  <div class="well panel-primary col-md-12 col-sm-12" style="padding:0px">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 1.5em">Final Step, Complete Payment!!!</h3>
            </div>
            <div class="panel-body">
                <div class="body bg-gray">
 <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="_xclick" method="POST">  
      <input type="hidden" name="cmd" value="_xclick">
                                            <input type="hidden" name="business" value="excelplustutors@gmail.com">
                                            <input type="hidden" name="item_name" 
                                                   value="<?php if(!empty($_SESSION["topic"])){echo $_SESSION["topic"];} ?>">
                                            <input type="hidden" name="item_number" 
                                                   value="<?php if(!empty($_SESSION["orderno"])){echo $_SESSION["orderno"];} ?>">
                                            <input type="hidden" name="amount" 
                                                   value="<?php if(!empty($_SESSION["totalcost"])){echo $_SESSION["totalcost"];} ?>">
                                            <input type="hidden" name="no_shipping" value="1">
                                            <input type="hidden" name="no_note" value="1">
                                            <input type="hidden" name="currency_code" value="USD">
                                           
                                            <input type="hidden" name="bn" value="PP-BuyNowBF">
                                            <input type="hidden" name="return" value="thankyou.php">
                                            <input type="hidden" name="cancel_return" value="orders.php">
                                           
                                            <input type="hidden" name="notify_url" value="ipn.php">
 <table class="table">
 <thead>
 <tr>
 <th>Order Number.</th>
 <th>Topic</th> 
 <th>Order Date</th>
  <th>Total Cost</th>
 </tr>
 </thead>
 <tbody>
 <tr class="active">
 <td><?php if(!empty($_SESSION["orderno"])){echo $_SESSION["orderno"];} ?></td>
 <td><?php if(!empty($_SESSION["topic"])){echo $_SESSION["topic"];} ?></td>
 <td><?php if(!empty($_SESSION["orderdate"])){echo $_SESSION["orderdate"];} ?></td> 
 <td>USD $<?php if(!empty($_SESSION["totalcost"])){echo $_SESSION["totalcost"];} ?></td>
 </tr>
 </tbody></table>     
    <div class="row">  <div class="col-md-5"></div>
       <div class="form-group col-md-4">                                                               
           <button type="submit" class="btn btn-primary btn-default btn-flat btn-lg" id="btnpaywith">Pay with <img src="img/pp.jpg" style="width: 100px;height: 35px;"/></button> 
       </div>
                </div>           
 </form>                   
            </div>
        </div>
</div>
</div>
<!--Footer-->
<?php include_once ('ui/footer.php'); ?>