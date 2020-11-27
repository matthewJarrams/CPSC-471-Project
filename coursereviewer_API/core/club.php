<?php

    class Club{
        //db stuff

        private $conn;
        private $table = 'club';

        //user attributes
        public $Club_name;
        public $Club_description;
        public $Club_location;

        //constructor with db connection

        public function __construct($db){
            $this->conn = $db;
        }
        
        //getting departments from database
        public function read(){
            //create query
            $query = 'SELECT
                *
                FROM
                ' .$this->table;


        //prepare satement
        $stmt = $this->conn->prepare($query);
        //execute query
        $stmt->execute();

        return $stmt;
        
        }

    
         //Reads a single department by a given Club name
    public function read_single(){
        //create query
        $query = 'SELECT 
                *
                FROM
                ' .$this->table. 
                ' WHERE Club_name = ? LIMIT 1';

        //prepare satement
        $stmt = $this->conn->prepare($query);
        //binding param
        $stmt->bindParam(1, $this->Club_name);
        //execute the query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->Club_name = $row['Club_name'];
        $this->Club_description = $row['Club_description'];
        $this->Club_location = $row['Club_location'];

        return $stmt;

    }

       
    // Creates a department
    public function create(){
        //create query
        $query = 'INSERT INTO ' . $this->table .
        ' SET Club_name = :Club_name, Club_description = :Club_description, Club_location = :Club_location';

        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->Club_name             = htmlspecialchars(strip_tags($this->Club_name));
        $this->Club_description      = htmlspecialchars(strip_tags($this->Club_description));
        $this->Club_location             = htmlspecialchars(strip_tags($this->Club_location));

        
        //binding of parameters
        $stmt->bindParam(':Club_name', $this->Club_name);
        $stmt->bindParam(':Club_description', $this->Club_description);
        $stmt->bindParam(':Club_location', $this->Club_location);

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