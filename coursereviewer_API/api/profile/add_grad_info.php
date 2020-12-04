<?php
/*	
	File to add information if the student is a graduate student
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

//set entered information into variables
$post->SG_id = $data->SG_id;
$post->GDep_code = $data->GDep_code;
$post->GFaculty = $data->GFaculty;
$post->GHas_graduated = $data->GHas_graduated;
$post->Research_interest = $data->Research_interest;

//create post and give message
if($post->AddGradInfo()){
    echo json_encode(
        array('message' => 'Graduate Student Account Info Created.')
    );

}else {
    echo json_encode(
        array('message' => 'Graduate Student Account Info not created.')
    );
}


?>