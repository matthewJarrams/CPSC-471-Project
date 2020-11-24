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
      <TH COLSPAN="2">
         <H3><BR>Classes</H3>
      </TH>
   </TR>
      <TH>Class Code</TH>
      <TH>Description</TH>
	   
<?php
    // Get all user info from database and print it out
    $sql = "SELECT * FROM class";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
	
    // There does exist users in the database
    if ($resultCheck > 0) {
        
        // Print Header
        //echo  'Class Code' . "  | " . 'Description';

        // Print out each entry in given course code
        while($row = mysqli_fetch_assoc($result)) {
            $Code = $row['Code'];
			echo "<tables>";
			echo "<TR>";
			echo "<td><a href=\"search-reviews.php?LinkCode =" .$Code . "\">". $Code ."</a></td>";
			echo "<TD>".$row['Description']."</TD>";
			echo"</TR>";
            
        }
	
    }
?>
</h1>
   <!-- <h1>Hello, <?php echo $_SESSION['Username']; ?></h1><br> -->    


    <a href="logout.php" class = "logoutLblPos">Logout</a>
	<a href="mainScreen.php" class = "homeLblPos">Home Screen</a>


</body>



</html>

<?php
}else{
    header("Location: index.php");
    exit();

}
?>