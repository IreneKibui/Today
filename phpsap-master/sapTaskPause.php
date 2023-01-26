<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Provide your task ID that you want to pause.This should be on an existing task.
$TaskID="9";

//Pass authentication credentials and your task pause data to array
$TaskPauseData=array(
	'TaskID'=>$TaskID,
	'username'=>$username,
	'apiKey'=>$apiKey
);

//convert our array to json string.
$TaskPauseDataEncoded=json_encode($TaskPauseData);

//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessTaskPause($TaskPauseDataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}
