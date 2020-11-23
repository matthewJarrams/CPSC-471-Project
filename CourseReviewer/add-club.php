<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<?php
session_start();
include "db_conn.php";


if (isset($_SESSION['ID']) && isset($_SESSION['Username'])) {



?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Club</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>

<body>
    <form action="submit-club-check.php" method="post">
        <h2>Submit New Club</h2>

        <!-- Error Message -->
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <!-- Success Message -->
        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <!--Input Boxes-->
        <label>Club Name</label>
        <?php if (isset($_GET['name'])) { ?>
            <input type = "text"
                   name ="name" 
                   placeholder="e.g. Competitive Programming Club"
                   value= "<?php echo $_GET['name']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="name" 
                   placeholder="e.g. Competitive Programming Club"><br>
        <?php }?>
		
		
		
		<label>Club Location</label>
		<?php if (isset($_GET['Club_Location'])) { ?>
			<input type = "text"
			name = "Club_Location"
			placeholder = "ICT 102"
			value = "<?php echo $_GET['Club_Location']; ?>"><br>
		<?php }else { ?>
			<input type = "text"
			name = "Club_Location"
			placeholder = "ICT 102"
		<?php } ?>

        <label>Club Description</label>
        <?php if (isset($_GET['Club_Description'])) { ?>
            <input type = "text"
                   name ="Club_Description" 
                   placeholder="Learn fun and new programming techniques to help with future courses."
                   value= "<?php echo $_GET['Club_Description']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="Club_Description" 
                   placeholder="Learn fun and new programming techniques to help with future courses."><br>
        <?php }?>


        
        
        <button type="submit">Submit New Club</button>
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