<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Provide your task ID that you want to resume.This should be on an existing task.
$TaskID="9";

//Pass authentication credentials and your task resume data to array
$TaskResumeData=array(
	'TaskID'=>$TaskID,
	'username'=>$username,
	'apiKey'=>$apiKey
);

//convert our array to json string.
$TaskResumeDataEncoded=json_encode($TaskResumeData);

//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessTaskResume($TaskResumeDataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}
