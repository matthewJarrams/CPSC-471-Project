<?php
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post

$post = new Profile($db);



$post->Stu_id = isset($_GET['Stu_id']) ? $_GET['Stu_id'] : die();
$result = $post->read_ClassesTaken();

/*$post_arr = array(
    'Class_O_code' => $post->Class_O_code,
   
);*/

	$post_arr = array();
    $post_arr['data'] = array();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array('Class_code' => $Class_code);
        array_push($post_arr['data'], $post_item);
    }

    //convert to JSON and output
    //echo json_encode($post_arr);



//make a json
print_r(json_encode($post_arr));

?>