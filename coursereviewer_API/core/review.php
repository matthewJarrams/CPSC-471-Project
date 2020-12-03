<?php
	//Review class to hold all functions to retrieve reviews and write reviews to the database
    class Review{
        
		//db connection variable
        private $conn;

        //review attributes
        public $Review_id;
        public $Description_review;
        public $Rating;
        public $Date_made;
		
		//class_review attributes
        public $Class_review_id;
        public $Class_code; 
        public $Would_take_again;
        public $Required;
        public $Textbook;
        public $Work_load;
        public $Difficulty;
        public $Semester;
		public $Year;
		
		//club review attributes
		public $Club_Review_id;
		public $Club_Name;
		public $Cost;
		public $Academic;
		public $Leisure;
		
		//building review attributes
		public $Building_Review_id;
		public $Building_name;
		public $Accessibility; 
		public $Is_Crowded;
		
		//experience attributes
		public $E_review_id;
		public $E_Building_name;
		public $Experience;

        //constructor with db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
		
        //function to retrieve all reviews from an entered class
        public function read_reviews_class(){
			//create query
            $query = 'SELECT * FROM `user`, `makes_review`, `class`, `class_review`, `review` WHERE Code = ? AND Code = Class_Code AND class.Code = class_review.Class_code AND class_review.Class_review_id = review.Review_id AND makes_review.Review_M_id = review.Review_id AND user.ID = makes_review.Stu_R_id';


			//prepare satement
			$stmt = $this->conn->prepare($query);
			//bind parameter entered for course code
			$stmt->bindParam(1, $this->Code);
			//execute query
			$stmt->execute();

			return $stmt;
        
        }
		
		//function to retrieve all reviews from an entered club
        public function read_reviews_club(){
			//create query
            $query = 'SELECT * FROM `user`, `makes_review`, `club`, `club_review`, `review` WHERE club.Club_name = ? AND club.Club_name = club_review.Club_Name AND club.Club_name = club_review.Club_Name AND Club_Review_id = Review_id AND makes_review.Review_M_id = review.Review_id AND user.ID = makes_review.Stu_R_id';


			//prepare satement
			$stmt = $this->conn->prepare($query);
			//bind parameter entered for club name
			$stmt->bindParam(1, $this->Club_name);
			//execute query
			$stmt->execute();

			return $stmt;
        
        }
		
		//function to retrieve all reviews from an entered building name
        public function read_reviews_building(){
			//create query
            $query = 'SELECT * FROM `user`, `makes_review`, `building`, `building_review`, `review`, `experience` WHERE building.Building_name = ? AND building.Building_name = building_review.Building_name AND building_review.Building_name = experience.E_Building_name AND experience.E_review_id = Building_Review_id AND Building_Review_id = Review_id AND makes_review.Review_M_id = review.Review_id AND user.ID = makes_review.Stu_R_id';


			//prepare satement
			$stmt = $this->conn->prepare($query);
			//bind parameter in query to building name entered
			$stmt->bindParam(1, $this->Building_name);
			//execute query
			$stmt->execute();

			return $stmt;
        
        }

		//function to write a new  class reivew 
		public function write_class_review()
		{
			
		//Auto increment Review ID number by retrieving max id in database and adding 1
        $sqlmax = "select max(Review_id) + 1 from review";
        $sqlmaxstmt = $this->conn->prepare($sqlmax);
        //binding param
        $sqlmaxstmt->bindParam(1, $this->Review_id);
        //execute the query
        $sqlmaxstmt->execute();
		
		//retrieve row from query result and set equal to new review id
        $rowmax = $sqlmaxstmt->fetch(PDO::FETCH_ASSOC);
		$this->Review_id = $rowmax['max(Review_id) + 1']; 
		
		//get user id from entered username to put into makes_review table 
        $sqluser = "select ID from user where Username = ?";
        $sqlusersmt = $this->conn->prepare($sqluser);
        //binding param
        $sqlusersmt->bindParam(1, $this->Username);
        //execute the query
        $sqlusersmt->execute();
        $rowuser = $sqlusersmt->fetch(PDO::FETCH_ASSOC);
		$this->Stu_R_id = $rowuser['ID']; 
		
		//create query to insert into review then student who makes_review and then into class_review with all entered information
        $query1 = 'INSERT INTO Review 
         SET Review_id = :Review_id, Description_review = :Description_review, Rating = :Rating, Date_made = :Date_made';
		$query2 = 'INSERT INTO makes_review 
         SET Stu_R_id = :Stu_R_id, Review_M_id = :Review_M_id';
		$query3 = 'INSERT INTO class_review 
         SET Class_review_id = :Class_review_id, Class_code = :Class_code, Would_take_again = :Would_take_again, Required = :Required, Textbook = :Textbook, Work_load = :Work_load, Difficulty = :Difficulty, Semester = :Semester, Year = :Year';

        //prepare statement
        $stmt1 = $this->conn->prepare($query1);
		$stmt2 = $this->conn->prepare($query2);
		$stmt3 = $this->conn->prepare($query3);
        //clean data
        $this->Review_id                    = htmlspecialchars(strip_tags($this->Review_id));
        $this->Description_review            = htmlspecialchars(strip_tags($this->Description_review));
        $this->Rating             = htmlspecialchars(strip_tags($this->Rating));
        $this->Date_made             = htmlspecialchars(strip_tags($this->Date_made));
        $this->Username              = htmlspecialchars(strip_tags($this->Username));
        $this->Review_M_id              = htmlspecialchars(strip_tags($this->Review_id));
        $this->Class_review_id              = htmlspecialchars(strip_tags($this->Class_review_id));
        $this->Class_code              = htmlspecialchars(strip_tags($this->Class_code));
        $this->Would_take_again            = htmlspecialchars(strip_tags($this->Would_take_again));
        $this->Required           = htmlspecialchars(strip_tags($this->Required));
        $this->Textbook           = htmlspecialchars(strip_tags($this->Textbook));
        $this->Work_load         = htmlspecialchars(strip_tags($this->Work_load));
        $this->Difficulty                  = htmlspecialchars(strip_tags($this->Difficulty));
        $this->Semester            = htmlspecialchars(strip_tags($this->Semester));
        $this->Year            = htmlspecialchars(strip_tags($this->Year));

        
        

        /*//Default values
        $this->Super_flag = 0;
        $this->Client_flag = 1;
        $this->Permissions = "none";*/
		//set values not entered by user
        $this->Date_made = date('Y-m-d');
        $this->Review_M_id = $this->Review_id;
		$this->Class_review_id = $this->Review_id;
        //binding of parameters
        $stmt1->bindParam(':Review_id', $this->Review_id);
        $stmt1->bindParam(':Description_review', $this->Description_review);
        $stmt1->bindParam(':Rating', $this->Rating);
        $stmt1->bindParam(':Date_made', $this->Date_made);
        //$stmt->bindParam(':Username', $this->Username);
        $stmt2->bindParam(':Stu_R_id', $this->Stu_R_id);
        $stmt2->bindParam(':Review_M_id', $this->Review_M_id);
        $stmt3->bindParam(':Class_review_id', $this->Class_review_id);
        $stmt3->bindParam(':Class_code', $this->Class_code);
        $stmt3->bindParam(':Would_take_again', $this->Would_take_again);
        $stmt3->bindParam(':Required', $this->Required);
        $stmt3->bindParam(':Textbook', $this->Textbook);
        $stmt3->bindParam(':Work_load', $this->Work_load);
        $stmt3->bindParam(':Difficulty', $this->Difficulty);
        $stmt3->bindParam(':Semester', $this->Semester);
        $stmt3->bindParam(':Year', $this->Year);
		
		
		//execute queries and return true if all are correct
		$stmt1->execute();
		$stmt2->execute();
        if($stmt3->execute()){
            return true;
        }
        
        //print error if something goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
		}
		
		//function to write a new  club reivew 
		public function write_club_review()
		{
			
		//Auto increment review ID for new review
        $sqlmax = "select max(Review_id) + 1 from review";
        $sqlmaxstmt = $this->conn->prepare($sqlmax);
        //binding param
        $sqlmaxstmt->bindParam(1, $this->Review_id);
        //execute the query
        $sqlmaxstmt->execute();
        $rowmax = $sqlmaxstmt->fetch(PDO::FETCH_ASSOC);
		
		//set id variable to new value returned
		$this->Review_id = $rowmax['max(Review_id) + 1']; 
		
		//Get user ID from the username entered 
        $sqluser = "select ID from user where Username = ?";
        $sqlusersmt = $this->conn->prepare($sqluser);
        //binding param
        $sqlusersmt->bindParam(1, $this->Username);
        //execute the query
        $sqlusersmt->execute();
        $rowuser = $sqlusersmt->fetch(PDO::FETCH_ASSOC);
		//enter into makes_review the ID of the student 
		$this->Stu_R_id = $rowuser['ID']; 
		
		//create query for intserting review into review, the student who makes the review into makes_review and the specifics into club_reiview
        $query1 = 'INSERT INTO Review 
         SET Review_id = :Review_id, Description_review = :Description_review, Rating = :Rating, Date_made = :Date_made';
		$query2 = 'INSERT INTO makes_review 
         SET Stu_R_id = :Stu_R_id, Review_M_id = :Review_M_id';
		$query3 = 'INSERT INTO club_review 
         SET Club_Review_id = :Club_Review_id, Club_Name = :Club_Name, Cost = :Cost, Academic = :Academic, Leisure = :Leisure';

        //prepare statement
        $stmt1 = $this->conn->prepare($query1);
		$stmt2 = $this->conn->prepare($query2);
		$stmt3 = $this->conn->prepare($query3);
        //clean data
        $this->Review_id                    = htmlspecialchars(strip_tags($this->Review_id));
        $this->Description_review            = htmlspecialchars(strip_tags($this->Description_review));
        $this->Rating             = htmlspecialchars(strip_tags($this->Rating));
        $this->Date_made             = htmlspecialchars(strip_tags($this->Date_made));
        $this->Username              = htmlspecialchars(strip_tags($this->Username));
        $this->Review_M_id              = htmlspecialchars(strip_tags($this->Review_id));
        $this->Club_Review_id              = htmlspecialchars(strip_tags($this->Club_Review_id));
        $this->Club_Name              = htmlspecialchars(strip_tags($this->Club_Name));
        $this->Cost            = htmlspecialchars(strip_tags($this->Cost));
        $this->Academic           = htmlspecialchars(strip_tags($this->Academic));
        $this->Leisure           = htmlspecialchars(strip_tags($this->Leisure));
        

        
        
		//set defaults that the user does not enter
        $this->Date_made = date('Y-m-d');
        $this->Review_M_id = $this->Review_id;
		$this->Club_Review_id = $this->Review_id;
        //binding of parameters
        $stmt1->bindParam(':Review_id', $this->Review_id);
        $stmt1->bindParam(':Description_review', $this->Description_review);
        $stmt1->bindParam(':Rating', $this->Rating);
        $stmt1->bindParam(':Date_made', $this->Date_made);
        //$stmt->bindParam(':Username', $this->Username);
        $stmt2->bindParam(':Stu_R_id', $this->Stu_R_id);
        $stmt2->bindParam(':Review_M_id', $this->Review_M_id);
        $stmt3->bindParam(':Club_Review_id', $this->Club_Review_id);
        $stmt3->bindParam(':Club_Name', $this->Club_Name);
        $stmt3->bindParam(':Cost', $this->Cost);
        $stmt3->bindParam(':Academic', $this->Academic);
        $stmt3->bindParam(':Leisure', $this->Leisure);
		
		//execute three queries and return true if all are correct
		$stmt1->execute();
		$stmt2->execute();
        if($stmt3->execute()){
            return true;
        }
        
        //print error if something goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
		}
		
		//function to write a new building review to the database
		public function write_building_review()
		{
			
		//Auto increment review ID for the new review to be entered
        $sqlmax = "select max(Review_id) + 1 from review";
        $sqlmaxstmt = $this->conn->prepare($sqlmax);
        //binding param
        $sqlmaxstmt->bindParam(1, $this->Review_id);
        //execute the query
        $sqlmaxstmt->execute();
        $rowmax = $sqlmaxstmt->fetch(PDO::FETCH_ASSOC);
		$this->Review_id = $rowmax['max(Review_id) + 1']; 
		
		//find user ID based on the entered username to insert into makes_review to keep track of who made the review
        $sqluser = "select ID from user where Username = ?";
        $sqlusersmt = $this->conn->prepare($sqluser);
        //binding param
        $sqlusersmt->bindParam(1, $this->Username);
        //execute the query
        $sqlusersmt->execute();
        $rowuser = $sqlusersmt->fetch(PDO::FETCH_ASSOC);
		$this->Stu_R_id = $rowuser['ID']; 
		
		//create query to insert values into review, makes_review and building_review and experience
        $query1 = 'INSERT INTO Review 
         SET Review_id = :Review_id, Description_review = :Description_review, Rating = :Rating, Date_made = :Date_made';
		$query2 = 'INSERT INTO makes_review 
         SET Stu_R_id = :Stu_R_id, Review_M_id = :Review_M_id';
		$query3 = 'INSERT INTO building_review 
         SET Building_Review_id = :Building_Review_id, Building_name = :Building_name, Accessibility = :Accessibility, Is_Crowded = :Is_Crowded';
		$query4 = 'INSERT INTO `experience`
		 SET E_review_id = :E_review_id, E_Building_name = :E_Building_name, Experience = :Experience';

        //prepare statement
        $stmt1 = $this->conn->prepare($query1);
		$stmt2 = $this->conn->prepare($query2);
		$stmt3 = $this->conn->prepare($query3);
		$stmt4 = $this->conn->prepare($query4);
        //clean data
        $this->Review_id                    = htmlspecialchars(strip_tags($this->Review_id));
        $this->Description_review            = htmlspecialchars(strip_tags($this->Description_review));
        $this->Rating             = htmlspecialchars(strip_tags($this->Rating));
        $this->Date_made             = htmlspecialchars(strip_tags($this->Date_made));
        $this->Username              = htmlspecialchars(strip_tags($this->Username));
        $this->Review_M_id              = htmlspecialchars(strip_tags($this->Review_id));
        $this->Building_Review_id              = htmlspecialchars(strip_tags($this->Building_Review_id));
        $this->Building_name              = htmlspecialchars(strip_tags($this->Building_name));
        $this->Accessibility            = htmlspecialchars(strip_tags($this->Accessibility));
        $this->Is_Crowded           = htmlspecialchars(strip_tags($this->Is_Crowded));
        $this->E_review_id           = htmlspecialchars(strip_tags($this->E_review_id));
        $this->E_Building_name           = htmlspecialchars(strip_tags($this->E_Building_name));
        $this->Experience           = htmlspecialchars(strip_tags($this->Experience));
        

        
        
		//set default values not entered by user
        $this->Date_made = date('Y-m-d');
        $this->Review_M_id = $this->Review_id;
		$this->Building_Review_id = $this->Review_id;
		$this->E_review_id = $this->Review_id;
		$this->E_Building_name = $this->Building_name;
		
        //binding of parameters
        $stmt1->bindParam(':Review_id', $this->Review_id);
        $stmt1->bindParam(':Description_review', $this->Description_review);
        $stmt1->bindParam(':Rating', $this->Rating);
        $stmt1->bindParam(':Date_made', $this->Date_made);
        //$stmt->bindParam(':Username', $this->Username);
        $stmt2->bindParam(':Stu_R_id', $this->Stu_R_id);
        $stmt2->bindParam(':Review_M_id', $this->Review_M_id);
        $stmt3->bindParam(':Building_Review_id', $this->Building_Review_id);
        $stmt3->bindParam(':Building_name', $this->Building_name);
        $stmt3->bindParam(':Accessibility', $this->Accessibility);
        $stmt3->bindParam(':Is_Crowded', $this->Is_Crowded);
        $stmt4->bindParam(':E_review_id', $this->E_review_id);
        $stmt4->bindParam(':E_Building_name', $this->E_Building_name);
        $stmt4->bindParam(':Experience', $this->Experience);
		
		
		//execute the 4 insert queries and return true if they are correct
		$stmt1->execute();
		$stmt2->execute();
		$stmt3->execute();
        
        if($stmt4->execute()){
            return true;
        }
        
        //print error if something goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
		}
   
   







}

   



?>