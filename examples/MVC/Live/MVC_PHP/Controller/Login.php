<?php
    class Login extends Controller{

        public function User()
        {
            $this->view('HomeView',[]);
        }
        public function checkLogin() {

            if(isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password']))
            {
                $user = $_POST['username'] ;
                $pass = $_POST['password'] ;
                $data = $this->model('UserModel');
                $result = $data->checkLogin($user,$pass) ;
                if($result > 0) {
                   $this->view('ShowExam',["user"=> $user]);
                }else {
                   $this->view('Login',['failed'=>"Tài khoản hoặc mật khẩu không đúng"]);
                }
            }else{
                $this->view('Login',['failed'=>"Tài khoản hoặc mật khẩu không đúng"]);
            }
        
        }
        
    }
?>