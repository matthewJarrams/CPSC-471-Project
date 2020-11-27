<?php
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post

$post = new Department($db);



$post->OffDepCode = isset($_GET['OffDepCode']) ? $_GET['OffDepCode'] : die();
$result = $post->view_department_classes();

/*$post_arr = array(
    'Class_O_code' => $post->Class_O_code,
   
);*/

	$post_arr = array();
    $post_arr['data'] = array();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array('Class_O_code' => $Class_O_code);
        array_push($post_arr['data'], $post_item);
    }

    //convert to JSON and output
    //echo json_encode($post_arr);



//make a json
print_r(json_encode($post_arr));

?>