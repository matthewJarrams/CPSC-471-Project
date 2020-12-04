<?php
/*
	File to read all of the departments in the database and print them out
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Department($db);



//blog post query
$result = $post->read();

//get the row count
$num = $result->rowCount();

//if more than one row create an array and store all tuple column information and store them in the array for the JSON file
if($num > 0){
    $post_arr = array();
    $post_arr['data'] = array();while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'D_Code' => $D_Code,
            'D_Description' =>$D_Description,
            'D_Name' => $D_Name
        );
        array_push($post_arr['data'], $post_item);
    }

    //convert to JSON and output
    echo json_encode($post_arr);

} else {

    echo json_encode(array('message' => 'No departments found.'));

}

?>