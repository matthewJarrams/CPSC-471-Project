<?php

    class Department{
        //db stuff

        private $conn;
        private $table = 'department';

        //user attributes
        public $D_Code;
        public $D_Description;
        public $D_Name;

        //constructor with db connection

        public function __construct($db){
            $this->conn = $db;
        }
        
        //getting departments from database
        public function read(){
            //create query
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
        //create query
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

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->D_Code = $row['D_Code'];
        $this->D_Description = $row['D_Description'];
        $this->D_Name = $row['D_Name'];

        return $stmt;

    }

       
    // Creates a department
    public function create(){
        //create query
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

        //execute the query
        if($stmt->execute()){
            return true;
        }
        
        //print error if something goes wrong
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