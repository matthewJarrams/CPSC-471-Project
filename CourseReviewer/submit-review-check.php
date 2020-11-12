<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<?php
session_start();
include "db_conn.php";

// // Checks to see if there are given fields are in form
if (isset($_POST['code']) && isset($_POST['wouldTakeAgain']) 
    && isset($_POST['isRequired']) && isset($_POST['textbook'])
    && isset($_POST['workload']) && isset($_POST['difficulty'])
    && isset($_POST['semester']) && isset($_POST['year'])){

    // Cleanses inputed data in fields
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Cleanses inputed data using validate function above
    $code = validate($_POST['code']);
    $wouldTakeAgain = validate($_POST['wouldTakeAgain']);
    $isRequired = validate($_POST['isRequired']);
    $textbook = validate($_POST['textbook']);
    $workload = validate($_POST['workload']);
    $difficulty = validate($_POST['difficulty']);
    $semester = validate($_POST['semester']);
    $year = validate($_POST['year']);

    // I think this saves entered user data as a concatenated string where the . operator concatenates
    $review_data = '&code=' . $code . '&wouldTakeAgain=' . $wouldTakeAgain . '&isRequired=' . $isRequired 
                . '&textbook=' . $textbook . '&workload=' . $workload . '&difficulty=' . $difficulty
                . '&semester=' . $semester . '&year=' . $year;

    // Check if any fields are empty
    if (empty($code)){
        header("Location: signup.php?error=Course Code is required&$review_data");
        exit();
    } else if(empty($wouldTakeAgain)){
        header("Location: signup.php?error=Would take again is required&$review_data");
        exit();
    }  else if(empty($isRequired)){
        header("Location: signup.php?error=Is required is required&$review_data");
        exit();
    }  else if(empty($textbook)){
        header("Location: signup.php?error=Textbook is required&$review_data");
        exit();
    }  else if(empty($workload)){
        header("Location: signup.php?error=Workload is required&$review_data");
        exit();
    }  else if(empty($difficulty)){
        header("Location: signup.php?error=Difficulty is required&$review_data");
        exit();
    } else if(empty($semester)){
        header("Location: signup.php?error=Semester is required&$review_data");
        exit();
    } else if(empty($year)){
        header("Location: signup.php?error=Year is required&$review_data");
        exit();
        // All fields filled in, so check if correct
    } else {

        
        // Check if course code is correct
        
        $sql = "SELECT * FROM class_review WHERE Code ='$code'";
        // Performs the $sql query on the connected database in $conn
        $result = mysqli_query($conn, $sql);

        // Code is not correct
        if (mysqli_num_rows($result) ===  -1) {
            header("Location: signup.php?error=Inccorrect course code.&$review_data");
            exit();

        // Course code is correct. So insert review into database
        } else {
            
            // sql query to insert review into database
            $sql2 = "INSERT INTO class_review(Code, Would_take_again, Required, Textbook, Work_load,
             Difficulty, Semester, Year) 
             VALUES('$code', '$wouldTakeAgain', '$isRequired', '$textbook', '$workload', '$difficulty',
              '$semester', '$year')";
            
            $result2 = mysqli_query($conn, $sql2);

            if($result2){

                header("Location: home.php?success=Course review successfully added.");
                exit();

            } else {

                header("Location: home.php?error=Unknown error occurred&$review_data");
                exit();

            }
            

        }

    }

// Error so return back to home
} else{
    header("Location: home.php");
    exit();
}

?>