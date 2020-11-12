<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<?php
session_start();
include "db_conn.php";

// Checks to see if there are 'uname' and 'password' fields in form
if (isset($_POST['uname']) && isset($_POST['password'])){
    // Cleanses inputed data in fields
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Cleanses inputed data using validate function above
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    // If variables are empty
    if (empty($uname)){
        header("Location: index.php?error=User Name is required");
        exit();

    } else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();

    // else username and password fields have information so now proceed to check if correct
    }else{

        // hashing the password
        //$pass = md5($pass);

        // Compare inputted uname and pass to Username and Password in coursereviewer database
        $sql = "SELECT * FROM user WHERE Username ='$uname' AND Password ='$pass' ";

        // Performs the $sql query on the connected database in $conn
        $result = mysqli_query($conn, $sql); // Returns row

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result); // $row is an array of user data
            
            // Entered correct username and password
            if ($row['Username'] === $uname && $row['Password'] === $pass) {
                $_SESSION['Username'] = $row['Username'];
                $_SESSION['First_name'] = $row['First_name'];
                $_SESSION['Last_name'] = $row['Last_name'];
                $_SESSION['ID'] = $row['ID'];
                header("Location: home.php");
                exit();

            } else{
                header("Location: index.php?error=Incorrect User name or password");
                exit();
            }


        } else{
            header("Location: index.php?error=Incorrect User name or password");
            exit();
        }
    }

// Else uname or password is empty, so go back to login
} else{
    header("Location: index.php");
    exit();
}

?>