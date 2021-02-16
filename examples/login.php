<?php
    $connection = "localhost" ;
    $user = "root" ;
    $pass = "";
    $mysqli =new mysqli($connection,$user,$pass,"hethongtaikhoan") ;
    if($mysqli->connect_error ) {
        echo("Failed to connect Database") ;
        exit() ;
    }
    $user ="";
    $pass="" ;
    if(isset($_POST['login']))
    {
        $user = $_POST['username'] ;
        $pass = $_POST['password'] ;
        $partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
        if(preg_match($partten ,$user, $matchs)){
            $sql = "SELECT * FROM taikhoan WHERE user = '$user' AND pass = '$pass' ";
            $result = $mysqli->query($sql) ;
            if($result->num_rows > 0)
            {
    
            }else{
                echo "<h4 class='text-center'>Tài khoản hoặc mật khẩu không đúng</h4>";
            }
        }else{
            echo "<h4 class='text-center'>Email không tồn tại</h4>";
        }
      
    }
   
?>
