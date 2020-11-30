<?php

class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;


        // class constructor
    public function __construct(
        $dbname = "starcany_loquodb",
        $tablename = "liquor", 
        $servername = "127.0.0.1", /*localhost*/
        $username = "starcany_loq", /*root*/
        $password = "Loquo1234!" /*blank*/
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // create connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             product_name VARCHAR (255) NOT NULL,
                             price FLOAT,
                             vendor_id INT(11) NOT NULL DEFAULT 0,
                             exp_date DATE,
                             etoh_amt FLOAT,
                             img VARCHAR (255)
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    }

    // get product from the database
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);
        if(!$result){
            echo "Query error: ".mysqli_error($this->con);
        }else {
            echo "Query success!";
        }
        $num_rows = mysqli_num_rows($result);
        echo "num_rows: ".$num_rows;
        if(mysqli_num_rows($result) > 0){
            echo $result;
            return $result;
        }else {
            echo "num_rows error!";
        }
    }
}






