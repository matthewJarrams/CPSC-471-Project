<?php
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post

$post = new Course($db);



$post->Code = isset($_GET['Code']) ? $_GET['Code'] : die();
$post->read_single();

$post_arr = array(
    'Code' => $post->Code,
    'Description' => $post->Description
);


//make a json
print_r(json_encode($post_arr));

?>