<?php
function check_authorized_pages($page){
	//array of authorized pages only
	$admin_pages = array(
            'index',
            'admindashboard',
            'viewneworders',
            'services',
            'clients',
            'countries',
            'papertypes',
            'subjectareas',
            'orderdetails',
            'academiclevels',
            'testimonials',
            'urgencies',
            'newuser',
            'manageusers',
            'changepassword');
        
	$client_pages = array(
            'index',
            'completepayment',
            'myorders',
            'payment',
            'home',
            'myneworder',
            'myorderdetails',
            'myrevions',
            'newrevision',
            'revisiondetails',
            'newtestimony',
            'Statistics',
            'changepassword'
      );
      
        
      $user_type =  $_SESSION['userdetails']['user_type'];
     //admin only pages
	if($user_type==='Admin'){
		//check if the page is within the url and return 1, if not return 0
		return in_array($page, $admin_pages);
	}
	else if($user_type==='Client'){
		return in_array($page, $client_pages);
	}
}
