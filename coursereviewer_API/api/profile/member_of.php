<?php
/*

	File to link a club to a student as they are a member of this club

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

//format information with the correct variable
$post->StuClubID = $data->StuClubID;
$post->Club_name = $data->Club_name;

//create post and write message
if($post->MemberOf()){
    echo json_encode(
        array('message' => 'Club membership added successfully.')
    );

}else {
    echo json_encode(
        array('message' => 'Club membership not added successfully')
    );
}


?>