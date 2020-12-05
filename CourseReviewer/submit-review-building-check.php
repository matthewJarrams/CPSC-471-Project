<!-- Adapted from Coding with Elias https://www.youtube.com/watch?v=JDn6OAMnJwQ and https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<?php
session_start();
include "db_conn.php";
// // Checks to see if there are given fields are in form
if (isset($_POST['Building_name']) && isset($_POST['Accessibility']) 
    && isset($_POST['Is_Crowded']) && isset($_POST['Experience'])
    &&  isset($_POST['review'])&& isset($_POST['rating']) && isset($_POST['username'])){

    // Cleanses inputed data in fields
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Cleanses inputed data using validate function above
    $Building_name = validate($_POST['Building_name']);
    $Accessibility = validate($_POST['Accessibility']);
    $Is_Crowded = validate($_POST['Is_Crowded']);
    $Experience = validate($_POST['Experience']);
	$review = validate($_POST['review']);
	$rating = validate($_POST['rating']);
	$username = validate($_POST['username']);
    // I think this saves entered user data as a concatenated string where the . operator concatenates
    $review_data = '&Building_name=' . $Building_name . '&Accessibility=' . $Accessibility . '&Is_Crowded=' . $Is_Crowded 
                . '&Experience=' . $Experience . '$review' . $rating . 'rating' . $username . 'username';

    // Check if any fields are empty
    if (empty($Building_name)){
        header("Location: submit-building-review.php?error=Building name is required&$review_data");
        exit();
    } else if(empty($Accessibility)){
        header("Location: submit-building-review.php?error=Accessibility is required&$review_data");
        exit();
    }  else if(empty($Is_Crowded)){
        header("Location: submit-building-review.php?error=Is_Crowded is required&$review_data");
        exit();
    }  else if(empty($Experience)){
        header("Location: submit-building-review.php?error=Experience is required&$review_data");
        exit();
	} else if(empty($review)) {
		header("Location: submit-building-review.php?error=Review is required&$review_data");
		exit();
	} else if(empty($rating)){
		header("Location: submit-building-review.php?error=Review is required&$review_data");
		exit();
	} else if(empty($username)){
		header("Location: submit-building-review.php?error=Username is required&$review_data");
		exit();
        // All fields filled in, so check if correct
    }
    else {
			
			$SqlUID = "SELECT ID FROM `user` WHERE Username = '$username'";
			$resultUID = mysqli_query($conn, $SqlUID);
			$rowUID = mysqli_fetch_assoc($resultUID);
			$UID = $rowUID['ID'];
			
			  // Check if course code is correct
        
        $sql = "SELECT * FROM building WHERE Building_name ='$Building_name'";
        // Performs the $sql query on the connected database in $conn
        $result = mysqli_query($conn, $sql);

        // Code is not correct
        if (mysqli_num_rows($result) ===  0) {
            header("Location: submit-building-review.php?error=Inccorrect Building name .&$review_data");
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
			$sql3 = "INSERT INTO `building_review`(`Building_Review_id`, `Building_name`, `Accessibility`, `Is_Crowded`) VALUES ('$RID', '$Building_name', '$Accessibility', '$Is_Crowded')";
			$sql4 = "INSERT INTO `experience`(`E_review_id`, `E_Building_name`, `Experience`) VALUES ('$RID','$Building_name','$Experience')";
            $result1 = mysqli_query($conn, $sql1);
			$result2 = mysqli_query($conn, $sql2);
			$result3 = mysqli_query($conn, $sql3);
			$result4 = mysqli_query($conn, $sql4);

            if($result4)
			{
                header("Location: building-main.php?success=Building review successfully added.");
                exit();

            } else {

                header("Location: submit-building-review.php?error=Unknown error occurred&$review_data");
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