<?php
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../core/initialize.php');

//instantiate post

$post = new User($db);



$post->ID = isset($_GET['ID']) ? $_GET['ID'] : die();
$post->read_single();

$post_arr = array(
    'ID' => $post->ID,
    'First_name' => $post->First_name,
    'Last_name' => $post->Last_name,
    'Date_made' => $post->Date_made,
    'Username' => $post->Username,
    'email_address' => $post->email_address,
    'Role' => $post->Role,
    'Univeristy' => $post->Univeristy
);


//make a json
print_r(json_encode($post_arr));

?>