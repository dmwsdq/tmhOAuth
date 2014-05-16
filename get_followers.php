<?php

/**
This code uses Matt Harris' OAuth library to make the connection
The library lives at: https://github.com/themattharris/tmhOAuth      
Source: http://140dev.com/twitter-api-programming-tutorials/hello-twitter-oauth-php/
@author Adam Green <140dev@gmail.com>
@license GNU Public License

****************************************
* modified by Darmawan Sidiq / @dmwsdq *
* visit: http://dar.web.id 	       *
****************************************

*/

require 'app_tokens.php';
require 'tmhOAuth.php';
$connection = new tmhOAuth(array(
'consumer_key' => $consumer_key,
'consumer_secret' => $consumer_secret,
'user_token' => $user_token,
'user_secret' => $user_secret
));

// receiving inputs from form at index.html
$akun = $_POST['akun'];


// Get @$akun's followers
$connection->request('GET', $connection->url('1.1/followers/list'),
array('screen_name' => $akun, 'include_user_entities' => 'false', 'skip_status' => 'true'));

// Get the HTTP response code for the API request
$response_code = $connection->response['code'];

// Convert the JSON response into an array
$response_data = json_decode($connection->response['response'],true);

// A response code of 200 is a success
if ($response_code <> 200) {
print "Error: $response_code\n";
}

// darmawan: storing list of screen_name in variable $snames
foreach ($response_data[users] as $i){
	$snames[] = $i[screen_name];
}

// Display the response array
foreach ($snames as $i){
	print("@".$i.",");
}
?>
