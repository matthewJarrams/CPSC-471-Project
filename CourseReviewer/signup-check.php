<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<?php
session_start();
include "db_conn.php";

// // Checks to see if there are given fields are in form
if (isset($_POST['fname']) && isset($_POST['lname']) 
    && isset($_POST['email']) && isset($_POST['role'])
    && isset($_POST['university']) && isset($_POST['uname'])
    && isset($_POST['password']) && isset($_POST['re_password'])){

    // Cleanses inputed data in fields
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Cleanses inputed data using validate function above
    $fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
    $email = validate($_POST['email']);
    $role = validate($_POST['role']);
    $university = validate($_POST['university']);
    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);
    $re_password = validate($_POST['re_password']);

    // I think this saves entered user data as a concatenated string where the . operator concatenates
    $user_data = '&fname=' . $fname . '&lname=' . $lname . '&email=' . $email 
                . '&role=' . $role . '&university=' . $university . '&uname=' . $uname;

    // Check if any fields are empty
    if (empty($fname)){
        header("Location: signup.php?error=First Name is required&$user_data");
        exit();
    } else if(empty($lname)){
        header("Location: signup.php?error=Last Name is required&$user_data");
        exit();
    }  else if(empty($email)){
        header("Location: signup.php?error=Email is required&$user_data");
        exit();
    }  else if(empty($role)){
        header("Location: signup.php?error=Role is required&$user_data");
        exit();
    }  else if(empty($university)){
        header("Location: signup.php?error=University is required&$user_data");
        exit();
    }  else if(empty($uname)){
        header("Location: signup.php?error=User Name is required&$user_data");
        exit();
    } else if(empty($password)){
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    } else if(empty($re_password)){
        header("Location: signup.php?error=Re_password is required&$user_data");
        exit();
    }  else if($password !== $re_password){
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
        exit();
    

        // All fields filled in, so check if correct
    } else {

        // hashing the password
        //$password = md5($password);
        
        // Compare inputted uname and pass to Username and Password in coursereviewer database
        
        $sql = "SELECT * FROM user WHERE Username ='$uname'";
        // Performs the $sql query on the connected database in $conn
        $result = mysqli_query($conn, $sql);

        // Username taken
        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=The username is taken.&$user_data");
            exit();

        // Username is avaliable. So insert account info into database
        } else {
		   $currentDateTime = date('Y-m-d');
           $super_flag = 0;
           $client_flag = 1;
		   $sqlmax = "select max(ID) + 1 from user";
		   $resultmax = mysqli_query($conn, $sqlmax);
		   $rowmax = mysqli_fetch_assoc($resultmax);
		   $ID = $rowmax['max(ID) + 1']; 

           $permission = "none";
            
            // sql query to insert account info into database

            $sql2 = "INSERT INTO user(ID, First_name, Last_name, Date_made, Username,
            Password, Super_flag, Permissions, Client_flag, email_address, Role, University) 
            VALUES ('$ID','$fname','$lname','$currentDateTime','$uname',
            '$password','$super_flag','$permission','$client_flag','$email','$role', '$university')" ;
                        
            $result2 = mysqli_query($conn, $sql2);

            if($result2){

                header("Location: signup.php?success=Your account has been created successfully.");
                exit();

            } else {

                header("Location: signup.php?error=Unknown error occurred&$user_data");
                exit();

            }
            

        }

    }

// Else uname or password is empty, so go back to login
} else{
    header("Location: signup.php");
    exit();
}

?>