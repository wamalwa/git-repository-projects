<?php
if(isset($_SESSION['userdetails']['userid'])){

    $all_orders   = $fn->find_users("user_type<>'Client' ORDER BY `userid` DESC    LIMIT 0 , 1000"); 
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
                $approved = 'Not Active';
                break;            
            case '1':case 1:
                $approved = 'Active';
                break;  
            default:
                $approved;
                break;
        }
        $model .="<td><b>".$approved."</b></td>";

      switch($approved){

            case '0':case 0: case '1':case 1:
                 $model .="<td><a href='#'><button type='submit' class='btn btn-danger' id='btnpaywith_".$key."' style='font-size: 0.9em'>Block</button></a> </td>";
                break;            
            case '2':case 2:
                 $model .="<td><a href='#'><button type='submit' class='btn btn-success' id='btnpaywith_".$key."' style='font-size: 0.9em'>Unblock</button></a> </td>";
                break;  
            default: 
                break;
        }
           $model .="<td><a href='#'><button type='submit' class='btn btn-primary' id='btnpaywith_".$key."' style='font-size: 0.9em'>Reset Password</button></a> </td>";             
               
        $model .="</tr>";          
      }
}
?>
<div class="box">
            <div class="box-header">
              <h5 class="box-title">Back office System Users</h5>
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
 </tr>
 </thead>
 <tbody>
<?= $model ?>
 </tbody>
 </table>  
</div>
            <!-- /.box-body -->
 </div>