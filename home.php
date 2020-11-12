<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<?php
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['Username'])) {



?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>

<body>
    <h1>Hello, <?php echo $_SESSION['Username']; ?></h1><br>    
    <a href="logout.php">Logout</a>


</body>



</html>

<?php
}else{
    header("Location: index.php");
    exit();

}
?>