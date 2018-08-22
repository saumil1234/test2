<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
include_once('settings.php');


include_once('Views/Agent/view.html.php');
$viewObj = new AgentlistingViewHTML(CLIENT_ID,CLIENT_MLS,CLIENT_THEME,PROD_SITE_URL,PROD_SITE_PATH);
// $result = $viewObj->byDefault();



if(isset($_GET['view'])){
	$View =  $_GET['view'];
}
else{
	$View = 'AgentList';
}



if($View == 'AgentDetail'){
	$Id = $_GET['id'];
	$result = $viewObj->Agentdetail($Id);
}
else if($View == 'AgentList'){
	$result = $viewObj->byDefault();
}




?>