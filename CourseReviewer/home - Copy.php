<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<?php
session_start();
include "db_conn.php";


if (isset($_SESSION['ID']) && isset($_SESSION['Username'])) {



?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>

<body>

<h1>
<?php
    // Get all user info from database and print it out
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    // There does exist users in the database
    if ($resultCheck > 0) {
        // Print out each row
        echo "<p align=center>Users</p>";
        while($row = mysqli_fetch_assoc($result)) {
            echo  $row['Username'] . "  |  " . $row['First_name'] . " " . $row['Last_name'] . "<br>";
            
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