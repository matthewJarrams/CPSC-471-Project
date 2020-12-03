<?php
	//core class to hold all functions related to the class entity
    class Course{
		
        //database connection variables
        private $conn;
        private $table = 'class';

        //class attributes
        public $Code;
        public $Description;
		public $AVGRating;
		
		//teaches attributes
		public $Prof_T_id;
		public $Class_T_code;
		public $Year;
		public $Semester;

        //constructor with db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        //retrieve all classes from the database and print info as well as average rating based on reviews
        public function read(){
            //create query
            $query = 'SELECT Code, Description, AVG(Rating)
						FROM `class`, `review`, `class_review` 
						WHERE class_review.Class_review_id = review.Review_id AND class_review.Class_code = class.Code
						GROUP BY Code';

		
			//prepare satement
			$stmt = $this->conn->prepare($query);
			//execute query
			$stmt->execute();

			return $stmt;
			
        }

    
         //Reads a single class by a given class code 
		public function read_single(){
			//create query to retrieve information about selected class
			$query = 'SELECT 
					*
					FROM
					' .$this->table. 
					' WHERE Code = ? LIMIT 1';

			//prepare satement
			$stmt = $this->conn->prepare($query);
			//binding param
			$stmt->bindParam(1, $this->Code);
			//execute the query
			$stmt->execute();

			//store returned row
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			//store returned tuple's columns 
			$this->Code = $row['Code'];
			$this->Description = $row['Description'];

			return $stmt;

		}

		   
		// Creates a class in the database with entered user information
		public function create(){
			//create query to insert class into the database
			$query = 'INSERT INTO ' . $this->table .
			' SET Code = :Code, Description = :Description';

			//prepare statement
			$stmt = $this->conn->prepare($query);
			//clean data
			$this->Code             = htmlspecialchars(strip_tags($this->Code));
			$this->Description      = htmlspecialchars(strip_tags($this->Description));

			
			//binding of parameters
			$stmt->bindParam(':Code', $this->Code);
			$stmt->bindParam(':Description', $this->Description);

			//execute the query and return true if class was successfully added
			if($stmt->execute()){
				return true;
			}
			
			//print error if something goes wrong
			printf("Error %s. \n", $stmt->error);
			return false;
		}
		
			
		//add a professor who teaches a class to the database
		public function add_prof(){
			//create query to insert professor into the teaches table
			$query = 'INSERT INTO ' . "teaches" . ' SET Prof_T_id = :Prof_T_id, Class_T_code = :Class_T_code, Year = :Year, Semester = :Semester';

			//prepare statement
			$stmt = $this->conn->prepare($query);
			//clean data
			$this->Prof_T_id             = htmlspecialchars(strip_tags($this->Prof_T_id));
			$this->Class_T_code      = htmlspecialchars(strip_tags($this->Class_T_code));
			$this->Year      = htmlspecialchars(strip_tags($this->Year));
			$this->Semester      = htmlspecialchars(strip_tags($this->Semester));

			
			//binding of parameters
			$stmt->bindParam(':Prof_T_id', $this->Prof_T_id);
			$stmt->bindParam(':Class_T_code', $this->Class_T_code);
			$stmt->bindParam(':Year', $this->Year);
			$stmt->bindParam(':Semester', $this->Semester);

			//execute the query and return true if no error occured while executing
			if($stmt->execute()){
				return true;
			}
			
			//print error if something goes wrong
			printf("Error %s. \n", $stmt->error);
			return false;
		}










	}

   



?>