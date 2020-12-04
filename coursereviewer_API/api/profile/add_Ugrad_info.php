<?php
/*
	File to add information if the user is an undergraduate, where they input the information required

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

//set information to the correct variables 
$post->S_id = $data->S_id;
$post->Dep_code = $data->Dep_code;
$post->UGHas_graduated = $data->UGHas_graduated;
$post->Year = $data->Year;
$post->Concentration = $data->Concentration;
$post->UGFaculty = $data->UGFaculty;

//create post and write a successful message
if($post->AddUGradInfo()){
    echo json_encode(
        array('message' => 'Undergraduate Student Account Info Created.')
    );

}else {
    echo json_encode(
        array('message' => 'Undergraduate Student Account Info not created.')
    );
}


?>