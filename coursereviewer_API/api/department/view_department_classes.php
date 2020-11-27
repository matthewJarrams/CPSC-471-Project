<?php
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post

$post = new Department($db);



$post->OffDepCode = isset($_GET['OffDepCode']) ? $_GET['OffDepCode'] : die();
$post->view_department_classes();

$post_arr = array(
    'Class_O_code' => $post->Class_O_code,
   
);


//make a json
print_r(json_encode($post_arr));

?>