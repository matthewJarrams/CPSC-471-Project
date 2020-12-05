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
      <TH COLSPAN="9">
         <H3><BR>Reviews</H3>
      </TH>
   </TR>
	  <TH>Username</TH>
      <TH>Club Name</TH>
      <TH>Club Location</TH>
	  <TH>Academic</TH>
	  <TH>Cost</TH>
	  <TH>Leisure</TH>
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
		$sql = "SELECT * FROM club WHERE '$query' = Club_name";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		// There does exist users in the database
		if ($resultCheck > 0) {
			
			$sql4 = "SELECT * FROM `user`, `club`, `club_review`, `review`, `makes_review` WHERE '$query' = club.Club_name AND club.Club_name = club_review.Club_Name AND club_review.Club_Review_id = review.Review_id AND makes_review.Review_M_id = review.Review_id AND user.ID = makes_review.Stu_R_id";
			$result4 = mysqli_query($conn, $sql4);
			$resultCheck4 = mysqli_num_rows($result4);

			// Print out each entry in given course code
			while($row = mysqli_fetch_assoc($result4)) {
				echo "<tables>";
				echo "<TR>";
				echo "<TD>".$row['Username']. "</TD>";
				echo "<TD>".$row['Club_name']. "</TD>";
				echo "<TD>".$row['Club_location']."</TD>";
				echo "<TD>".$row['Academic']."</TD>";
				echo "<TD>".$row['Cost']."</TD>";
				echo "<TD>".$row['Leisure']."</TD>";
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
<a href="mainScreen.php" class = "homeLblPos">Home Screen</a>
</body>
</html>
