<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
include_once('settings.php');
if(isset($_GET['view'])){
	$view = $_GET['view'];
}
else{
	$view = 'Aboutus';
}

if(isset($_SESSION['Authorized_token'])){
	$Authorized_Token = $_SESSION['Authorized_token'];
}else{
	$Authorized_Token = '';
}


include_once('Views/Articles/view.html.php');$viewObj = new ArticlesViewHTML(CLIENT_ID,CLIENT_MLS,CLIENT_THEME,PROD_SITE_URL,PROD_SITE_PATH);if($view=="Aboutus"){
		$result = $viewObj->Aboutus();	
}
	if($view=="Contactus"){
		
		if(isset($_POST['contactus'])){
			if($_POST['contactus'] == 'Contact Us'){
				$result = $viewObj->savecontactdata($_POST);
			}
			else{
				$result = $viewObj->bydefaultContactForm();
			}
		}
		
		else{
			$result = $viewObj->bydefaultContactForm();	
		}
	}
   if($view=="Homeworth"){
	   if(isset($_GET['action'])){
			if($_GET['action'] =='sendInquiry'){
				$result = $viewObj->sendHomeworthInquiry($_POST);
			}
		}
		else{
			$result = $viewObj->bydefaultHomeworth();	
		}
	}
	if($view=="Jointeam"){
	   if(isset($_GET['action'])){
			if($_GET['action'] =='sendInquiry'){
				$result = $viewObj->jointeamInquiry($_POST);
			}
		}
		else{
				$result = $viewObj->bydefaultjointeam($Authorized_Token);	
		}
	}
	
	if($view=="thankyou"){
		
	   if(isset($_GET['type'])){
			if($_GET['type'] == 'contactus'){
				$result = $viewObj->thankyou();
			}else if($_GET['type'] == 'joinourteam'){
				$result = $viewObj->thankyou();
			}
		}
		
	}
/*    echo "<pre>"; print_r($result); exit;  */









?>