<?php
/*
	File to read a single building that the user enters
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Building($db);


//call function to connect to database and run query
$post->Building_name = isset($_GET['Building_name']) ? $_GET['Building_name'] : die();
$post->read_single();

//format result in array for JSON file
$post_arr = array(
    'Building_name' => $post->Building_name,
    'Type' => $post->Type,
);


//make a json
print_r(json_encode($post_arr));

?>