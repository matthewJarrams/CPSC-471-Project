<?php
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post

$post = new Review($db);



$post->Code = isset($_GET['Code']) ? $_GET['Code'] : die();
$result = $post->read_reviews_class();


/*$post_arr = array(
    'Class_O_code' => $post->Class_O_code,
   
);*/

	$post_arr = array();
	
    $post_arr['data'] = array();
	
	$result2 = $post->get_avergage();
	$row2 = $result2->fetch(PDO::FETCH_ASSOC);
	array_push($post_arr['data'], 'Average rating');
	array_push($post_arr['data'], $row2['AVG(Rating)']);

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