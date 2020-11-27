<?php
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post

$post = new Building($db);



$post->Building_name = isset($_GET['Building_name']) ? $_GET['Building_name'] : die();
$post->read_single();

$post_arr = array(
    'Building_name' => $post->Building_name,
    'Type' => $post->Type,
);


//make a json
print_r(json_encode($post_arr));

?>