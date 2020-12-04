<?php
/*
	File to read all classes that a student has taken and write them as a JSON file
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post

$post = new Profile($db);


//check of ID is set
$post->Stu_id = isset($_GET['Stu_id']) ? $_GET['Stu_id'] : die();
//call function to connect to DB 
$result = $post->read_ClassesTaken();

/*$post_arr = array(
    'Class_O_code' => $post->Class_O_code,
   
);*/
	
	//create array to hold returned tuples and columns 
	$post_arr = array();
    $post_arr['data'] = array();
	//while more rows to analyze
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