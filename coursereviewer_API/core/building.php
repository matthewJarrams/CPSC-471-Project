<?php

	//core class to hold functions related to the buidling entity
    class Building{
        
		//database connection variables
        private $conn;
        private $table = 'building';

        //building attributes
        public $Building_name;
        public $Type;

        //constructor with db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        //function to retrieve all buidlings in the database with the average rating based on made reviews and all information
        public function read(){
            //create query to retrieve desired information
            $query = 'SELECT building.Building_name, Type, AVG(Rating) FROM `building`, `review`, `building_review` WHERE building_review.Building_Review_id = review.Review_id AND building_review.Building_name = building.Building_name GROUP BY building.Building_name';


        //prepare satement
        $stmt = $this->conn->prepare($query);
        //execute query
        $stmt->execute();

        return $stmt;
        
        }

    
        //Reads a single building from the database by a given building name
		public function read_single(){
			//create query to retrieve user entered building name
			$query = 'SELECT 
					*
					FROM
					' .$this->table. 
					' WHERE Building_name = ? LIMIT 1';

			//prepare satement
			$stmt = $this->conn->prepare($query);
			//binding param
			$stmt->bindParam(1, $this->Building_name);
			//execute the query
			$stmt->execute();

			//store retrieved tuple in variable
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			//store tuple columns in variables
			$this->Building_name = $row['Building_name'];
			$this->Type = $row['Type'];

			return $stmt;

		}

		   
		//function to add a Building to the database that does not already exist
		public function create(){
			//create query to insert new building
			$query = 'INSERT INTO ' . $this->table .
			' SET Building_name = :Building_name, Type = :Type';

			//prepare statement
			$stmt = $this->conn->prepare($query);
			//clean data
			$this->Building_name             = htmlspecialchars(strip_tags($this->Building_name));
			$this->Type      = htmlspecialchars(strip_tags($this->Type));

			
			//binding of parameters wtih user entered information
			$stmt->bindParam(':Building_name', $this->Building_name);
			$stmt->bindParam(':Type', $this->Type);

			//execute the query and return true if executed correctly
			if($stmt->execute()){
				return true;
			}
			
			//print error if something goes wrong
			printf("Error %s. \n", $stmt->error);
			return false;
		}








	}

   



?>