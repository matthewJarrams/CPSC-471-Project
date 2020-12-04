<?php
/*
	File to create a user account by formatting data and writing to the database
*/

//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With ');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new User($db);

//get raw posted data
$data = json_decode(file_get_contents("php://input"));

//$post->ID = $data->ID;
$post->First_name = $data->First_name;
$post->Last_name = $data->Last_name;
//$post->Date_made = $data->Date_made;
$post->Username = $data->Username;
$post->Password = $data->Password;
//$post->Super_flag = $data->Super_flag;
//$post->Permissions = $data->Permissions;
//$post->Client_flag = $data->Client_flag;
$post->email_address = $data->email_address;
$post->Role = $data->Role;
$post->University = $data->University;

//create post
if($post->create()){
    echo json_encode(
        array('message' => 'User created.')
    );

}else {
    echo json_encode(
        array('message' => 'User not created.')
    );
}


?>