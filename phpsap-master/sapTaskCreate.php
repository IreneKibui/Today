<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Set your task details below

//You need name your tasks for future identification.(Required)
$taskname="task name";

$url="http://domain.com/task";//The target url that SAP will trigger at defined TimeSlice(This url contains your application logic that you want to execute)

 //The array for the content you want to HTTP POST to your URL when your task has been triggered(Optional)
$postData = array();
$postData['type']='mypostdata';


$TimeSlice="2";//integer begins from 1 

$Time="minute";//choose minute or hour or day or month or year

$Retries="3";// How many times should re try if your server failed(or it was down)? default value: 3

$Count="1";//How many cycles should be repeated? should be an integer or -1 for infinite times


//Pass authentication credentials and your task creation data to array
$TaskCreateData=array(
	'taskname' => $taskname,
	'postData' => $postData,
	'TimeSlice'=>$TimeSlice,
	'Time'=>$Time,
	'Retries'=>$Retries,
	'Count'=>$Count,
	'url'=>$url,
	'username'=>$username,
	'apiKey'=>$apiKey
);

//convert our array to json string.
$TaskCreateDataEncoded=json_encode($TaskCreateData);

//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessTaskCreate($TaskCreateDataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}
