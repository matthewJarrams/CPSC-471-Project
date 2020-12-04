<?php
/*
	File to read a single department the user entered
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Department($db);


//check for inputted information and call function to connect to database
$post->D_Code = isset($_GET['D_Code']) ? $_GET['D_Code'] : die();
$post->read_single();

//format array
$post_arr = array(
    'D_Code' => $post->D_Code,
    'D_Description' => $post->D_Description,
    'D_Name' => $post->D_Name
);


//make a json
print_r(json_encode($post_arr));

?>