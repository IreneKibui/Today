<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Provide your email details:recipients(if they are many separate each with a comma),subject,body and from
$Recipients="user@domain.com";
$Subject="Fantastic Simple Email By SAP";
$Body="Your message body goes here";
$From="sender@domain.com";

//pass the above details to an array
$maildata=array(
	'recipients' =>$Recipients,
	'subject'=>$Subject,
	'body'=>$Body,
	'from'=>$From );

//convert our array to a json string
$encodemaildata=json_encode($maildata);

//thats it,hit send and we hopefully believe your email will be sent.
try {
	$result=$gateway->SAPMail($encodemaildata);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}