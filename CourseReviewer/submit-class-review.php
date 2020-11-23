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
    <form action="submit-review-check.php" method="post">
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
        <label>Class Code</label>
        <?php if (isset($_GET['code'])) { ?>
            <input type = "text"
                   name ="code" 
                   placeholder="e.g. CPSC 471"
                   value= "<?php echo $_GET['code']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="code" 
                   placeholder="e.g. CPSC 471"><br>
        <?php }?>

        <label>Would you take it again?</label>
        <?php if (isset($_GET['wouldTakeAgain'])) { ?>
            <input type = "text"
                   name ="wouldTakeAgain" 
                   placeholder="e.g.Yes/No"
                   value= "<?php echo $_GET['wouldTakeAgain']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="wouldTakeAgain" 
                   placeholder="e.g. Yes/No"><br>
        <?php }?>

        <label>Is it a required course?</label>
        <?php if (isset($_GET['isRequired'])) { ?>
            <input type = "text"
                   name ="isRequired" 
                   placeholder="e.g. Yes/No"
                   value= "<?php echo $_GET['isRequired']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="isRequired" 
                   placeholder="e.g. Yes/No"><br>
        <?php }?>

        <label>Textbook</label>
        <?php if (isset($_GET['textbook'])) { ?>
            <input type = "text"
                   name ="textbook" 
                   placeholder="What textbook did you use?"
                   value= "<?php echo $_GET['textbook']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="textbook" 
                   placeholder="What textbook did you use?"><br>
        <?php }?>

        <label>Work Load</label>
        <?php if (isset($_GET['workload'])) { ?>
            <input type = "text"
                   name ="workload" 
                   placeholder="e.g. Low/Medium/High"
                   value= "<?php echo $_GET['workload']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="workload" 
                   placeholder="e.g. Low/Medium/High"><br>
        <?php }?>

        <label>Difficulty</label>
        <?php if (isset($_GET['difficulty'])) { ?>
            <input type = "text"
                   name ="difficulty" 
                   placeholder="e.g. Easy/Medium/Hard"
                   value= "<?php echo $_GET['difficulty']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="difficulty" 
                   placeholder="e.g. Easy/Medium/Hard"><br>
        <?php }?>

        <label>Semester</label>
        <?php if (isset($_GET['semester'])) { ?>
            <input type = "text"
                   name ="semester" 
                   placeholder="e.g. Fall/Winter/Spring/Summer"
                   value= "<?php echo $_GET['semester']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="semester" 
                   placeholder="e.g. Fall/Winter/Spring/Summer"><br>
        <?php }?>

        <label>Year</label>
        <?php if (isset($_GET['year'])) { ?>
            <input type = "text"
                   name ="year" 
                   placeholder="e.g. 2020"
                   value= "<?php echo $_GET['year']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="year" 
                   placeholder="e.g. 2020"><br>
        <?php }?>
		
		<label>Review</label>
        <?php if (isset($_GET['review'])) { ?>
            <input type = "text"
                   name ="review" 
                   placeholder="e.g. This was a great class..."
                   value= "<?php echo $_GET['review']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="review" 
                   placeholder="e.g. This was a great class..."><br>
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