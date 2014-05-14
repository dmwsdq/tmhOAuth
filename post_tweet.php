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


// Load the app's keys into memory
require 'app_tokens.php';
// Load the tmhOAuth library
require 'tmhOAuth.php';
// Create an OAuth connection to the Twitter API
$connection = new tmhOAuth(array(
'consumer_key' => $consumer_key,
'consumer_secret' => $consumer_secret,
'user_token' => $user_token,
'user_secret' => $user_secret
));

// receiving inputs from form at index.html
$teks_biasa = $_POST['teks_biasa'];

// Send a tweet
$code = $connection->request('POST',
$connection->url('1.1/statuses/update'),
array('status' => $teks_biasa));
// A response code of 200 is a success
if ($code == 200) {
echo "Tweet sent";
} else {
echo "Error: $code";
}
?>
