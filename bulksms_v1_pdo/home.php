<?php
$page_title="Bulk SMS  | Dashboard";
$head="Dashboard";
$currectPage='home.php';
include_once 'serverside/config.php';  
include_once 'header.php';
?>
	<!-- Page -->
<div id="page" class="container">
<div class="row">
<!-- Sidebar -->
<div id="sidebar" class="3u">
	<section>
		<header class="major">
			<h2>Contacts Summary</h2>
		</header>
		<div class="row half">
				<ul class="default">
					<li><a href="#"> <h4>2,000 Contacts </h4></a></li>					
				</ul>
		</div>
	</section>
	<section>
		<header class="major">
			<h2>Account Summary</h2>
		</header>
		<ul class="default">
			<li><a href="#"><h4>Account Balance Ksh.100</h4></a></li>
			
		</ul>
	</section>
     <section>
        <header class="major">
            <h2>Available Users</h2>
        </header>
        <ul class="default">
            <li><a href="#">   <h4>2,000 Users </h4></a></li> 
            </ul>
    </section>
</div>
<!-- Content -->
<div id="content" class="9u skel-cell-important">
	<section>
		<header class="major">
			<h2> Dashboard <small>Statistics Overview</small></h2>
		</header><div class="col-lg-4 col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26</div>
                                        <div> Sent!</div>
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
                                        <div class="huge">12</div>
                                        <div> Delivered!</div>
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
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">124</div>
                                        <div>Failed!</div>
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
		</section>
            <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
</div>			
	</div>
	</div>
<!-- /Page -->				

	<?php  include_once 'footer.php'; ?>