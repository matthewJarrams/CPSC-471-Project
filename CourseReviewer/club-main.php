<?php
session_start();
include "db_conn.php";


if (isset($_SESSION['ID']) && isset($_SESSION['Username'])) {
	


?>

<!DOCTYPE html>
<html> 
<head>
    <title>HomePage</title>
	<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>
	
	<form action="view-clubs.php" method="post">   

		<button type="Class"> View Clubs </button>
        <a href="logout.php" class = "logoutLblPos">Logout</a>
		<a href="mainScreen.php" class = "homeLblPos">Home Screen</a>

    </form>
	
	<form action="search-index-club.php" method="post">   
        
       	<button type="Building"> Search Clubs </button>
        <a href="logout.php" class = "logoutLblPos">Logout</a>
		<a href="mainScreen.php" class = "homeLblPos">Home Screen</a>

    </form>
	
	<form action="add-club.php" method="post">   
        
       	<button type="Club"> Add Club </button>
        <a href="logout.php" class = "logoutLblPos">Logout</a>
		<a href="mainScreen.php" class = "homeLblPos">Home Screen</a>

    </form>
	<form action="submit-class-review.php" method="post">   
        
       	<button type="Club"> Make Review </button>
        <a href="logout.php" class = "logoutLblPos">Logout</a>
		<a href="mainScreen.php" class = "homeLblPos">Home Screen</a>

    </form>


</body>



</html>

<?php
}else{
    header("Location: index.php");
    exit();

}
?>