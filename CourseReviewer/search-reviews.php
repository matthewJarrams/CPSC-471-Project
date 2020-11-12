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
<?php
    // Get all user info from database and print it out
    $sql = "SELECT * FROM class_review";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    // There does exist users in the database
    if ($resultCheck > 0) {
        

        // Print Header
        echo  'Code' . "  |  " . 'Would_take_again' . "  |  " . 'Required' . "  |  " .
                  'Textbook' . "  |  " . 'Work_load' . "  |  " . 'Difficulty' . "  |  " .
                  'Semester' . "  |  " . 'Year' ."<br>";

        // Print out each entry in given course code
        while($row = mysqli_fetch_assoc($result)) {
            echo  $row['Code'] . "  |  " . $row['Would_take_again'] . "  |  " . $row['Required'] . "  |  " .
                  $row['Textbook'] . "  |  " . $row['Work_load'] . "  |  " . $row['Difficulty'] . "  |  " .
                  $row['Semester'] . "  |  " . $row['Year'] ."<br>";
            
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