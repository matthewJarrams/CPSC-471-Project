<?php

/*
	File to read a single user from the database with a given ID that then returns information on the user
*/

//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post

$post = new User($db);


//check if ID is set
$post->ID = isset($_GET['ID']) ? $_GET['ID'] : die();
//call function in user class
$post->read_single();

//format array with returned column data
$post_arr = array(
    'ID' => $post->ID,
    'First_name' => $post->First_name,
    'Last_name' => $post->Last_name,
    'Date_made' => $post->Date_made,
    'Username' => $post->Username,
    'email_address' => $post->email_address,
    'Role' => $post->Role,
    'University' => $post->University
);


//make a json
print_r(json_encode($post_arr));

?>