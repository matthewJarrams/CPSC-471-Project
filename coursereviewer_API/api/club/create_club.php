<?php
/*
	File to add a club to the database
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With ');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Club($db);

//get raw posted data
$data = json_decode(file_get_contents("php://input"));

//$post->ID = $data->ID;
//variables to get data
$post->Club_name = $data->Club_name;
$post->Club_description = $data->Club_description;
$post->Club_location = $data->Club_location;



//create post and give message
if($post->create()){
    echo json_encode(
        array('message' => 'Club created.')
    );

}else {
    echo json_encode(
        array('message' => 'Club not created.')
    );
}


?>