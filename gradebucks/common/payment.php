<?php
  if(isset($id)){
    $model   = $fn->find_all_orders("order_no='$id' ORDER BY `orderid` ASc    LIMIT 0 , 1")[0]; 
    }
?>
 <div class="panel panel-primary col-md-9 col-sm-12" style="padding:0px">
  <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.2em">Complete Payment USD $<?= $model['total_price']  ?></h3>
  </div>
  <div class="panel-body">
 <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="_xclick" method="POST">  
  <input type="hidden" name='actiontype' id="actiontype" value="AddNewOrder"> 
  <input type="hidden" name='total_price' id="total_price" value="1445">
  <div class="body bg-gray">
      <div id="not"><?php $fn->setFlash(); ?></div>  
   <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="Gradebucks,inc.">
    <input type="hidden" name="item_name"  value="<?= $model['topic'] ?>">
    <input type="hidden" name="item_number" value="<?= $model['order_no'] ?>">
    <input type="hidden" name="amount"  value="<?= $model['total_price'] ?>">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="currency_code" value="USD">

    <input type="hidden" name="bn" value="PP-BuyNowBF">
    <input type="hidden" name="return" value="index.php?r=common/thankyou&p=Congratulations!!">
    <input type="hidden" name="cancel_return" value="index.php?r=common/home&p=Home!!">

<input type="hidden" name="notify_url" value="index.php?r=common/thankyou&p=Congratulations!!">
 
<div class="row col-md-12">
 <table class="table">
 <thead>
 <tr>
 <th>Order Number.</th>
 <th>Owner</th> 
 <th>Topic</th> 
 <th>Order Date</th>
  <th>Total Cost</th>
 </tr>
 </thead>
 <tbody>
 <tr class="active">
 <td><?= $model['order_no'] ?></td>
 <td><?= $model['username'] ?></td>
 <td><?= $model['topic'] ?></td>
 <td><?= $model['createdon'] ?></td> 
 <td>USD $<?= $model['total_price'] ?></td>
 </tr>
 </tbody></table>  
</div>
    <div class="row">  
      <div class="col-md-4"></div>
       <div class="form-group col-md-4">                                                               
           <!-- <button type="submit" class=""><img src="images/pp.jpg" style="width: 180px;height: 40px;"/></button>  -->
          <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1"> 
       </div>
 </div> 
  </div>
  </form> 

  </div>
 </div>
<?php require 'sidebar.php'; ?>
