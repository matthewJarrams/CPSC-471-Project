<?php
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post

$post = new Department($db);



$post->Department_code = isset($_GET['Department_code']) ? $_GET['Department_code'] : die();
$post->view_department_professors();

$post_arr = array(
    'First_name' => $post->First_name,
    'Last_name' => $post->Last_name,
    'Class_T_code' => $post->Class_T_code,
    'Semester' => $post->Semester,
    'Year' => $post->Year
);


//make a json
print_r(json_encode($post_arr));

?>