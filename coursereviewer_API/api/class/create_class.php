<?php
/*
	File to add a class to a database with given information
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With ');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Course($db);

//get raw posted data
$data = json_decode(file_get_contents("php://input"));

//variables to hold information entered 
//$post->ID = $data->ID;
$post->Code = $data->Code;
$post->Description = $data->Description;



//create post and give message 
if($post->create()){
    echo json_encode(
        array('message' => 'Class created.')
    );

}else {
    echo json_encode(
        array('message' => 'Class not created.')
    );
}


?>