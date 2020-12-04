<?php
/*
	File to retrieve all buildings in the database
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Building($db);



//blog post query
$result = $post->read();

//get the row count
$num = $result->rowCount();

//if more than one row returned
if($num > 0){
	//create an array and store tuple columns into the array
    $post_arr = array();
    $post_arr['data'] = array();while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'Building_name' => $Building_name,
            'Type' =>$Type,
			
        );
		//push array values to make JSON
        array_push($post_arr['data'], $post_item);
    }

    //convert to JSON and output
    echo json_encode($post_arr);

} else {

    echo json_encode(array('message' => 'No Building found.'));

}

?>