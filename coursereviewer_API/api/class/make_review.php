<?php
/*
	File to submit a review for a class with entered information
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

//format variables with entered information
$post->Description_review = $data->Description_review;
$post->Rating = $data->Rating;
//$post->Date_made = $data->Date_made;
$post->Username = $data->Username;
$post->Class_code = $data->Class_code;
$post->Would_take_again = $data->Would_take_again;
$post->Required = $data->Required;
$post->Textbook = $data->Textbook;
$post->Work_load = $data->Work_load;
$post->Difficulty = $data->Difficulty;
$post->Semester = $data->Semester;
$post->Year = $data->Year;

//create post and get a success or reject message
if($post->write_class_review()){
    echo json_encode(
        array('message' => 'Review submitted successfuly.')
    );

}else {
    echo json_encode(
        array('message' => 'review not made successfuly.')
    );
}


?>	