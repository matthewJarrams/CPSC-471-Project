<?php
/*
	File to read all TA classes that a TA  has taught 

*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Profile($db);


//call function to get all ta classes 
$post->TA_ID = isset($_GET['TA_ID']) ? $_GET['TA_ID'] : die();
$result = $post->read_TAClass();
//create array for tuple storage
$post_arr = array();
$post_arr['data'] = array();
//while more rows exist to analyze
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $post_item = array('Class_name' => $Class_name);
        array_push($post_arr['data'], $post_item);
    }


//make a json
print_r(json_encode($post_arr));

?>