<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<?php
session_start();
include "db_conn.php";


if (isset($_SESSION['ID']) && isset($_SESSION['Username'])) {



?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Class</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>

<body>
    <form action="submit-class-check.php" method="post">
        <h2>Submit New Class</h2>

        <!-- Error Message -->
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <!-- Success Message -->
        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <!--Input Boxes-->
        <label>Class Code</label>
        <?php if (isset($_GET['Code'])) { ?>
            <input type = "text"
                   name ="Code" 
                   placeholder="e.g. CPSC 471"
                   value= "<?php echo $_GET['Code']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="Code" 
                   placeholder="e.g. CPSC 471"><br>
        <?php }?>

        <label>Description</label>
        <?php if (isset($_GET['Description'])) { ?>
            <input type = "text"
                   name ="Description" 
                   placeholder="Database Management Course ..."
                   value= "<?php echo $_GET['Description']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="Description" 
                   placeholder="e.g. Database Management Course ... "><br>
        <?php }?>


        
        
        <button type="submit">Submit New Class</button>
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