<?php
require_once "config.inc.php";
require_once "restclient.class.php";

## =================== / =======================================
## Parameters  
## =================== / =======================================
$cobrandLogin    =   ( isset($_POST["login"])   )  ? $_POST["login"]    : "";
$cobrandPassword =   ( isset($_POST["password"]) ) ? $_POST["password"] : "";
$response        =   array();

$config = array(			 
	"url_cobrand_login"  => Yodlee\ConfigInc\serviceBaseUrl.Yodlee\ConfigInc\URL_COBRAND_SESSION_TOKEN,
	"cobrand_login"      => array(
		"cobrandLogin"   => $cobrandLogin,
		"cobrandPassword"=> $cobrandPassword
	));

$response_to_request   = Yodlee\restClient::Post($config["url_cobrand_login"], $config["cobrand_login"]);

$response = array(
	"isValid"      => true,
	"Body"         => $response_to_request["Body"]
);
header('Content-type: application/json');
echo json_encode($response);
?>