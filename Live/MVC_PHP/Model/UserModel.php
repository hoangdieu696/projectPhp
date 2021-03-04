<?php
    class UserModel extends Database {
        public function checkLogin($user, $pass) {
             $sql = "SELECT * FROM account WHERE user = '$user' AND pass = '$pass' " ;
             $result =  mysqli_query($this->connect , $sql) ;
             return mysqli_num_rows($result);
        }
        public function getUserName($user, $pass){
            $sql = "SELECT * FROM account WHERE user = '$user' AND pass = '$pass' " ;
            $result =  mysqli_query($this->connect , $sql) ;
            $data = mysqli_fetch_assoc($result);
            return $data['user'];
        }
    }
?>