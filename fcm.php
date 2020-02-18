<?php

// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'KEY-HERE' );


$registrationIds = array( 'fF3EmAvd0wk:APA91bEBaWm-vAsIcuYHNPP8pG3z4M6BjZKcX-OYuyM-eugOBV4JT8v9D43b6dYrWF1ZYgQSHLABxKh9Q3e2sEhalL1zAe2lVnIbqW-daJKfID_IKLY2FabFyhCQ45pO3Knuh_FARsJS','eY3-sbuyno0:APA91bG2KxMGHf2CA3FiA9JBrhNLXchTCMYszrPeK4x4Tlz5gN1T9CqD6wg0E9uJ7O5t7TflUIFB1S_GmgoBJ8jTgSFnGzQlhb3KgxEmAcypHtrqyJHUM0vEp3k8V8hi4tx-ffm6voYy');

// prep the bundle
$msg = array
(
	'message' 	=> 'here is a message. message',
	'title'		=> 'This is a title. title',
	'subtitle'	=> 'This is a subtitle. subtitle',
	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'largeIcon'	=> 'large_icon',
	'smallIcon'	=> 'small_icon'
);

$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );

echo $result
?>
