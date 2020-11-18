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

	<form action="home.php" method="post">   
        
       	<button type="Class"> Class </button>
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