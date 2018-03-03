<?php
if(isset($_SESSION['userdetails']['userid'])){
    $user_id = $_SESSION['userdetails']['userid'];
    $all_orders   = $fn->find_all_orders("approved=0 and A.createdby='".$user_id."' ORDER BY `orderid` DESC    LIMIT 0 , 10"); 
     $model   = '';
     foreach ($all_orders as $key => $trdata){
        $model .= '<tr>';
        $model .="<td>".$trdata['createdon']."</td>";
        $model .="<td>".$trdata['order_no']." </td>";
        $model .="<td>".$trdata['topic']."</td>";
        $model .="<td>".$trdata['servicename']." </td>";
        $model .="<td>".$trdata['subjectname']." </td> ";
        $model .="<td>".$trdata['levelname']." </td>";
        $model .="<td>".$trdata['duration']."</td>";
        $model .="<td>".$trdata['pagesorwords']."</td> ";
        $model .="<td>".$trdata['total_price']."</td>";
        $model .="<td><a href='index.php?r=common/payment~id=" . $trdata['order_no'] . "&p=Almost there,Final Step! ".$trdata['order_no']."'><button type='submit' class='btn btn-primary' id='btnpaywith_".$key."' style='font-size: 0.9em'>Pay Now</button></a> </td>";
        $model .="</tr>";          
      }
}
?>
<div class="row col-md-12">
<caption>My Pending Orders</caption>
 <table class="table">
 <thead>
 <tr>
 <th>Order Date</th>
 <th>Order Number.</th>
 <th>Topic</th> 
 <th>Service Name</th> 
 <th>Subject Area</th> 
 <th>Academic Level</th> 
 <th>Duration</th> 
 <th>Number of Pages</th> 
  <th>Total Cost USD $</th>
  <th>Action</th>
 </tr>
 </thead>
 <tbody>
<?= $model ?>
 </tbody>
 </table>  
</div>