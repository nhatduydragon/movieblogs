<?php
     class Database{
           protected $dbhost = 'localhost';
           protected $dbuser = 'root';
           protected $dbpass = '';
           protected $dbname = 'movie_blogs';

          public $conn ;
          public $error;

          public function __construct(){
               $this->conn = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
                        
          }

          public function query($sql){
               return $this->conn->query($sql);
          }

          public function close(){
               $this->conn->close();
          }
     }
?>