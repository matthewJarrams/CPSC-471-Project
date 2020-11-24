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
	
	<form action="view-classes.php" method="post">   

		<button type="Class"> View Classes </button>
        <a href="logout.php" class = "logoutLblPos">Logout</a>
		<a href="mainScreen.php" class = "homeLblPos">Home Screen</a>

    </form>
	
	<form action="search-index.php" method="post">   
        
       	<button type="Building"> Search Classes </button>
        <a href="logout.php" class = "logoutLblPos">Logout</a>
		<a href="mainScreen.php" class = "homeLblPos">Home Screen</a>

    </form>
	
	<form action="add-class.php" method="post">   
        
       	<button type="Club"> Add Class </button>
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