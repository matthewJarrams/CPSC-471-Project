<?php
/*
	File to read all clubs in the database 
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Club($db);



//call function to connect database
$result = $post->read();

//get the row count
$num = $result->rowCount();

//if results returns tuples create array and store columns into variables 
if($num > 0){
    $post_arr = array();
    $post_arr['data'] = array();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'Club_name' => $Club_name,
            'Club_description' =>$Club_description,
            'Club_location' => $Club_location,
			
        );
		//push tuple into array
        array_push($post_arr['data'], $post_item);
    }

    //convert to JSON and output
    echo json_encode($post_arr);

} else {

    echo json_encode(array('message' => 'No Clubs found.'));

}

?>