<?php
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post

$post = new Profile($db);



$post->StuClubID = isset($_GET['StuClubID']) ? $_GET['StuClubID'] : die();
$result = $post->read_ClubMembership();

/*$post_arr = array(
    'Class_O_code' => $post->Class_O_code,
   
);*/

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