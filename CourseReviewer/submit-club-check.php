<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['ID']) && isset($_SESSION['Username'])) {
// // Checks to see if there are given fields are in form
if (isset($_POST['name']) && isset($_POST['Club_Location']) && isset($_POST['Club_Description'])){

    // Cleanses inputed data in fields
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Cleanses inputed data using validate function above
    $Name = validate($_POST['name']);
    $Description = validate($_POST['Club_Description']);
	$Location = validate($_POST['Club_Location']);

    // I think this saves entered user data as a concatenated string where the . operator concatenates
    /*$review_data = '&code=' . $code . '&wouldTakeAgain=' . $wouldTakeAgain . '&isRequired=' . $isRequired 
                . '&textbook=' . $textbook . '&workload=' . $workload . '&difficulty=' . $difficulty
                . '&semester=' . $semester . '&year=' . $year;*/

    // Check if any fields are empty
    if (empty($Name)){
        header("Location: add-club.php?error=Club name is required&$review_data");
        exit();
    } else if(empty($Description)){
        header("Location: add-club.php?error=Club Description is required&$review_data");
        exit();
	} else if(empty($Location)){
        header("Location: add-club.php?error=Location where club takes place is required&$review_data");
        exit();
        // All fields filled in, so check if correct
    } else {

        
        // Check if course code is correct
        
       /* $sql = "SELECT * FROM class WHERE Code ='$Code'";
        // Performs the $sql query on the connected database in $conn
        $result = mysqli_query($conn, $sql);

        // Code is not correct
        if (mysqli_num_rows($result) ===  -1) {
            header("Location: signup.php?error=Inccorrect course code.&$review_data");
            exit();

        // Course code is correct. So insert review into database
        } else {*/
            
            // sql query to insert review into database
            $sql2 = "INSERT INTO club(Club_name, Club_description, Club_location)
             VALUES('$Name', '$Description', '$Location')";
            
            $result2 = mysqli_query($conn, $sql2);

            if($result2){

                header("Location: add-club.php?success=Club successfully added.");
                exit();

            } else {

                header("Location: add-club.php?error=Unknown error occurred");
                exit();

            }
            

        }

    }

// Error so return back to home
//}
 else{
    header("Location: add-club.php");
    exit();
}
}

?>