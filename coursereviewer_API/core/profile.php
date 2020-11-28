<?php

    class Profile{
        //db stuff

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
        

         //Reads a single post by a given ID
    public function read_single(){
        
		$queryType = 'SELECT SG_id 
					  FROM graduate_student
					  WHERE SG_id = ? LIMIT 1';
		$stmt2 = $this->conn->prepare($queryType);
		$stmt2->bindParam(1, $this->ID);
		$stmt2->execute();
		
		$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
		//echo $row2['SG_id'];
		if($row2 == null)
		{
			//create query
			$query = 'SELECT 
					ID, First_name, Last_name, Date_made, Username, email_address, University, Dep_code, Has_graduated, Year, Concentration, Faculty
					FROM user, undergraduate_student 
					WHERE ID = S_id AND ID = ? LIMIT 1';

			//prepare satement
			$stmt = $this->conn->prepare($query);
			//binding param
			$stmt->bindParam(1, $this->ID);
			//execute the query
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

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


			return $stmt;
		}
		else
		{
			//create query
			$query = 'SELECT 
					ID, First_name, Last_name, Date_made, Username, email_address, University, GDep_code, Faculty, Has_graduated, Research_interest
					FROM user, graduate_student 
					WHERE ID = SG_id AND ID = ? LIMIT 1';

			//prepare satement
			$stmt = $this->conn->prepare($query);
			//binding param
			$stmt->bindParam(1, $this->ID);
			//execute the query
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

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


			return $stmt;
		}

    }

    // allows user to enter information if they are a graduate student
    public function AddGradInfo(){
        
		
		
		//create query
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
	
	// allows user to enter information if they are a graduate student
    public function AddUGradInfo(){
        
		
		
		//create query
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

        //execute the query
        if($stmt->execute()){
            return true;
        }
        
        //print error if something goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }
	
	public function AddMinor(){
        
		
		
		//create query
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
	
	public function AddTakenClass(){
        
		
		
		//create query
        $query = 'INSERT INTO takes SET Stu_id = :Stu_id, Class_code = :Class_code';


        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->Stu_id                    = htmlspecialchars(strip_tags($this->Stu_id));
        $this->Class_code            = htmlspecialchars(strip_tags($this->Class_code));
  
        
        //binding of parameters
        $stmt->bindParam(':Stu_id', $this->Stu_id);
        $stmt->bindParam(':Class_code', $this->Class_code);

        //execute the query
        if($stmt->execute()){
            return true;
        }
        
        //print error if something goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }
	
	
	public function MemberOf(){
        
		
		
		//create query
        $query = 'INSERT INTO member_of SET StuClubID = :StuClubID, Club_name = :Club_name';


        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->StuClubID                    = htmlspecialchars(strip_tags($this->StuClubID));
        $this->Club_name            = htmlspecialchars(strip_tags($this->Club_name));
  
        
        //binding of parameters
        $stmt->bindParam(':StuClubID', $this->StuClubID);
        $stmt->bindParam(':Club_name', $this->Club_name);

        //execute the query
        if($stmt->execute()){
            return true;
        }
        
        //print error if something goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }
	
	public function AddTAClass()
	{
		$query = 'INSERT INTO ta_classes SET TA_ID = :TA_ID, Class_name = :Class_name';
		$stmt = $this->conn->prepare($query);
		
		$this->TA_ID                    = htmlspecialchars(strip_tags($this->TA_ID));
        $this->Class_name            = htmlspecialchars(strip_tags($this->Class_name));
		
		$stmt->bindParam(':TA_ID', $this->TA_ID);
		$stmt->bindParam(':Class_name', $this->Class_name);
		
		if($stmt->execute())
		{
			return true;
		}
		printf("Error %s. \n", $stmt->error);
		return false;
	}


/*
    //Updates user info
    public function update(){
        //create query
        $query = 'UPDATE ' . $this->table .
        ' SET First_name = :First_name, Last_name = :Last_name, 
        Password = :Password, email_address = :email_address, 
        University = :University 
        WHERE ID = :ID';

        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->ID                    = htmlspecialchars(strip_tags($this->ID));
        $this->First_name            = htmlspecialchars(strip_tags($this->First_name));
        $this->Last_name             = htmlspecialchars(strip_tags($this->Last_name));
        //$this->Date_made             = htmlspecialchars(strip_tags($this->Date_made));
        //$this->Username              = htmlspecialchars(strip_tags($this->Username));
        $this->Password              = htmlspecialchars(strip_tags($this->Password));
        //$this->Super_flag            = htmlspecialchars(strip_tags($this->Super_flag));
        //$this->Permissions           = htmlspecialchars(strip_tags($this->Permissions));
        //$this->Client_flag           = htmlspecialchars(strip_tags($this->Client_flag));
        $this->email_address         = htmlspecialchars(strip_tags($this->email_address));
        //$this->Role                  = htmlspecialchars(strip_tags($this->Role));
        $this->University            = htmlspecialchars(strip_tags($this->University));

        
        //binding of parameters
        $stmt->bindParam(':ID', $this->ID);
        $stmt->bindParam(':First_name', $this->First_name);
        $stmt->bindParam(':Last_name', $this->Last_name);
        //$stmt->bindParam(':Date_made', $this->Date_made);
        //$stmt->bindParam(':Username', $this->Username);
        $stmt->bindParam(':Password', $this->Password);
        //$stmt->bindParam(':Super_flag', $this->Super_flag);
        //$stmt->bindParam(':Permissions', $this->Permissions);
        //$stmt->bindParam(':Client_flag', $this->Client_flag);
        $stmt->bindParam(':email_address', $this->email_address);
        //$stmt->bindParam(':Role', $this->Role);
        $stmt->bindParam(':University', $this->University);

        //execute the query
        if($stmt->execute()){
            return true;
        }
        
        //print error if something goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }

    //deletes user
    public function delete(){
        //create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE ID = :ID';
        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean the data
        $this->ID            = htmlspecialchars(strip_tags($this->ID));
        $stmt->bindParam(':ID', $this->ID);

        //execute the query
        if($stmt->execute()){
            return true;
        }
        
        //print error if something goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;

    }
*/






}

   



?>