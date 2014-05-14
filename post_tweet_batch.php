<?php

//debug
//print('memulai...');
//debug

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

$connection = new tmhOAuth(array(
	'consumer_key' => $consumer_key,
	'consumer_secret' => $consumer_secret,
	'user_token' => $user_token,
	'user_secret' => $user_secret
	));

// receiving inputs from form at index.html
$temp = $_POST['pengikut'];
$urutanpertama = $_POST['urutanpertama'];

//debug
//print('temp: '.$temp.'\n urutanpertama: '.$urutanpertama.'\n');
//debug

// preparing array of screen_name-s
$pengikut = explode(",",$temp);
$maxpengikut = count($pengikut);

//debug
//print('pengikut: '.$pengikut.'\n maxpengikut: '.$maxpengikut);
//debug

// starting iteration for each $pengikut
for($i = 0; $i < $maxpengikut; $i++)
 {
$urutan = $i + $urutanpertama;  
$tweet_text = 'Hey '.$pengikut[$i].' assalamualaikum yaaa gimana kabarmu '.$urutan;
print $tweet_text.'<br>';
print "Posting...\n";
// Create an OAuth connection to the Twitter API
$connection = new tmhOAuth(array(
'consumer_key' => $consumer_key,
'consumer_secret' => $consumer_secret,
'user_token' => $user_token,
'user_secret' => $user_secret
));
$code = $connection->request('POST',
$connection->url('1.1/statuses/update'),
array('status' => $tweet_text));
print "Response code: " . $code. "\n".'<br>';
//uncomment to add delay between tweets
sleep(5);
//debug
//print('sebuah iterasi diselesaikan ');
//debug
 }

//debug
//print('bagian akhir');
//debug

?>
