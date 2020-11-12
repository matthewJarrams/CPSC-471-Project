<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<!DOCTYPE html>
<html>
<head>
    <title>SIGN UP</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>

<body>
    <form action="signup-check.php" method="post">
        <h2>SIGN UP</h2>

        <!-- Error Message -->
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <!-- Success Message -->
        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <!--Input Boxes-->
        <label>First Name</label>
        <?php if (isset($_GET['fname'])) { ?>
            <input type = "text"
                   name ="fname" 
                   placeholder="First Name"
                   value= "<?php echo $_GET['fname']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="fname" 
                   placeholder="First Name"><br>
        <?php }?>

        <label>Last Name</label>
        <?php if (isset($_GET['lname'])) { ?>
            <input type = "text"
                   name ="lname" 
                   placeholder="Last Name"
                   value= "<?php echo $_GET['lname']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="lname" 
                   placeholder="Last Name"><br>
        <?php }?>

        <label>Email Address</label>
        <?php if (isset($_GET['email'])) { ?>
            <input type = "text"
                   name ="email" 
                   placeholder="Email Address"
                   value= "<?php echo $_GET['email']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="email" 
                   placeholder="Email Address"><br>
        <?php }?>

        <label>Role</label>
        <?php if (isset($_GET['role'])) { ?>
            <input type = "text"
                   name ="role" 
                   placeholder="Role"
                   value= "<?php echo $_GET['role']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="role" 
                   placeholder="Role"><br>
        <?php }?>

        <label>University</label>
        <?php if (isset($_GET['university'])) { ?>
            <input type = "text"
                   name ="university" 
                   placeholder="University"
                   value= "<?php echo $_GET['university']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="university" 
                   placeholder="University"><br>
        <?php }?>

        <label>User Name</label>
        <?php if (isset($_GET['uname'])) { ?>
            <input type = "text"
                   name ="uname" 
                   placeholder="User Name"
                   value= "<?php echo $_GET['uname']; ?>"><br>
        <?php }else{ ?>
            <input type = "text" 
                   name ="uname" 
                   placeholder="User Name"><br>
        <?php }?>

        <label>Password</label>
        <input type = "password" 
               name ="password" 
               placeholder="Password"><br>

        <label>Re-password</label>
        <input type = "password" 
               name ="re_password" 
               placeholder="Re-password"><br>
        
        <button type="submit">Sign Up</button>
        <a href="index.php" class="ca">Already have an account?</a>
    </form>


</body>



</html>