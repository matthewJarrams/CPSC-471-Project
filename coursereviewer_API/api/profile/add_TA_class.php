<?php
/*
	File to add a class that a TA has taught
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With ');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Profile($db);

//get raw posted data
$data = json_decode(file_get_contents("php://input"));

//set information entered to variables
$post->TA_ID = $data->TA_ID;
$post->Class_name = $data->Class_name;

//create post and write message
if($post->AddTAClass()){
    echo json_encode(
        array('message' => 'TA class added successfully.')
    );

}else {
    echo json_encode(
        array('message' => 'TA class not added successfully')
    );
}


?>