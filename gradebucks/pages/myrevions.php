<?php
if(isset($_SESSION['userdetails']['userid'])){
    $user_id = $_SESSION['userdetails']['userid'];
    $all_orders   = $fn->find_revisions("A.createdby='".$user_id."' ORDER BY A.ID DESC    LIMIT 0 , 1000"); 
     $model   = '';
     foreach ($all_orders as $key => $trdata){
        $model .= '<tr>';
        $model .="<td>".$trdata['createdon']."</td>";
        $model .="<td>".$trdata['order_no']." </td>";
        $model .="<td>".$trdata['duration']."</td>";
        $model .="<td>".$trdata['revision_description']." </td>";
        $model .="<td>".$trdata['username']." </td> ";     
        $approved = $trdata['approved'];
        switch($approved){
            case '0':case 0:
                $approved = 'Pending Payment';
                break;            
            case '1':case 1:
                $approved = 'Ongoing';
                break;                       
            case '2':case 2:
                $approved = 'Completed';
                break;                      
            case '3':case 3:
                $approved = 'Under Revision';
                break;                     
            case '5':case 5:
                $approved = 'Pending Client Response';
                break;                    
            case '6':case 6:
                $approved = 'Declined';
                break;                   
            case '7':case 7:
                $approved = 'Partial Payment';
                break;
            default:
                $approved;
                break;
        }
        $model .="<td><b>".$approved."</b></td>";
        $model .="<td><a href='index.php?r=pages/revisiondetails~id=" . $trdata['ID'] . "&p=My Revision Details for ".$trdata['order_no']."'><button type='submit' class='btn btn-primary' id='btnpaywith_".$key."' style='font-size: 0.9em'>View Details</button></a> </td>";
        $model .="</tr>";          
      }
}
?>
<div class="box">
            <div class="box-header">
              <h5 class="box-title">My Orders</h5>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
 <th>Revision Date</th>
 <th>Order Number.</th>
 <th>Duration</th> 
 <th>Description</th> 
 <th>Username</th> 
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