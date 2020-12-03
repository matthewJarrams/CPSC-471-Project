<?php
	//core class to hold all functions related to the club entity
    class Club{
        
		//database connection variables
        private $conn;
        private $table = 'club';

        //club attributes
        public $Club_name;
        public $Club_description;
        public $Club_location;

        //constructor with db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        //retrieve all clubs from the database and display the information as well as the average rating based on ratings given by users
        public function read(){
            //create query to retrieve the desired information
            $query = 'SELECT club.Club_name, club.Club_description, club.Club_location, AVG(Rating)
						FROM `club`, `review`, `club_review` 
						WHERE club_review.Club_Review_id = review.Review_id AND club_review.Club_Name = club.Club_name
						GROUP BY Club_name';


        //prepare satement
        $stmt = $this->conn->prepare($query);
        //execute query
        $stmt->execute();

        return $stmt;
        
        }

    
        //Retrieves the club that the user specifys
		public function read_single(){
			//create query to access the club the user wants to search for
			$query = 'SELECT 
					*
					FROM
					' .$this->table. 
					' WHERE Club_name = ? LIMIT 1';

			//prepare satement
			$stmt = $this->conn->prepare($query);
			//binding param with user entered club name
			$stmt->bindParam(1, $this->Club_name);
			//execute the query
			$stmt->execute();

			//store tuple retrieved from database in variable
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			//store column values from retrieved tuple in variables
			$this->Club_name = $row['Club_name'];
			$this->Club_description = $row['Club_description'];
			$this->Club_location = $row['Club_location'];

			return $stmt;

		}

		   
		//function to add a club to the database
		public function create(){
			//create query to insert a new club into the database with user entered information
			$query = 'INSERT INTO ' . $this->table .
			' SET Club_name = :Club_name, Club_description = :Club_description, Club_location = :Club_location';

			//prepare statement
			$stmt = $this->conn->prepare($query);
			//clean data
			$this->Club_name             = htmlspecialchars(strip_tags($this->Club_name));
			$this->Club_description      = htmlspecialchars(strip_tags($this->Club_description));
			$this->Club_location             = htmlspecialchars(strip_tags($this->Club_location));

			
			//binding of parameters with entered information
			$stmt->bindParam(':Club_name', $this->Club_name);
			$stmt->bindParam(':Club_description', $this->Club_description);
			$stmt->bindParam(':Club_location', $this->Club_location);

			//execute the query and return true if no constraints are violated
			if($stmt->execute()){
				return true;
			}
			
			//print error if something goes wrong
			printf("Error %s. \n", $stmt->error);
			return false;
		}






	}

   



?>