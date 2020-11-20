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
      <TH COLSPAN="8">
         <H3><BR>Reviews</H3>
      </TH>
   </TR>
      <TH>Building Name</TH>
      <TH>Type</TH>
	  <TH>Accessibility</TH>
	  <TH>Is_Crowded</TH>
	  <TH>Expierience</TH>
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
		
		$sql = "SELECT * FROM Building WHERE '$query' = Building_name";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		// There does exist users in the database
		if ($resultCheck > 0) {
			
			$sql5 = "SELECT * FROM `building`, `experience`, `building_review`, `review` WHERE '$query' = building.Building_name AND building.Building_name = building_review.Building_name AND building_review.Building_Review_id = review.Review_id AND review.Review_id = experience.E_review_id AND experience.E_Building_name = building.Building_name";
			$result5 = mysqli_query($conn, $sql5);
			$resultCheck4 = mysqli_num_rows($result5);

			// Print out each entry in given course code
			while($row = mysqli_fetch_assoc($result5)) {
				echo "<tables>";
				echo "<TR>";
				echo "<TD>".$row['Building_name']. "</TD>";
				echo "<TD>" .$row['Type']."</TD>";
				echo "<TD>".$row['Accessibility']."</TD>";
				echo "<TD>".$row['Is_Crowded']."</TD>";
				echo "<TD>".$row['Experience']."</TD>";
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
