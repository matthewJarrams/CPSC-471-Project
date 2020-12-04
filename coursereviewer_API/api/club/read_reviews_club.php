<?php
/*
	File to read all reviews for a searched club

*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Review($db);


//call function to get reviews for the entered club
$post->Club_name = isset($_GET['Club_name']) ? $_GET['Club_name'] : die();
$result = $post->read_reviews_club();

/*$post_arr = array(
    'Class_O_code' => $post->Class_O_code,
   
);*/
	//create array to store information
	$post_arr = array();
	
    $post_arr['data'] = array();
	
	//create two query connections to get average rating value and all information
	$result2 = $post->get_avergage_club();
	$row2 = $result2->fetch(PDO::FETCH_ASSOC);
	array_push($post_arr['data'], 'Average rating');
	array_push($post_arr['data'], $row2['AVG(Rating)']);
	
	//while more reviews to analyze
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array('Username' => $Username,'Club_name' => $Club_name, 'Cost' => $Cost, 'Academic' => $Academic, 'Leisure' => $Leisure, 'Description_review' => $Description_review, 'Rating' => $Rating, 'Date_made' => $Date_made);
        array_push($post_arr['data'], $post_item);
    }

    //convert to JSON and output
    //echo json_encode($post_arr);



//make a json
print_r(json_encode($post_arr));

?>