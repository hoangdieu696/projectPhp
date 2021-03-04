<?php
    class ScoreModel extends Database {
        public function getScore( $id_user){
            $sql = "SELECT * FROM score WHERE id_user ='$id_user' ";
            return mysqli_query($this->connect,$sql) ;
        }
        public function updateScore($id_user , $part_1, $part_2,$part_3) {
            $sql = "UPDATE SET id_user ='$id_user' part_1 = '$part_1'
            part_2 = '$part_2' part_3 = '$part_3' WHERE id_user = '$id_user' ";
            return mysqli_query($this->connect,$sql) ;
        }
    }
?>