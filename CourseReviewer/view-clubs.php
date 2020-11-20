<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<?php
session_start();
include "db_conn.php";


if (isset($_SESSION['ID']) && isset($_SESSION['Username'])) {



?>

<!DOCTYPE html>
<html>
<head>
    <title>SEARCH REVIEWS</title>
	<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>

<body>

<h1>

<TABLE  BORDER="5">
   <TR>
      <TH COLSPAN="3">
         <H3><BR>Clubs</H3>
      </TH>
   </TR>
      <TH>Club Name</TH>
      <TH>Description</TH>
	  <TH>Location</TH>
	   
<?php
    // Get all user info from database and print it out
    $sql = "SELECT * FROM club";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
	
    // There does exist users in the database
    if ($resultCheck > 0) {
        
        // Print Header
        //echo  'Class Code' . "  | " . 'Description';

        // Print out each entry in given course code
        while($row = mysqli_fetch_assoc($result)) {
			echo "<tables>";
			echo "<TR>";
			echo "<TD>".$row['Club_name'] ."</TD>";
			echo "<TD>".$row['Club_description']."</TD>";
			echo "<TD>".$row['Club_location']."</TD>";
			echo"</TR>";
            
        }
	
    }
?>
</h1>
   <!-- <h1>Hello, <?php echo $_SESSION['Username']; ?></h1><br> -->    


    <a href="logout.php" class = "logoutLblPos">Logout</a>

</body>



</html>

<?php
}else{
    header("Location: index.php");
    exit();

}
?>