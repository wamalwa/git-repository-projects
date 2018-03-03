<?php 
     $today = date('Y-m-d');
     $orders_today  = $fn->find_count('tborders',"cast(createdon as date)='".$today."'"); 
     $completed_orders_today = $fn->find_count('tborders',"CAST(createdon as date)='".$today."' AND approved=2"); 
     $revisions_today = $fn->find_count('tbmyrevisions',"CAST(createdon as date)='".$today."'");
     $clients_today =  $fn->find_count('tbusers',"CAST(createdon as date)='".$today."' AND user_type='Client'");
     $testimonials_today = $fn->find_count('tbtestimonials',"CAST(createdon as date)='".$today."'");
//
////toatals
     $completed_orders = $fn->find_count('tborders',"approved=2"); 
     $orders  = $fn->find_count('tborders'); 
     $revisions =  $fn->find_count('tbmyrevisions');
     $clients = $fn->find_count('tbusers',"user_type='Client'");
     $testimonials =$fn->find_count('tbtestimonials');
     $users = $fn->find_count('tbusers',"user_type='Admin'");
     
?> 
<div class="sidebar one_quarter first">   
<div class="panel-primary col-md-12 col-sm-12" style="margin-top:0px; padding:0px">
<div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1em;text-align: center"><i class="fa fa-list"></i>   Today's Summary</h3>
</div>
      <nav class="sdb_holder">
        <ul>
          <li><a href="index.php?r=pages/vieworders&p=View New Orders"> <?= $orders_today ?> New Orders </a></li>            
          <li><a href="index.php?r=pages/completedorders&p=Completed Orders"><?= $completed_orders_today ?> Completed Orders </a></li>          
          <li><a href="index.php?r=pages/newrevisions&p=New Revisions"> <?= $revisions_today ?>  New Revisions </a></li>          
          <li><a href="index.php?r=pages/home&p=Dashboard"> <?= $clients_today ?>  New Clients </a></li>
          <li><a href="index.php?r=pages/testimonials&p=Client's Testimonials"><?= $testimonials_today ?>  Testimonials </a></li>
        </ul>
      </nav>
</div>
<div class="panel-primary col-md-12 col-sm-12" style="margin-top:0px; padding:0px"><br>
<div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1em;text-align: center"><i class="fa fa-users"></i>  Users</h3>
</div>
        <nav class="sdb_holder">
        <ul>
            <li><a href="#"> <?= $users ?> Admin Users</a> </li>
            <li><a href="#"> 0 Writer Users</a> </li>
        </ul>
      </nav>
</div>
</div>

<div class="content three_quarter"> 
<div class="panel-primary col-md-12 col-sm-12" style="margin-top:-20px; padding:0px"><br>
<div class="panel-heading">
   <h2 class="panel-title"><i class="fa fa-dashboard"></i>    Dashboard <small>Statistics Overview </small></h2>
</div>
<br>
<div class="col-lg-4 col-md-4">
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-folder fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="huge"><?= $orders ?></div>
                <div>Orders</div>
            </div>
        </div>
    </div>
    <a href="index.php?r=pages/viewneworders&p=View New Orders">
        <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </div>
    </a>
</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-users fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="huge"><?= $clients ?></div>
                <div>Clients</div>
            </div>
        </div>
    </div>
    <a href="index.php?r=pages/clients&p=View Clients">
        <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </div>
    </a>
</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-folder-open fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="huge"><?= $revisions ?></div>
                <div>Revisions</div>
            </div>
        </div>
    </div>
    <a href="#">
        <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </div>
    </a>
</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-comments fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="huge"><?= $testimonials ?></div>
                <div>Testimonials</div>
            </div>
        </div>
    </div>
    <a href="index.php?r=pages/testimonials&p=Client's Testimonials">
        <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </div>
    </a>
</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-folder fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="huge"><?= $completed_orders ?></div>
                <div>Completed Orders</div>
            </div>
        </div>
    </div>
    <a href="#">
        <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </div>
    </a>
</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-folder fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="huge"><?= $users ?></div>
                <div>System Users</div>
            </div>
        </div>
    </div>
    <a href="index.php?r=pages/manageusers&p=Manage Users">
        <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </div>
    </a>
</div>
</div>

</div>
</div>