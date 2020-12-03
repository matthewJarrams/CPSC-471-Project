<?php

	//profile class to hold all functions to do with adding profile information
    class Profile{
        
		//database connection variable
        private $conn;

        //user attributes
        public $ID;
        public $First_name;
        public $Last_name;
        public $Date_made;
        public $Username;
        public $Password; 
        public $Super_flag;
        public $Permissions;
        public $Client_flag;
        public $email_address;
        public $Role;
        public $University;
		
		//undergraduate attributes
		public $S_id;
		public $Dep_code;
		public $UGHas_graduated;
		public $Year;
		public $Concentration;
		public $UGFaculty;
		
		//graduate attributes
		public $SG_id;
		public $GDep_code;
		public $GFaculty;
		public $GHas_graduated;
		public $Research_interest;
		
		//Ta classes attributes
		public $TA_ID;
		public $Class_name;
		
		//Minors in attributes
		public $Stu_ID;
		public $MinD_code;
		
		//takes attributes
		public $Stu_id;
		public $Class_code;
		
		

        //constructor with db connection
        public function __construct($db){
            $this->conn = $db;
        }
        

		//Reads a single profile given the Id number
		public function read_single(){
			
			//query to get a graduate student 
			$queryType = 'SELECT SG_id 
						  FROM graduate_student
						  WHERE SG_id = ? LIMIT 1';
			$stmt2 = $this->conn->prepare($queryType);
			$stmt2->bindParam(1, $this->ID);
			$stmt2->execute();
			
			//if no row is returned from this query then the student is an undergraduate student
			$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
			//echo $row2['SG_id'];
			if($row2 == null)
			{
				//create query to retrieve the profile info of the undergraduate student
				$query = 'SELECT 
						ID, First_name, Last_name, Date_made, Username, email_address, University, Dep_code, Has_graduated, Year, Concentration, Faculty, MinD_code
						FROM user, undergraduate_student, minors_in 
						WHERE ID = STU_ID AND ID = S_id AND ID = ? LIMIT 1';

				//prepare satement
				$stmt = $this->conn->prepare($query);
				//binding param
				$stmt->bindParam(1, $this->ID);
				//execute the query
				$stmt->execute();

				//retrieve the row of the student
				$row = $stmt->fetch(PDO::FETCH_ASSOC);


				//set variables with data
				$this->ID = $row['ID'];
				$this->First_name = $row['First_name'];
				$this->Last_name = $row['Last_name'];
				$this->Date_made = $row['Date_made'];
				$this->Username = $row['Username'];
				$this->email_address = $row['email_address'];
				$this->University = $row['University'];
				$this->Dep_code = $row['Dep_code'];
				$this->UGHas_graduated = $row['Has_graduated'];
				$this->Year = $row['Year'];
				$this->Concentration = $row['Concentration'];
				$this->UGFaculty = $row['Faculty'];
				$this->MinD_code = $row['MinD_code'];


				return $stmt;
			}
			
			//else the student is a graduate student
			else
			{
				//create query to get grad students information
				$query = 'SELECT 
						ID, First_name, Last_name, Date_made, Username, email_address, University, GDep_code, Faculty, Has_graduated, Research_interest, MinD_code
						FROM user, graduate_student, minors_in
						WHERE ID = STU_ID AND ID = SG_id AND ID = ? LIMIT 1';

				//prepare satement
				$stmt = $this->conn->prepare($query);
				//binding param
				$stmt->bindParam(1, $this->ID);
				//execute the query
				$stmt->execute();
	
	
				//retrieve row returned from executed query 
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	
				//set variables with returned information 
				$this->ID = $row['ID'];
				$this->First_name = $row['First_name'];
				$this->Last_name = $row['Last_name'];
				$this->Date_made = $row['Date_made'];
				$this->Username = $row['Username'];
				$this->email_address = $row['email_address'];
				$this->University = $row['University'];
				$this->GDep_code = $row['GDep_code'];
				$this->GFaculty = $row['Faculty'];
				$this->GHas_graduated = $row['Has_graduated'];
				$this->Research_interest = $row['Research_interest'];
				$this->MinD_code = $row['MinD_code'];


				return $stmt;
			}

		}

		//allows user to enter information if they are a graduate student
		public function AddGradInfo(){
			
			
			
			//create query to enter info into graduate_student
			$query = 'INSERT INTO graduate_student SET SG_id = :SG_id, GDep_code = :GDep_code, Faculty = :GFaculty, Has_graduated = :GHas_graduated, Research_interest = :Research_interest';


			//prepare statement
			$stmt = $this->conn->prepare($query);
			//clean data
			$this->SG_id                    = htmlspecialchars(strip_tags($this->SG_id));
			$this->GDep_code            = htmlspecialchars(strip_tags($this->GDep_code));
			$this->GFaculty             = htmlspecialchars(strip_tags($this->GFaculty));
			$this->GHas_graduated             = htmlspecialchars(strip_tags($this->GHas_graduated));
			$this->Research_interest              = htmlspecialchars(strip_tags($this->Research_interest));
	  
			
			//binding of parameters
			$stmt->bindParam(':SG_id', $this->SG_id);
			$stmt->bindParam(':GDep_code', $this->GDep_code);
			$stmt->bindParam(':GFaculty', $this->GFaculty);
			$stmt->bindParam(':GHas_graduated', $this->GHas_graduated);
			$stmt->bindParam(':Research_interest', $this->Research_interest);

			//execute the query
			if($stmt->execute()){
				return true;
			}
			
			//print error if something goes wrong
			printf("Error %s. \n", $stmt->error);
			return false;
		}
		
		//allows user to enter information if they are a undergraduate student
		public function AddUGradInfo(){
			
			
			
			//create query to insert information into undergraduate
			$query = 'INSERT INTO undergraduate_student SET S_id = :S_id, Dep_code = :Dep_code,  Has_graduated = :UGHas_graduated, Year = :Year, Concentration = :Concentration, Faculty = :UGFaculty';


			//prepare statement
			$stmt = $this->conn->prepare($query);
			//clean data
			$this->S_id                    = htmlspecialchars(strip_tags($this->S_id));
			$this->Dep_code            = htmlspecialchars(strip_tags($this->Dep_code));
			$this->UGHas_graduated             = htmlspecialchars(strip_tags($this->UGHas_graduated));
			$this->Year             = htmlspecialchars(strip_tags($this->Year));
			$this->Concentration              = htmlspecialchars(strip_tags($this->Concentration));
			$this->UGFaculty             = htmlspecialchars(strip_tags($this->UGFaculty));
	  
			
			//binding of parameters
			$stmt->bindParam(':S_id', $this->S_id);
			$stmt->bindParam(':Dep_code', $this->Dep_code);
			$stmt->bindParam(':UGHas_graduated', $this->UGHas_graduated);
			$stmt->bindParam(':Year', $this->Year);
			$stmt->bindParam(':Concentration', $this->Concentration);
			$stmt->bindParam(':UGFaculty', $this->UGFaculty);

			//execute the query and return true if correct
			if($stmt->execute()){
				return true;
			}
			
			//print error if something goes wrong
			printf("Error %s. \n", $stmt->error);
			return false;
		}
		
		//function so user can add thier minor if they take one
		public function AddMinor(){
			
			
			
			//create query to insert into minors_in
			$query = 'INSERT INTO minors_in SET Stu_ID = :Stu_ID, MinD_code = :MinD_code';


			//prepare statement
			$stmt = $this->conn->prepare($query);
			//clean data
			$this->Stu_ID                    = htmlspecialchars(strip_tags($this->Stu_ID));
			$this->MinD_code            = htmlspecialchars(strip_tags($this->MinD_code));
	  
			
			//binding of parameters
			$stmt->bindParam(':Stu_ID', $this->Stu_ID);
			$stmt->bindParam(':MinD_code', $this->MinD_code);

			//execute the query
			if($stmt->execute()){
				return true;
			}
			
			//print error if something goes wrong
			printf("Error %s. \n", $stmt->error);
			return false;
		}
		
		
		//function to add a class the student has taken
		public function AddTakenClass(){
			
			
			
			//create a query to insert the class the student has taken
			$query = 'INSERT INTO takes SET Stu_id = :Stu_id, Class_code = :Class_code';


			//prepare statement
			$stmt = $this->conn->prepare($query);
			//clean data
			$this->Stu_id                    = htmlspecialchars(strip_tags($this->Stu_id));
			$this->Class_code            = htmlspecialchars(strip_tags($this->Class_code));
	  
			
			//binding of parameters
			$stmt->bindParam(':Stu_id', $this->Stu_id);
			$stmt->bindParam(':Class_code', $this->Class_code);

			//execute the query and return true if executed correctly
			if($stmt->execute()){
				return true;
			}
			
			//print error if something goes wrong
			printf("Error %s. \n", $stmt->error);
			return false;
		}
		
		
		//function to add a club that the student is a member of 
		public function MemberOf(){
			
			
			
			//create query to insert the club into member_of
			$query = 'INSERT INTO member_of SET StuClubID = :StuClubID, Club_name = :Club_name';


			//prepare statement
			$stmt = $this->conn->prepare($query);
			//clean data
			$this->StuClubID                    = htmlspecialchars(strip_tags($this->StuClubID));
			$this->Club_name            = htmlspecialchars(strip_tags($this->Club_name));
	  
			
			//binding of parameters
			$stmt->bindParam(':StuClubID', $this->StuClubID);
			$stmt->bindParam(':Club_name', $this->Club_name);

			//execute the query and return true if the query is executed correctly
			if($stmt->execute()){
				return true;
			}
			
			//print error if something goes wrong
			printf("Error %s. \n", $stmt->error);
			return false;
		}
		
		
		//function to add class that the student has been a TA for
		public function AddTAClass()
		{
			//write query to insert a class that the TA has taught
			$query = 'INSERT INTO ta_classes SET TA_ID = :TA_ID, Class_name = :Class_name';
			$stmt = $this->conn->prepare($query);
			
			//clean data 
			$this->TA_ID                    = htmlspecialchars(strip_tags($this->TA_ID));
			$this->Class_name            = htmlspecialchars(strip_tags($this->Class_name));
			
			//bind parameters to the query 
			$stmt->bindParam(':TA_ID', $this->TA_ID);
			$stmt->bindParam(':Class_name', $this->Class_name);
			
			//return true if query was executed correctly
			if($stmt->execute())
			{
				return true;
			}
			//return error if false
			printf("Error %s. \n", $stmt->error);
			return false;
		}
		
		
		//function to retrieve all classes the TA teaches
		 public function read_TAClass(){
			//create query to read all ta_classes from the TA
			$query = 'SELECT *
					FROM ta_classes
					WHERE TA_ID = ? LIMIT 1';

			//prepare satement
			$stmt = $this->conn->prepare($query);
			//binding param
			$stmt->bindParam(1, $this->TA_ID);
			//execute the query
			$stmt->execute();
			
			//retrieve row from query and set variables from returned data
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			$this->TA_ID = $row['TA_ID'];
			$this->Class_name = $row['Class_name'];
			

			return $stmt;

		}
		
		//function to retrieve all classes the student has taken
		public function read_ClassesTaken(){
			//create query to get all class codes 
			$query = 'SELECT Class_code
					FROM takes
					WHERE Stu_id = ?';

			//prepare satement
			$stmt = $this->conn->prepare($query);
			//binding param
			$stmt->bindParam(1, $this->Stu_id);
			//execute the query
			$stmt->execute();
			
			/*$row = $stmt->fetch(PDO::FETCH_ASSOC);

			$this->Stu_id = $row['Stu_id'];
			$this->Class_code = $row['Class_code'];*/
			

			return $stmt;

		}
		
		//function to retrieve all clubs the student is a member of
		public function read_ClubMembership(){
			//create query to get all clubs the student is a member of
			$query = 'SELECT Club_name
					FROM member_of
					WHERE StuClubID = ?';

			//prepare satement
			$stmt = $this->conn->prepare($query);
			//binding param
			$stmt->bindParam(1, $this->StuClubID);
			//execute the query
			$stmt->execute();
			
			/*$row = $stmt->fetch(PDO::FETCH_ASSOC);

			$this->Stu_id = $row['Stu_id'];
			$this->Class_code = $row['Class_code'];*/
			

			return $stmt;

		}





	}

	   



?>