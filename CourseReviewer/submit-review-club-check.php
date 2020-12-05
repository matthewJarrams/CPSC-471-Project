<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<?php
session_start();
include "db_conn.php";
// // Checks to see if there are given fields are in form
if (isset($_POST['Club_name']) && isset($_POST['Cost']) 
    && isset($_POST['Academic']) && isset($_POST['Leisure'])
    &&  isset($_POST['review'])&& isset($_POST['rating']) && isset($_POST['username'])){

    // Cleanses inputed data in fields
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Cleanses inputed data using validate function above
    $Club_name = validate($_POST['Club_name']);
    $Cost = validate($_POST['Cost']);
    $Academic = validate($_POST['Academic']);
    $Leisure = validate($_POST['Leisure']);
	$review = validate($_POST['review']);
	$rating = validate($_POST['rating']);
	$username = validate($_POST['username']);
    // I think this saves entered user data as a concatenated string where the . operator concatenates
    $review_data = '&Club_name=' . $Club_name . '&cost=' . $Cost . '&Academic=' . $Academic 
                . '&Leisure=' . $Leisure . '$review' . $rating . 'rating' . $username . 'username';

    // Check if any fields are empty
    if (empty($Club_name)){
        header("Location: submit-club-review.php?error=Club Name is required&$review_data");
        exit();
    } else if(empty($Cost)){
        header("Location: submit-club-review.php?error=Cost is required&$review_data");
        exit();
    }  else if(empty($Academic)){
        header("Location: submit-club-review.php?error=Academic is required&$review_data");
        exit();
    }  else if(empty($Leisure)){
        header("Location: submit-club-review.php?error=Leisure is required&$review_data");
        exit();
	} else if(empty($review)) {
		header("Location: submit-club-review.php?error=Review is required&$review_data");
		exit();
	} else if(empty($rating)){
		header("Location: submit-club-review.php?error=Review is required&$review_data");
		exit();
	} else if(empty($username)){
		header("Location: submit-club-review.php?error=Username is required&$review_data");
		exit();
        // All fields filled in, so check if correct
    }
    else {
			
			$SqlUID = "SELECT ID FROM `user` WHERE Username = '$username'";
			$resultUID = mysqli_query($conn, $SqlUID);
			$rowUID = mysqli_fetch_assoc($resultUID);
			$UID = $rowUID['ID'];
			
			  // Check if course code is correct
        
        $sql = "SELECT * FROM club WHERE Club_name ='$Club_name'";
        // Performs the $sql query on the connected database in $conn
        $result = mysqli_query($conn, $sql);

        // Code is not correct
        if (mysqli_num_rows($result) ===  0) {
            header("Location: submit-club-review.php?error=Inccorrect Club name.&$review_data");
            exit();
		
            //if (mysqli_num_rows($rowUID) == 0) {
            //header("Location: submit-class-review.php?error=This is not your username");
            //exit();

        //Username is correct
        } else {
            // sql query to insert review into database
			$currentDateTime = date('Y-m-d');
			
			
			
			$sqlmax2 = "select max(Review_id) + 1 from review";
			$resultmax2 = mysqli_query($conn, $sqlmax2);
			$rowmax2 = mysqli_fetch_assoc($resultmax2);
			$RID = $rowmax2['max(Review_id) + 1']; 
			
			$sql1 = "INSERT INTO review(Review_id, Description_review, Rating, Date_made) VALUES ('$RID', '$review', '$rating', '$currentDateTime')";
			$sql2 = "INSERT INTO makes_review(Stu_R_id, Review_M_id) VALUES ('$UID','$RID')";
			$sql3 = "INSERT INTO `club_review`(`Club_Review_id`, `Club_Name`, `Cost`, `Academic`, `Leisure`) VALUES ('$RID', '$Club_name', '$Cost', '$Academic', '$Leisure')";
            $result1 = mysqli_query($conn, $sql1);
			$result2 = mysqli_query($conn, $sql2);
			$result3 = mysqli_query($conn, $sql3);

            if($result3)
			{
                header("Location: club-main.php?success=Club review successfully added.");
                exit();

            } else {

                header("Location: submit-club-review.php?error=Unknown error occurred&$review_data");
                exit();

            }
            

        }
	}

    

// Error so return back to home
} else{
    header("Location: submit-club-review.php?error = unknown");
    exit();
}

?>