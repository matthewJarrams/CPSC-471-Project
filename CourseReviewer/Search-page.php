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
<TABLE  BORDER="5">
   <TR>
      <TH COLSPAN="12">
         <H3><BR>Reviews</H3>
      </TH>
   </TR>
	  <TH>Username</TH>
      <TH>Class Code</TH>
      <TH>Would_take_again</TH>
	  <TH>Required</TH>
	  <TH>Textbook</TH>
	  <TH>Work Load</TH>
	  <TH>Difficulty</TH>
	  <TH>Semester</TH>
	  <TH>Year</TH>
	  <TH>Review</TH>
	  <TH>Rating</TH>
	  <TH>Date Made</TH>
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
			
			$sql2 = "SELECT * FROM `user`, `makes_review`, `class`, `class_review`, `review` WHERE '$query' = class.Code AND class.Code = class_review.Class_code AND class_review.Class_review_id = review.Review_id AND makes_review.Review_M_id = review.Review_id AND user.ID = makes_review.Stu_R_id";
			$result2 = mysqli_query($conn, $sql2);
			$resultCheck3 = mysqli_num_rows($result2);
		
			// Print out each entry in given course code
			while($row = mysqli_fetch_assoc($result2)) {
				echo "<tables>";
				echo "<TR>";
				echo "<TD>" .$row['Username']. "</TD>";
				echo "<TD>".$row['Code']. "</TD>";
				echo "<TD>".$row['Would_take_again']."</TD>";
				echo "<TD>".$row['Required']."</TD>";
				echo "<TD>".$row['Textbook']."</TD>";
				echo "<TD>".$row['Work_load']."</TD>";
				echo "<TD>".$row['Difficulty']."</TD>";
				echo "<TD>".$row['Semester']."</TD>";
				echo "<TD>".$row['Year']."</TD>";
				echo "<TD>".$row['Description_review']."</TD>";
				echo "<TD>".$row['Rating']."</TD>";
				echo "<TD>".$row['Date_made']."</TD>";
				echo"</TR>";
				
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
