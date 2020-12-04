<?php
/*
	File to read all classes in the database
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Course($db);



//blog post query
$result = $post->read();

//get the row count
$num = $result->rowCount();

//if number of rows is greater than zero
if($num > 0){
	//create an array to store results 
    $post_arr = array();
    $post_arr['data'] = array();
	
	//while more rows store columns in rows
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'Code' => $Code,
			'Description' => $Description,
        );
        array_push($post_arr['data'], $post_item);
    }

    //convert to JSON and output
    echo json_encode($post_arr);

} else {

    echo json_encode(array('message' => 'No class found.'));

}

?>