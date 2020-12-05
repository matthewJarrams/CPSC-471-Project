<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<?php
session_start();
include "db_conn.php";


if (isset($_SESSION['ID']) && isset($_SESSION['Username'])) {

	


?>

<!DOCTYPE html>
<html>
<head>
    <title>SUBMIT REVIEW</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>
    <form action="submit-review-club-check.php" method="post">
        <h2>Submit Review</h2>
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
        <?php if (isset($_GET['Club_name'])) { ?>
            <input type = "text"
                   name ="Club_name" 
                   placeholder="e.g. Chess"
                   value= "<?php echo $_GET['Club_name']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="Club_name" 
                   placeholder="e.g. Chess"><br>
        <?php }?>

        <label>What was the cost of the club?</label>
        <?php if (isset($_GET['Cost'])) { ?>
            <input type = "text"
                   name ="Cost" 
                   placeholder="e.g.15"
                   value= "<?php echo $_GET['Cost']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="Cost" 
                   placeholder="e.g. 15"><br>
        <?php }?>

        <label>Is is an Academic club?</label>
        <?php if (isset($_GET['Academic'])) { ?>
            <input type = "text"
                   name ="Academic" 
                   placeholder="e.g. Yes/No"
                   value= "<?php echo $_GET['Academic']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="Academic" 
                   placeholder="e.g. Yes/No"><br>
        <?php }?>

        <label>Was this club for leisure?</label>
        <?php if (isset($_GET['Leisure'])) { ?>
            <input type = "text"
                   name ="Leisure" 
                   placeholder="yes/no"
                   value= "<?php echo $_GET['Leisure']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="Leisure" 
                   placeholder="yes/no"><br>
        <?php }?>

		
		<label>Review</label>
        <?php if (isset($_GET['review'])) { ?>
            <input type = "text"
                   name ="review" 
                   placeholder="e.g. This was a great Club..."
                   value= "<?php echo $_GET['review']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="review" 
                   placeholder="e.g. This was a great club..."><br>
        <?php }?>
		
		<label>Rating</label>
        <?php if (isset($_GET['rating'])) { ?>
            <input type = "text"
                   name ="rating" 
                   placeholder="number from 1-10"
                   value= "<?php echo $_GET['rating']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="rating" 
                   placeholder="number from 1-10"><br>
        <?php }?>
		
		<label>Username</label>
        <?php if (isset($_GET['username'])) { ?>
            <input type = "text"
                   name ="username" 
                   placeholder="Please enter your username"
                   value= "<?php echo $_GET['username']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="username" 
                   placeholder="Please enter your username"><br>
        <?php }?>


        
        
        <button type="submit">Submit Review</button>
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