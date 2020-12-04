<?php
/*
	File to retrieve  information on department professors (ones that teach in that department)
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post

$post = new Department($db);


//call function to connect to database
$post->Department_code = isset($_GET['Department_code']) ? $_GET['Department_code'] : die();
$result = $post->view_department_professors();

	//create an array to store information
	$post_arr = array();
    $post_arr['data'] = array();
	//while more rows left to extract add to array with column info for JSON file
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
		$post_item = array('First_name' => $First_name,
		'Last_name' => $Last_name,
		'Class_T_code' => $Class_T_code,
		'Semester' => $Semester,
		'Year' => $Year);
		array_push($post_arr['data'], $post_item);
	}



//make a json
print_r(json_encode($post_arr));

?>