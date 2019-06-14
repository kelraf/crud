<?php

    require_once("./base-validator.php");

    class UserDetails extends BaseAndValidator {

        public $user_id;


        public function __construct() {
            parent:: __construct();
        }

        public function addUser() {


            // $sql = $this->db->prepare("INSERT INTO users(username, email, passw, conf_passw) VALUES(?, ?, ?, ?)");
            // $done = $sql->execute([$this->username, $this->email, $this->passw, $this->conf_passw]);

            $sql = $this->db->prepare("INSERT INTO users(username, email, passw, conf_passw) VALUES(?, ?, ?, ?)");
            $done = $sql->execute([$this->username, $this->email, $this->passw, $this->conf_passw]);

            if($done) {
                echo "Successfully Added The User $this->username";
            } else {
                echo "Error";
            }

        }

        public function getAll() {

            // $sql = $this->db->query("SELECT * FROM users");

            // $data = $sql->fetchAll();

            $sql = $this->db->query("SELECT * FROM users");
            $data = $sql->fetchAll()

            // print_r($data);

            foreach ($data as $user) {
                echo $user["email"]."<br />";
            }
        }

        public function getOne() {

            $sql = $this->db->prepare("SELECT * FROM users WHERE user_id=?");
            $sql->execute([$this->user_id]);

            $data = $sql->fetch();

            echo $data["username"]."<br />";
        }

        public function update() {

          $sql = $this->db->prepare("UPDATE users SET username=?, email=?, passw=?, conf_passw=? WHERE user_id=?");
          $done = $sql->execute([$this->username, $this->email, $this->passw, $this->conf_passw, $this->user_id]);

          if($done) {
            echo "Successfully Updated The User <br />";
          } else {
            echo "Unable To Update The User";
          }
        }

        public function delete() {
            $sql = $this->db->prepare("DELETE FROM users WHERE user_id = ?");
            $sql->execute([$this->user_id]);

            echo "Successfully Deleted One User";
        }
    }

    $user = new UserDetails();

    $user->username = "sufuria";
    $user->email = "sufuria@gmail.com";
    $user->passw = "sufuria11746";
    $user->conf_passw = "sufuria11746";

    // $user->addUser();

    $user->getAll();

    $user->user_id = 2;

    $user->getOne();


    $user->username = "mbichwa";
    $user->email = "mbichwa@gmail.com";
    $user->passw = "mbichwal11746";
    $user->conf_passw = "mbichwal11746";
    $user->user_id = 1;

    $user->update();

    $user->user_id = 5;
    $user->delete();

?>
