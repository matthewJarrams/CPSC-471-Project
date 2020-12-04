<?php
/*
	File to read all building reviews for entered building
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Review($db);


//call function to connect to database and get all reviews 
$post->Building_name = isset($_GET['Building_name']) ? $_GET['Building_name'] : die();
$result = $post->read_reviews_building();

/*$post_arr = array(
    'Class_O_code' => $post->Class_O_code,
   
);*/
	
	//create array to store information
	$post_arr = array();
	
    $post_arr['data'] = array();
	
	//get average rating for building
	$result2 = $post->get_avergage_building();
	$row2 = $result2->fetch(PDO::FETCH_ASSOC);
	array_push($post_arr['data'], 'Average rating');
	array_push($post_arr['data'], $row2['AVG(Rating)']);

	
	//extract all rows retuned and add to array
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array('Username' => $Username,'Building_name' => $Building_name, 'Accessibility' => $Accessibility, 'Is_Crowded' => $Is_Crowded, 'Experience' => $Experience, 'Description_review' => $Description_review, 'Rating' => $Rating, 'Date_made' => $Date_made);
        array_push($post_arr['data'], $post_item);
    }

    //convert to JSON and output
    //echo json_encode($post_arr);



//make a json
print_r(json_encode($post_arr));

?>