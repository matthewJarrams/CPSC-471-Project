<?php
/*
	File to create a building and add it to the database
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With ');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Building($db);

//get raw posted data
$data = json_decode(file_get_contents("php://input"));

//format variables with entered information
//$post->ID = $data->ID;
$post->Building_name = $data->Building_name;
$post->Type = $data->Type;



//create post with message
if($post->create()){
    echo json_encode(
        array('message' => 'Building created.')
    );

}else {
    echo json_encode(
        array('message' => 'Building not created.')
    );
}


?>