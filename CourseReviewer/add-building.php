<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<?php
session_start();
include "db_conn.php";


if (isset($_SESSION['ID']) && isset($_SESSION['Username'])) {



?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Building</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>

<body>
    <form action="submit-building-check.php" method="post">
        <h2>Submit New Building</h2>

        <!-- Error Message -->
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <!-- Success Message -->
        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <!--Input Boxes-->
        <label>Building Name</label>
        <?php if (isset($_GET['name'])) { ?>
            <input type = "text"
                   name ="name" 
                   placeholder="e.g. TFDL"
                   value= "<?php echo $_GET['name']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="name" 
                   placeholder="e.g. TFDL"><br>
        <?php }?>

        <label>Description</label>
        <?php if (isset($_GET['type'])) { ?>
            <input type = "text"
                   name ="type" 
                   placeholder="Library"
                   value= "<?php echo $_GET['type']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="type" 
                   placeholder="Library"><br>
        <?php }?>


        
        
        <button type="submit">Submit New Building</button>
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