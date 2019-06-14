<?php 

require_once("../../config/database.php");

    class BaseAndValidator {
        public $username;
        public $email;
        public $passw;
        public $conf_passw;

        protected $db;

        public function __construct() {
            $database = new Database();
            $this->db = $database->getConn();
        }

        public function __destruct() {
            // $this->db = null;
            echo "Successfully Disconnected Database";
        }

        public function validate() {

        }
    }

    // $validate = new BaseAndValidator();

?>