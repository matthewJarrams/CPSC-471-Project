<?php

    class User{
        //db stuff

        private $conn;
        private $table = 'user';

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

        //constructor with db connection

        public function __construct($db){
            $this->conn = $db;
        }
        
        //getting posts form our database
        public function read(){
            //create query
            $query = 'SELECT
                ID,
                First_name,
                Last_name,
                Date_made,
                Username,
                email_address,
                Role,
                University
                FROM
                ' .$this->table;


        //prepare satement
        $stmt = $this->conn->prepare($query);
        //execute query
        $stmt->execute();

        return $stmt;
        
        }

         //Reads a single post by a given ID
    public function read_single(){
        //create query
        $query = 'SELECT 
                ID,
                First_name,
                Last_name,
                Date_made,
                Username,
                email_address,
                Role,
                University
                FROM
                ' .$this->table. 
                ' WHERE ID = ? LIMIT 1';

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
        $this->Role = $row['Role'];
        $this->University = $row['University'];


        return $stmt;

    }

    // Creates an user
    public function create(){
        //create query
        $query = 'INSERT INTO ' . $this->table .
        ' SET ID = :ID, First_name = :First_name, Last_name = :Last_name, Date_made = :Date_made, 
         Username = :Username, Password = :Password, Super_flag = :Super_flag, 
         Permissions = :Permissions, Client_flag = :Client_flag, 
         email_address = :email_address, Role = :Role, University = :University';

        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->ID                    = htmlspecialchars(strip_tags($this->ID));
        $this->First_name            = htmlspecialchars(strip_tags($this->First_name));
        $this->Last_name             = htmlspecialchars(strip_tags($this->Last_name));
        $this->Date_made             = htmlspecialchars(strip_tags($this->Date_made));
        $this->Username              = htmlspecialchars(strip_tags($this->Username));
        $this->Password              = htmlspecialchars(strip_tags($this->Password));
        $this->Super_flag            = htmlspecialchars(strip_tags($this->Super_flag));
        $this->Permissions           = htmlspecialchars(strip_tags($this->Permissions));
        $this->Client_flag           = htmlspecialchars(strip_tags($this->Client_flag));
        $this->email_address         = htmlspecialchars(strip_tags($this->email_address));
        $this->Role                  = htmlspecialchars(strip_tags($this->Role));
        $this->University            = htmlspecialchars(strip_tags($this->University));

        //Auto increment ID
        $sqlmax = "select max(ID) + 1 from user";
        $sqlmaxstmt = $this->conn->prepare($sqlmax);
        //binding param
        $sqlmaxstmt->bindParam(1, $this->ID);
        //execute the query
        $sqlmaxstmt->execute();
        $rowmax = $sqlmaxstmt->fetch(PDO::FETCH_ASSOC);
		$this->ID = $rowmax['max(ID) + 1']; 
        

        //Default values
        $this->Super_flag = 0;
        $this->Client_flag = 1;
        $this->Permissions = "none";
        $this->Date_made = date('Y-m-d');
        
        //binding of parameters
        $stmt->bindParam(':ID', $this->ID);
        $stmt->bindParam(':First_name', $this->First_name);
        $stmt->bindParam(':Last_name', $this->Last_name);
        $stmt->bindParam(':Date_made', $this->Date_made);
        $stmt->bindParam(':Username', $this->Username);
        $stmt->bindParam(':Password', $this->Password);
        $stmt->bindParam(':Super_flag', $this->Super_flag);
        $stmt->bindParam(':Permissions', $this->Permissions);
        $stmt->bindParam(':Client_flag', $this->Client_flag);
        $stmt->bindParam(':email_address', $this->email_address);
        $stmt->bindParam(':Role', $this->Role);
        $stmt->bindParam(':University', $this->University);

        //execute the query
        if($stmt->execute()){
            return true;
        }
        
        //print error if something goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }

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







}

   



?>