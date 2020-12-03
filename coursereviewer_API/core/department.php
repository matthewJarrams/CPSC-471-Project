<?php
	//class that holds all functions to do with the department entity
    class Department{
        
		//database connection variables
        private $conn;
        private $table = 'department';

        //Department attributes
        public $D_Code;
        public $D_Description;
        public $D_Name;

        //Professor attributes
        public $Prof_id;
        public $Department_code;
        public $First_name;
        public $Last_name;

        //Offers table attributes
        public $OffDepCode;
        public $Class_O_code;

        //Teaches table attributes
        public $Prof_T_id;
        public $Class_T_code;
        public $Year;
        public $Semester;


        //constructor with db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        //getting departments from database
        public function read(){
            //create query tp retrieve all departments
            $query = 'SELECT
                D_Code,
                D_Description,
                D_Name
                FROM
                ' .$this->table;


        //prepare satement
        $stmt = $this->conn->prepare($query);
        //execute query
        $stmt->execute();

        return $stmt;
        
        }

		
		//Reads a single department by a given D_Code
		public function read_single(){
			//create query to retrieve all department information from a given D_Code
			$query = 'SELECT 
					D_Code,
					D_Description,
					D_Name
					FROM
					' .$this->table. 
					' WHERE D_Code = ? LIMIT 1';

			//prepare satement
			$stmt = $this->conn->prepare($query);
			//binding param
			$stmt->bindParam(1, $this->D_Code);
			//execute the query
			$stmt->execute();

			//retreive returned row
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			//set variables with returned data 
			$this->D_Code = $row['D_Code'];
			$this->D_Description = $row['D_Description'];
			$this->D_Name = $row['D_Name'];

			return $stmt;

		}

		   
		//Creates a department with given information
		public function create(){
			//create query to insert a new department
			$query = 'INSERT INTO ' . $this->table .
			' SET D_Code = :D_Code, D_Description = :D_Description, D_Name = :D_Name';

			//prepare statement
			$stmt = $this->conn->prepare($query);
			//clean data
			$this->D_Code             = htmlspecialchars(strip_tags($this->D_Code));
			$this->D_Description      = htmlspecialchars(strip_tags($this->D_Description));
			$this->D_Name             = htmlspecialchars(strip_tags($this->D_Name));

			
			//binding of parameters
			$stmt->bindParam(':D_Code', $this->D_Code);
			$stmt->bindParam(':D_Description', $this->D_Description);
			$stmt->bindParam(':D_Name', $this->D_Name);

			//execute the query and return true if query is corrected
			if($stmt->execute()){
				return true;
			}
			
			//print error if something goes wrong
			printf("Error %s. \n", $stmt->error);
			return false;
		}

		// adds professor to the database 
		public function addProfessor(){
			//create query to add a new professor to the department
			$query = 'INSERT INTO ' . "professor" .
			' SET Prof_id = :Prof_id, Department_code = :Department_code, First_name = :First_name, 
			Last_name = :Last_name';

			//prepare statement
			$stmt = $this->conn->prepare($query);
			//clean data
			$this->Prof_id               = htmlspecialchars(strip_tags($this->Prof_id));
			$this->Department_code       = htmlspecialchars(strip_tags($this->Department_code));
			$this->First_name            = htmlspecialchars(strip_tags($this->First_name));
			$this->Last_name             = htmlspecialchars(strip_tags($this->Last_name));

			//Auto increment Prof_id by getting the max and adding one
			$sqlmax = "select max(Prof_id) + 1 from professor";
			$sqlmaxstmt = $this->conn->prepare($sqlmax);
			//binding param
			$sqlmaxstmt->bindParam(1, $this->Prof_id);
			//execute the query
			$sqlmaxstmt->execute();
			$rowmax = $sqlmaxstmt->fetch(PDO::FETCH_ASSOC);
			//set variable to equal new prof ID
			$this->Prof_id = $rowmax['max(Prof_id) + 1']; 

			//binding of parameters
			$stmt->bindParam(':Prof_id', $this->Prof_id);
			$stmt->bindParam(':Department_code', $this->Department_code);
			$stmt->bindParam(':First_name', $this->First_name);
			$stmt->bindParam(':Last_name', $this->Last_name);

			//execute the query and return true if executed without error 
			if($stmt->execute()){
				return true;
			}
			
			//print error if something goes wrong
			printf("Error %s. \n", $stmt->error);
			return false;
		}

		//adds offered class to department 
		public function addOfferedClass(){
			//create query to enter class offered from department 
			$query = 'INSERT INTO ' . "offers" .
			' SET OffDepCode = :OffDepCode, Class_O_code = :Class_O_code';

			//prepare statement
			$stmt = $this->conn->prepare($query);
			//clean data
			$this->OffDepCode               = htmlspecialchars(strip_tags($this->OffDepCode));
			$this->Class_O_code             = htmlspecialchars(strip_tags($this->Class_O_code));

			//binding of parameters
			$stmt->bindParam(':OffDepCode', $this->OffDepCode);
			$stmt->bindParam(':Class_O_code', $this->Class_O_code);

			//execute the query and return true if no error returned
			if($stmt->execute()){
				return true;
			}
			
			//print error if something goes wrong
			printf("Error %s. \n", $stmt->error);
			return false;
		}

		//functopn to View department classes given a specific D Code
		public function view_department_classes(){
			//create query to retireve all classes offered by the department
			$query = 'SELECT Class_O_code FROM offers WHERE OffDepCode = ?';

			//prepare satement
			$stmt = $this->conn->prepare($query);
			//binding param
			$stmt->bindParam(1, $this->OffDepCode);
			//execute the query
			$stmt->execute();

		   /* $row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->Class_O_code = $row['Class_O_code'];
			
			$this->Class_O_code = $row['Class_O_code'];
		
		   */

			return $stmt;

		}

		   //function to View all department's professors
		   public function view_department_professors(){
			//create query to get all information about the professor from the department
			$query = 'SELECT p.First_name, p.Last_name, t.Class_T_code, T.Semester, T.Year 
			FROM teaches as t, professor as p WHERE p.Department_code = ? AND t.Prof_T_id = p.Prof_id';

			//prepare satement
			$stmt = $this->conn->prepare($query);
			//binding param from entered information
			$stmt->bindParam(1, $this->Department_code);
			$stmt->bindParam(2, $this->Prof_id);
			//execute the query
			$stmt->execute();
	/*
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			$this->First_name = $row['First_name'];
			$this->Last_name = $row['Last_name'];
			$this->Class_T_code = $row['Class_T_code'];
			$this->Semester = $row['Semester'];
			$this->Year = $row['Year'];*/

			return $stmt;

		}


	}

   



?>