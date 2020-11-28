<?php
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


$post->Stu_ID = $data->Stu_ID;
$post->MinD_code = $data->MinD_code;

//create post
if($post->addMinor()){
    echo json_encode(
        array('message' => 'Minor added successfully.')
    );

}else {
    echo json_encode(
        array('message' => 'Minor not added successfully')
    );
}


?>