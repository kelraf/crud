<?php 

    class Database {
        private $host = "localhost";
        private $dbname = "todo";
        private $username = "root";
        private $connection;

        public function __construct() {
            try {
                $this->connection = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->username);
                // $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, POD::FETCH_ASSOC);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                echo "Successfully Connected To The Database <br />";
            } catch(PDOExeption $ex) {

                echo "Error :".$ex->getMessage();
            }
        }

        public function getConn() {
            echo "Here is the Connetion <br />";
            return $this->connection;
        }

        // public function close() {
        //     $this->connection = null;
        //     echo "Connection Closed";
        // }
    }

    // $conn = new Database();
    // $conn->getConn();
    // $conn->close();

?>