<?php
/*
	File to read a single profile given a user ID
*/
//headers
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

//initializing our api
include_once('../../core/initialize.php');

//instantiate post
$post = new Profile($db);


//call function to get student information
$post->ID = isset($_GET['ID']) ? $_GET['ID'] : die();
$post->read_single();
//test variable to see if undergrad or graduate
$check = $post->Year;

//if undergrad (they have a year)
if($check != null)
{
	$post_arr = array('ID' => $post->ID,'First_name' => $post->First_name,'Last_name' => $post->Last_name,'Date_made' => $post->Date_made,'Username' => $post->Username, 'email_address' => $post->email_address, 'University' => $post->University,	'Dep_code' => $post->Dep_code,	'Has_graduated' => $post->UGHas_graduated,	'Year' => $post->Year,	'Concentration' => $post->Concentration,	'Faculty' => $post->UGFaculty, 'MinD_code' => $post->MinD_code);
}
//else student is a graduate
else
{
	$post_arr = array('ID' => $post->ID,'First_name' => $post->First_name,'Last_name' => $post->Last_name,'Date_made' => $post->Date_made,'Username' => $post->Username, 'email_address' => $post->email_address, 'University' => $post->University,	'Dep_code' => $post->GDep_code,	'Has_graduated' => $post->GHas_graduated,	'Research_interest' => $post->Research_interest,	'Faculty' => $post->GFaculty, 'MinD_code' => $post->MinD_code);

}


//make a json
print_r(json_encode($post_arr));

?>