<?php
 include_once ("./dbcom/config.php");
      include_once ("./dbcom/homeworkerjob_com.php");
      $obj = new HomeWorkerJobsDAO();
      $obj->CheckSeeion();
        
echo '<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="Description" content="Homeworkerjobs one of the top essay writing company, offering Academic essay writing,  Specialized essay, Best Custom Essay Writing Services and other writing services.">
        <meta name="Keywords" content="Home workers jobs,Order now, Project Proposal Writing, Business Proposal Writing, Best Custom Essay Writing Services, research paper writing services, Dissertation and Thesis writing, Term paper writing services, book review writing services">
        <title>Home Workers Jobs - '.$title.'</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <!--     Custom CSS -->
        <link href="css/homeworkerjobs.css" rel="stylesheet">
        <link rel="stylesheet" href="css/jqueryCalendar.css">

        <script src="js/jquery-1.6.2.min.js"></script>
        <script src="js/jquery-ui-1.8.15.custom.min.js"></script>  
        <script type="text/javascript" src="js/homeworkerjobs.js"></script>
        <script>
            jQuery(function() {
                jQuery( "#datepicker" ).datepicker();
            });
        </script>
    </head>

    <body>
        <?php
        include_once ("dbcom/config.php");
        include_once ("dbcom/homeworkerjob_com.php");
        $obj = new HomeWorkerJobsDAO();
        ?>
        <div class="brand">'.$title.'</div>
        <!-- Navigation -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav">
                        <li><img src="img/ic.jpg" style="width: 100px;height: 100px"></li>
                        <li '.$home.'> 
                            <a href="adminhome.php">View Orders</a>
                        </li>
                         <li '.$clients.'>
                            <a href="clients.php">View Clients</a>
                        </li>
                        <li '.$work.'>
                            <a href="work.php">Work Progress</a>
                        </li>
                      
                         <li>
                            <a href="#" id="userid">'.$obj->CheckSeeion().'</a>
                        </li>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>';

$home="";
$clients="";
$workprogress="";

?>