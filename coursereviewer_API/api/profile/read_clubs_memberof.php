<?php
/*
	File to retrieve all of the clubs that a student is a member of 
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Profile($db);


//call function to connect to database
$post->StuClubID = isset($_GET['StuClubID']) ? $_GET['StuClubID'] : die();
$result = $post->read_ClubMembership();

/*$post_arr = array(
    'Class_O_code' => $post->Class_O_code,
   
);*/
	//create array to hold tuple and column info 
	$post_arr = array();
    $post_arr['data'] = array();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array('Club_name' => $Club_name);
        array_push($post_arr['data'], $post_item);
    }

    //convert to JSON and output
    //echo json_encode($post_arr);



//make a json
print_r(json_encode($post_arr));

?>