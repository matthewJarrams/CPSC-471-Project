<?php
/*
	File to make a review on a building with entered information
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With ');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Review($db);

//get raw posted data
$data = json_decode(file_get_contents("php://input"));

//format inputted information  into variables
$post->Description_review = $data->Description_review;
$post->Rating = $data->Rating;
//$post->Date_made = $data->Date_made;
$post->Username = $data->Username;
$post->Building_name = $data->Building_name;
$post->Accessibility = $data->Accessibility;
$post->Is_Crowded = $data->Is_Crowded;
$post->Experience = $data->Experience;


//create post and give message 
if($post->write_building_review()){
    echo json_encode(
        array('message' => 'Review submitted successfuly.')
    );

}else {
    echo json_encode(
        array('message' => 'review not made successfuly.')
    );
}


?>