<?php
/*
	File to make a review on a club based on given info
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

//format variables into data
$post->Description_review = $data->Description_review;
$post->Rating = $data->Rating;
//$post->Date_made = $data->Date_made;
$post->Username = $data->Username;
$post->Club_Name = $data->Club_Name;
$post->Cost = $data->Cost;
$post->Academic = $data->Academic;
$post->Leisure = $data->Leisure;


//create post and give a message 
if($post->write_club_review()){
    echo json_encode(
        array('message' => 'Review submitted successfuly.')
    );

}else {
    echo json_encode(
        array('message' => 'review not made successfuly.')
    );
}


?>