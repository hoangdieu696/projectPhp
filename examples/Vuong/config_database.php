<?php
    $host = 'localhost' ;
    $user = 'root' ;
    $pass ='' ;
    $connection = new mysqli($host,$user,$pass,'hethongtaikhoan') ;
    if($connection->connect_errno) {
        die() ;
    }
?>