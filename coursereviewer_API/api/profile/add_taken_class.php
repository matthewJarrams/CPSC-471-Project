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


$post->Stu_id = $data->Stu_id;
$post->Class_code = $data->Class_code;

//create post
if($post->addTakenClass()){
    echo json_encode(
        array('message' => 'Taken class added successfully.')
    );

}else {
    echo json_encode(
        array('message' => 'Taken class not added successfully')
    );
}


?>