<?php
session_start();
include "db_conn.php";



if (isset($_SESSION['ID']) && isset($_SESSION['Username'])) {



?>

<!DOCTYPE html>
<html>
<head>
	<title>Search results</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
	$query = $_GET['query']; 
	// gets value sent over search form
	
	//$min_length = 3;
	// you can set minimum length of the query if you want
	
	//if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		
		//$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to &gt;
		
		//$query = mysql_real_escape_string($query);
		// makes sure nobody uses SQL injection
		
		$sql = "SELECT * FROM class WHERE '$query' = Code";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		// There does exist users in the database
		if ($resultCheck > 0) {
			
			$sql2 = "SELECT * FROM `class`, `class_review`, `review` WHERE '$query' = class.Code AND class.Code = class_review.Class_code AND class_review.Class_review_id = review.Review_id";
			$result2 = mysqli_query($conn, $sql2);
			$resultCheck3 = mysqli_num_rows($result2);
				 // Print Header
			echo  'Class Code' . "  | " . 'Would take again' . "  |  " . 'Required' . "  |  " .
					  'Textbook' . "  |  " . 'Work load' . "  |  " . 'Difficulty' . "  |  " .
					  'Semester' . "  |  " . 'Year' ."<br>";

			// Print out each entry in given course code
			while($row = mysqli_fetch_assoc($result2)) {
				echo  $row['Class_code'] . "  |  " . $row['Would_take_again'] . "  |  " . $row['Required'] . "  |  " .
					  $row['Textbook'] . "  |  " . $row['Work_load'] . "  |  " . $row['Difficulty'] . "  |  " .
					  $row['Semester'] . "  |  " . $row['Year'] ."<br>";
				
			}
            
        }
			
		
			
		
		else{ // if there is no matching rows do following
			echo "No results";
		}
		
	}
	else{ // if query length is less than minimum
		echo "Minimum length is ".$min_length;
	}
	
?>
</body>
</html>
