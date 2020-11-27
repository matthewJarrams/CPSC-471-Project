<?php
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

//$post->ID = $data->ID;
$post->Prof_T_id = $data->Prof_T_id;
$post->Class_T_code = $data->Class_T_code;
$post->Year = $data->Year;
$post->Semester = $data->Semester;



//create post
if($post->add_prof()){
    echo json_encode(
        array('message' => 'Professor added to class.')
    );

}else {
    echo json_encode(
        array('message' => 'Professor not added to class.')
    );
}


?>