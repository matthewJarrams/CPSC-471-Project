<?php

    class Building{
        //db stuff

        private $conn;
        private $table = 'building';

        //building attributes
        public $Building_name;
        public $Type;

        //constructor with db connection

        public function __construct($db){
            $this->conn = $db;
        }
        
        //getting buildings from database
        public function read(){
            //create query
            $query = 'SELECT *
                FROM
                ' .$this->table;


        //prepare satement
        $stmt = $this->conn->prepare($query);
        //execute query
        $stmt->execute();

        return $stmt;
        
        }

    
         //Reads a single building by a given building name
    public function read_single(){
        //create query
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

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->Building_name = $row['Building_name'];
        $this->Type = $row['Type'];

        return $stmt;

    }

       
    // Creates a Building
    public function create(){
        //create query
        $query = 'INSERT INTO ' . $this->table .
        ' SET Building_name = :Building_name, Type = :Type';

        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->Building_name             = htmlspecialchars(strip_tags($this->Building_name));
        $this->Type      = htmlspecialchars(strip_tags($this->Type));

        
        //binding of parameters
        $stmt->bindParam(':Building_name', $this->Building_name);
        $stmt->bindParam(':Type', $this->Type);

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