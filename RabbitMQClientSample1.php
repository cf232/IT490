<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
if(isset($argv[1])){
	$msg = $argv[1];
}
else{
	$msg = array("username"=>"admin", "password"=>"password", "type"=>"login");
}
echo  "Client sending request: <pre>" . var_export($msg, true) . "</pre>\n<br>";
$response = $client->send_request($msg);

echo "client received response: " . PHP_EOL;

echo "<pre>".var_export($response, true) ."</pre";//pre for browser
echo "\n\n";

if(isset($argv[0]))
echo $argv[0] . " END".PHP_EOL;
