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
    <form action="submit-review-building-check.php" method="post">
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
        <label>Building Name</label>
        <?php if (isset($_GET['Building_name'])) { ?>
            <input type = "text"
                   name ="Building_name" 
                   placeholder="e.g. Science A"
                   value= "<?php echo $_GET['Building_name']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="Building_name" 
                   placeholder="e.g. Science A"><br>
        <?php }?>

        <label>What was the Accessibility of this building like?</label>
        <?php if (isset($_GET['Accessibility'])) { ?>
            <input type = "text"
                   name ="Accessibility" 
                   placeholder="e.g.Good"
                   value= "<?php echo $_GET['Accessibility']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="Accessibility" 
                   placeholder="e.g. Good"><br>
        <?php }?>

        <label>Is this building crowded?</label>
        <?php if (isset($_GET['Is_Crowded'])) { ?>
            <input type = "text"
                   name ="Is_Crowded" 
                   placeholder="e.g. Yes/No"
                   value= "<?php echo $_GET['Is_Crowded']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="Is_Crowded" 
                   placeholder="e.g. Yes/No"><br>
        <?php }?>

        <label>What was your experience in this building?</label>
        <?php if (isset($_GET['Experience'])) { ?>
            <input type = "text"
                   name ="Experience" 
                   placeholder="socializing"
                   value= "<?php echo $_GET['Experience']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="Experience" 
                   placeholder="socializing"><br>
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