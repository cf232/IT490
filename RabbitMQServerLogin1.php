<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include('config.php');
session_start();

function login($user,$pass){
	//TODO validate user credentials
	$sql = "SELECT id FROM login WHERE username = '$user' AND password = '$pass'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active = $row['active'];
	$count = mysqli_num_rows($result);
	  
	if($count == 1) {
	   session_register("myusername");
	   $_SESSION['login_user'] = $user;
	   return $row["id"];
	}else {
	   $error = "Your Login Name or Password is invalid";
	}
	return true;
}

function doEcho($req){
	$req['message'] = "Echo " . $req['message'];
	return $req;
}
function request_processor($req){
	echo "Received Request".PHP_EOL;
	echo "Request[" . $req . "]\n<br>"; 
	echo "<pre>" . var_export($req, true) . "</pre>";
	if(!isset($req['type'])){
		return __FILE__ . ".Error: unsupported message type";
	}
	//Handle message type
	$type = $req['type'];
	switch($type){
		case "login":
			return login($req['username'], $req['password']);
		case "validate_session":
			return validate($req['session_id']);
		case "echo":
			return doEcho($req);
	}
	return array("return_code" => '0',
		"message" => "Server received request and processed it");
}

$server = new rabbitMQServer("testRabbitMQ.ini", "sampleServer");

echo "Rabbit MQ Server Start" . PHP_EOL;
$server->process_requests('request_processor');
echo "Rabbit MQ Server Stop" . PHP_EOL;
exit();
?>
