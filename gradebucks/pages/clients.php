<?php
if(isset($_SESSION['userdetails']['userid'])){

    $all_orders   = $fn->find_users("user_type='Client' ORDER BY `userid` DESC    LIMIT 0 , 1000"); 
     $model   = '';
     foreach ($all_orders as $key => $trdata){
        $model .= '<tr>';
        $model .="<td>".$trdata['clientid']."</td>";
        $model .="<td>".$trdata['lastname']."</td>";
        $model .="<td>".$trdata['firstname']." </td>";
        $model .="<td>".$trdata['emailaddress']."</td>";
        $model .="<td>".$trdata['phonenumber']." </td>";
        $model .="<td>".$trdata['gender']." </td> ";
        $model .="<td>".$trdata['user_type']." </td>";
        $model .="<td>".$trdata['username']."</td>";
        $model .="<td>".$trdata['groupName']."</td> ";
        $model .="<td>".$trdata['country']."</td>";
        $approved = $trdata['active'];
        switch($approved){
            case '0':case 0:
                $approved = 'InActive';
                break;            
            case '1':case 1:
                $approved = 'Active';
                break;  
            default:
                $approved;
                break;
        }
        $model .="<td><b>".$approved."</b></td>";
        $model .="<td><a href='index.php?r=pages/myorderdetails~id=" . $trdata['userid'] . "&p=Client's Details ".$trdata['userid']."'><button type='submit' class='btn btn-primary' id='btnpaywith_".$key."' style='font-size: 0.9em'>View Details</button></a> </td>";
        $model .="</tr>";          
      }
}
?>
<div class="box">
            <div class="box-header">
              <h5 class="box-title">All Clients</h5>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
 <th>Client ID</th>
 <th>Last Name</th>
 <th>First Name</th> 
 <th>Email Address</th> 
 <th>Phone Number</th> 
 <th>Gender</th> 
 <th>User Type</th> 
 <th>Username</th> 
  <th>User Group</th>
  <th>Country</th>
  <th>Status</th>
  <th>Action</th>
 </tr>
 </thead>
 <tbody>
<?= $model ?>
 </tbody>
 </table>  
</div>
            <!-- /.box-body -->
 </div>