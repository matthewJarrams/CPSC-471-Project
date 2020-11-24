<?php


    class User{
        //db stuff

        private $conn;
        private $table = 'user';

        //user properties

        public $ID;
        public $First_name;
        public $Last_name;
        public $Date_made;
        public $Username;
        public $email_address;
        public $Role;
        public $Univeristy;

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
                Univeristy
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
                Univeristy
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
        $this->Univeristy = $row['Univeristy'];


        return $stmt;

    }






}

   



?>