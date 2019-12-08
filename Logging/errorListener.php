<?php
//php has a build in error logger, this file makes use of it
//show errors
ini_set('display_errors', 1);
//log errors
ini_set('log_errors', 1);
//log errors to file
ini_set('error_log', directory (file). '/log.txt');
error_reporting(E_ALL);
//error_log = "/tmp/php-error.log"
?>
