<?php
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With ');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new User($db);

//get raw posted data
$data = json_decode(file_get_contents("php://input"));

$post->ID = $data->ID;

//delete user
if($post->delete()){
    echo json_encode(
        array('message' => 'User deleted.')
    );

}else {
    echo json_encode(
        array('message' => 'User not deleted.')
    );
}


?>