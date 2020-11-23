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
	
	<form action="view-buildings.php" method="post">   

		<button type="Class"> View Buildings </button>
        <a href="logout.php" class = "logoutLblPos">Logout</a>

    </form>
	
	<form action="search-index-building.php" method="post">   
        
       	<button type="Building"> Search Buildings </button>
        <a href="logout.php" class = "logoutLblPos">Logout</a>

    </form>
	
	<form action="add-building.php" method="post">   
        
       	<button type="Club"> Add Building </button>
        <a href="logout.php" class = "logoutLblPos">Logout</a>

    </form>
	<form action="home.php" method="post">   
        
       	<button type="Club"> Make Review </button>
        <a href="logout.php" class = "logoutLblPos">Logout</a>

    </form>


</body>



</html>

<?php
}else{
    header("Location: index.php");
    exit();

}
?>