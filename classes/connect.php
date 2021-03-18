<?php
    class database{
        // variables of data base details 
        private $host = "localhost:3308";
        private $username = "root";
        private $password = "";
        private $db = "shopcut_db";
        //function to connect to database
        function connect(){
            $connection = mysqli_connect($this->host,$this->username,$this->password,$this->db);
            return $connection;
        }
        // function to read data base
        function read($query){
            $connection = $this->connect();
            $result = mysqli_query($connection,$query);

            //condition if $result has dta in it
            if (!$result) {
                return false;
            }else{
                $data = false;
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
            }
            return $data;
        }
        // function to save data to the database
        function save($query){
            $connection = $this->connect();
            $result = mysqli_query($connection,$query);

        }
    }
    
    // $DB = new database();
    // $query = "insert into users (first_name,last_name) values ('kimber','alaba')";
    // $result = $DB->save($query);






?>