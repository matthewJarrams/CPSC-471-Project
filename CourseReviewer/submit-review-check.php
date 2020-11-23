<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<?php
session_start();
include "db_conn.php";
// // Checks to see if there are given fields are in form
if (isset($_POST['code']) && isset($_POST['wouldTakeAgain']) 
    && isset($_POST['isRequired']) && isset($_POST['textbook'])
    && isset($_POST['workload']) && isset($_POST['difficulty'])
    && isset($_POST['semester']) && isset($_POST['year'])&& isset($_POST['review'])&& isset($_POST['rating']) && isset($_POST['username'])){

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
	$review = validate($_POST['review']);
	$rating = validate($_POST['rating']);
	$username = validate($_POST['username']);
    // I think this saves entered user data as a concatenated string where the . operator concatenates
    $review_data = '&code=' . $code . '&wouldTakeAgain=' . $wouldTakeAgain . '&isRequired=' . $isRequired 
                . '&textbook=' . $textbook . '&workload=' . $workload . '&difficulty=' . $difficulty
                . '&semester=' . $semester . '&year=' . $year . '$review' . $rating . 'rating' . $username . 'usernmae';

    // Check if any fields are empty
    if (empty($code)){
        header("Location: submit-class-review.php?error=Course Code is required&$review_data");
        exit();
    } else if(empty($wouldTakeAgain)){
        header("Location: submit-class-review.php?error=Would take again is required&$review_data");
        exit();
    }  else if(empty($isRequired)){
        header("Location: submit-class-review.php?error=Is required is required&$review_data");
        exit();
    }  else if(empty($textbook)){
        header("Location: submit-class-review.php?error=Textbook is required&$review_data");
        exit();
    }  else if(empty($workload)){
        header("Location: submit-class-review.php?error=Workload is required&$review_data");
        exit();
    }  else if(empty($difficulty)){
        header("Location: submit-class-review.php?error=Difficulty is required&$review_data");
        exit();
    } else if(empty($semester)){
        header("Location: submit-class-review.php?error=Semester is required&$review_data");
        exit();
    } else if(empty($year)){
        header("Location: submit-class-review.php?error=Year is required&$review_data");
        exit();
	} else if(empty($review)) {
		header("Location: submit-class-review.php?error=Review is required&$review_data");
		exit();
	} else if(empty($rating)){
		header("Location: submit-class-review.php?error=Review is required&$review_data");
		exit();
	} else if(empty($username)){
		header("Location: submit-class-review.php?error=Username is required&$review_data");
		exit();
        // All fields filled in, so check if correct
    }
    else {
			
			$SqlUID = "SELECT ID FROM `user` WHERE Username = '$username'";
			$resultUID = mysqli_query($conn, $SqlUID);
			$rowUID = mysqli_fetch_assoc($resultUID);
			$UID = $rowUID['ID'];
            //if (mysqli_num_rows($rowUID) == 0) {
            //header("Location: submit-class-review.php?error=This is not your username");
            //exit();

        //Username is correct
        //} else {
            // sql query to insert review into database
			$currentDateTime = date('Y-m-d');
			
			
			
			$sqlmax2 = "select max(Review_id) + 1 from review";
			$resultmax2 = mysqli_query($conn, $sqlmax2);
			$rowmax2 = mysqli_fetch_assoc($resultmax2);
			$RID = $rowmax2['max(Review_id) + 1']; 
			
			$sql1 = "INSERT INTO review(Review_id, Description_review, Rating, Date_made) VALUES ('$RID', '$review', '$rating', '$currentDateTime')";
			$sql2 = "INSERT INTO makes_review(Stu_R_id, Review_M_id) VALUES ('$UID','$RID')";
            $sql3 = "INSERT INTO `class_review` (`Class_review_id`, `Class_code`, `Would_take_again`, `Required`, `Textbook`, `Work_load`, `Difficulty`, `Semester`, `Year`) VALUES ('$RID', '$code', '$wouldTakeAgain', '$isRequired', '$textbook', '$workload', '$difficulty', '$semester', '$year')";
            $result1 = mysqli_query($conn, $sql1);
			$result2 = mysqli_query($conn, $sql2);
			$result3 = mysqli_query($conn, $sql3);

            if($result3)
			{
                header("Location: submit-class-review.php?success=Course review successfully added.");
                exit();

            } else {

                header("Location: submit-class-review.php?error=Unknown error occurred&$review_data");
                exit();

            }
            

        }

    

// Error so return back to home
} else{
    header("Location: submit-class-review.php?error = unknown");
    exit();
}

?>