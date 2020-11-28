<?php
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post

$post = new Profile($db);



$post->TA_ID = isset($_GET['TA_ID']) ? $_GET['TA_ID'] : die();
$post->read_TAClass();

$post_arr = array(
    'Class_name' => $post->Class_name
);


//make a json
print_r(json_encode($post_arr));

?>