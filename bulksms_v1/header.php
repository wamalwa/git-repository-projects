<!DOCTYPE HTML>

<html>
<head>
    <title><?php echo $page_title; ?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <script src="js/jquery-1.6.2.min.js"></script>
    <script src="js/jquery-ui-1.8.15.custom.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dropotron.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <script src="js/ui-control.js"></script>
		
    <link rel="stylesheet" href="css/bootstrap-theme.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-wide.css" />
    </noscript>
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
			
	</head>
	<body>
         <!-- Wrapper -->
<div class="wrapper style1">

<!-- Header -->
        <!-- Header -->
        <div id="header" class="skel-panels-fixed">
                <div id="logo">
        <h1><a href="<?php echo $currectPage; ?>">
         <img src="images/Binoculars.png" alt="logo" style="height:70px;width:90px" /></a></h1>
                 <span class="tag">BulkSMS</span>
                </div>
<?php session_start(); 
//check if user is logged in
$currectPage=  trim($currectPage);
if(!empty($_SESSION['username'])|| $currectPage=='index.php'|| $currectPage=='signup.php'){ ?>
<?php if($currectPage=='index.php') { ?>

    <nav id="nav">
            <ul>
                <li class="active"><a href="signup.php">Sign Up</a></li>
            </ul>
    </nav>
<?php }

elseif($currectPage=='signup.php') { ?>

<nav id="nav">
        <ul>
               <li class="active"><a href="index.php">Login</a></li>
        </ul>
</nav>
<?php }

else {     ?>
<nav id="nav">
        <ul>

                <?php if($currectPage=='home.php') { ?>
                <li class="active"><a href="home.php">Home</a></li>	
                <?php } else{ ?>
                <li><a href="home.php">Home</a></li>
                <?php } ?>

                <?php if($currectPage=='sendsms.php') { ?>
                <li class="active"><a href="sendsms.php">Send SMS</a></li>	
                <?php } else{ ?>
                <li><a href="sendsms.php">Send SMS</a></li>
                 <?php  } ?>

                <?php if($currectPage=='contacts.php') { ?>
                <li class="active"><a href="contacts.php">Contacts</a></li>	
                <?php } else{ ?>
                <li><a href="contacts.php">Contacts</a></li>
                <?php } ?>
                
                 <?php if($currectPage=='contactgroups.php') { ?>
                <li class="active"><a href="contactgroups.php">Contact Groups</a></li>	
                <?php } else{ ?>
                <li><a href="contactgroups.php">Contact Groups</a></li>
                <?php } ?>

                <?php if($currectPage=='account.php') { ?>
                <li class="active"><a href="account.php">Account</a></li>
                <?php } else{ ?>
                <li><a href="account.php">Account</a></li>
                <?php } ?>

                <?php if($currectPage=='users.php') { ?>
                <li class="active"><a href="users.php">Users</a></li>
                <?php } else{ ?>
                <li><a href="users.php">Users</a></li>
                <?php } ?>
                
                <?php if($currectPage=='systemadmin.php') { ?>
                <li class="active"><a href="systemadmin.php">System Admin</a></li>	
                <?php } else{ ?>
                <li><a href="systemadmin.php">System Admin</a></li>
                <?php } ?>

        <li>(<?php   echo $_SESSION['username']; ?>)<a href="index.php">Logout</a></li>
        </ul>
</nav>


<?php
}
    }
 else {
        session_abort();
        session_destroy();
    echo '<script type="text/javascript">           window.location = "index.php"      </script>'; 
     
 }
?>
					</div>
        
        <!-- Header -->