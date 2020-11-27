<?php
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With ');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Department($db);

//get raw posted data
$data = json_decode(file_get_contents("php://input"));

$post->Department_code = $data->Department_code;
$post->First_name = $data->First_name;
$post->Last_name = $data->Last_name;



//create post
if($post->addProfessor()){
    echo json_encode(
        array('message' => 'Professor added.')
    );

}else {
    echo json_encode(
        array('message' => 'Professor not added.')
    );
}


?>