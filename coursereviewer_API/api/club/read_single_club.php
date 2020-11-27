<?php
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post

$post = new Club($db);



$post->Club_name = isset($_GET['Club_name']) ? $_GET['Club_name'] : die();
$post->read_single();

$post_arr = array(
    'CLub_name' => $post->Club_name,
    'Club_description' => $post->Club_description,
    'Club_location' => $post->Club_location
);


//make a json
print_r(json_encode($post_arr));

?>