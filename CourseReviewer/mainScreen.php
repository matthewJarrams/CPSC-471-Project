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
	
	<form action="class-main.php" method="post">   

		<button type="Class"> Class </button>
        <a href="logout.php" class = "logoutLblPos">Logout</a>

    </form>
	
	<form action="building-main.php" method="post">   
        
       	<button type="Building"> Building </button>
        <a href="logout.php" class = "logoutLblPos">Logout</a>

    </form>
	
	<form action="club-main.php" method="post">   
        
       	<button type="Club"> Club </button>
        <a href="logout.php" class = "logoutLblPos">Logout</a>

    </form>
	
	<form action="class-main.php" method="post">   

		<button type="Class">Profile </button>
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