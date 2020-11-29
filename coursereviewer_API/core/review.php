<?php

    class Review{
        //db stuff

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

        //constructor with db connection

        public function __construct($db){
            $this->conn = $db;
        }
        
        //getting posts form our database
        public function read_reviews_class(){
			//create query
            $query = 'SELECT * FROM `user`, `makes_review`, `class`, `class_review`, `review` WHERE Code = ? AND Code = Class_Code AND class.Code = class_review.Class_code AND class_review.Class_review_id = review.Review_id AND makes_review.Review_M_id = review.Review_id AND user.ID = makes_review.Stu_R_id';


			//prepare satement
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $this->Code);
			//execute query
			$stmt->execute();

			return $stmt;
        
        }

		public function write_class_review()
		{
			
		//Auto increment ID
        $sqlmax = "select max(Review_id) + 1 from review";
        $sqlmaxstmt = $this->conn->prepare($sqlmax);
        //binding param
        $sqlmaxstmt->bindParam(1, $this->Review_id);
        //execute the query
        $sqlmaxstmt->execute();
        $rowmax = $sqlmaxstmt->fetch(PDO::FETCH_ASSOC);
		$this->Review_id = $rowmax['max(Review_id) + 1']; 
		
		//Auto increment ID
        $sqluser = "select ID from user where Username = ?";
        $sqlusersmt = $this->conn->prepare($sqluser);
        //binding param
        $sqlusersmt->bindParam(1, $this->Username);
        //execute the query
        $sqlusersmt->execute();
        $rowuser = $sqlusersmt->fetch(PDO::FETCH_ASSOC);
		$this->Stu_R_id = $rowuser['ID']; 
		
		//create query
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
        $this->Permissions = "none";
        $this->Date_made = date('Y-m-d');*/
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
		
		$stmt1->execute();
		$stmt2->execute();
        //execute the query
        if($stmt3->execute()){
            return true;
        }
        
        //print error if something goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
		}
   







}

   



?>