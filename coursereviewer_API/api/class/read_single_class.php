<?php
/*
	File to read a single class from the database 
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Course($db);


//call function to connect to database to run query 
$post->Code = isset($_GET['Code']) ? $_GET['Code'] : die();
$post->read_single();

//use array to store columns
$post_arr = array(
    'Code' => $post->Code,
    'Description' => $post->Description
);


//make a json
print_r(json_encode($post_arr));

?>