<?php
/*
	Read all reviews from a given class 
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Review($db);


//call function to connect to database and get reviews 
$post->Code = isset($_GET['Code']) ? $_GET['Code'] : die();
$result = $post->read_reviews_class();


/*$post_arr = array(
    'Class_O_code' => $post->Class_O_code,
   
);*/
	
	//create an arary to store results
	$post_arr = array();
	
    $post_arr['data'] = array();
	
	//use two queries to get average rating and all reviews
	$result2 = $post->get_avergage();
	$row2 = $result2->fetch(PDO::FETCH_ASSOC);
	array_push($post_arr['data'], 'Average rating');
	array_push($post_arr['data'], $row2['AVG(Rating)']);

	//get all rows an extract each tuple
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array('Username' => $Username,'Code' => $Code, 'Would_take_again' => $Would_take_again, 'Required' => $Required, 'Textbook' => $Textbook, 'Work_load' => $Work_load, 'Difficulty' => $Difficulty, 'Semester' => $Semester, 'Year' => $Year, 'Description_review' => $Description_review, 'Rating' => $Rating, 'Date_made' => $Date_made);
        array_push($post_arr['data'], $post_item);
		
    }
	

    //convert to JSON and output
    //echo json_encode($post_arr);



//make a json
print_r(json_encode($post_arr));

?>