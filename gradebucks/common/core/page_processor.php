<?php 
require_once 'authorized_pages.php';
session_start();
if(isset($_GET['r']) && isset($_GET['p']) && !empty($_SESSION['username'])){

	$page 			= $_GET['r'];
	$title 			= 'Gradebucks Portal | '.$_GET['p'];
	$page_desc              = $_GET['p'];
	$url_details 	= explode('~', $page);

//                print_r($url_details);exit;
	if(count($url_details)>1){
		$url 		= $url_details[0].'.php';                
		$url_data = explode('/', $url_details[0]); 
               //check authenticated page access
                if($url_data[0]==='pages' && empty($_SESSION['username'])===true)  {
                 	$url 		= 'common/403.php';    
                }
                else if(check_authorized_pages($url_data[1])!==(1 || '1')){
                    $url 		= 'common/403.php';  
                }

		$getdata 	= explode('&', $url_details[1]);

		if(count($getdata)){
			foreach ($getdata as $value) {			
				$data   = explode('=', $value);
				$id     = $data[1];
			}
		}
		else{
		$data   = explode('=', $url_details[1]);
		$id     = $data[1];
		}
	}
	else{
		$url 	= $page.'.php';                
		$url_data = explode('/', $url_details[0]);                
               //check authenticated page access
                if($url_data[0]==='pages' && empty($_SESSION['username'])===true){
                 $url 		= 'common/403.php';    
                }
                else if(check_authorized_pages($url_data[1])!==(1 || '1')){
                    $url 		= 'common/403.php';  
                }
	}

	if(isset($page) && $page==='common/index'){
			session_unset();
			session_destroy();
			session_write_close();	
	}
} 
else if(isset($_GET['r']) && isset($_GET['p'])){

	$page 			= $_GET['r'];
	$title 			= 'Gradebucks | '.$_GET['p'];
	$page_desc              = $_GET['p'];
	$url_details 	= explode('~', $page);
	if(count($url_details)>1){	
		$url 		= $url_details[0].'.php';
                $url_data = explode('/', $url_details[0]); 
               //check authenticated page access
                if($url_data[0]==='pages' && empty($_SESSION['username'])===true)
                {
                 $url 		= 'common/403.php';    
                }
		$getdata 	= explode('&', $url_details[1]);

		if(count($getdata)){
			foreach ($getdata as $value) {			
				$data   = explode('=', $value);
				$id     = $data[1];
			}
		}
		else{
		$data   = explode('=', $url_details[1]);
		$id     = $data[1];
		}
	}
	else{
		$url 	= $page.'.php'; 
                $url_data = explode('/', $url_details[0]); 
               //check authenticated page access
                if($url_data[0]==='pages' && empty($_SESSION['username'])===true)
                {
                 $url 		= 'common/403.php';    
                }
	}
}
else{

	if(!empty($_SESSION['username'])){	
		session_unset();
		session_destroy();
		session_write_close();	
	}

	$url = 'common/index.php';
}


