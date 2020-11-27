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

$post->OffDepCode = $data->OffDepCode;
$post->Class_O_code = $data->Class_O_code;


//create post
if($post->addOfferedClass()){
    echo json_encode(
        array('message' => 'Class added.')
    );

}else {
    echo json_encode(
        array('message' => 'Class not added.')
    );
}


?>