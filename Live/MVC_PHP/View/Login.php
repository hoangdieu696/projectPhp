
<html>
    <head>
    <link rel="stylesheet" href="../Assets/css/login.css">
    </head>
    <body>
            <div class="app-login">
                <div class="center-screen">
                    <div class="app-login_container">
                        <div class="app-login_title"> <h1 id="title_login">Hệ Thống Thi Trắc Nghiệm </h1> </div>
                        <div class="app-login_form">
                            <form action="checkLogin" method="POST">
                                <div class="fix-layout">
                                    <table style="margin: 2%; border-spacing: 30px 10px;">
                                        <tr>
                                            <td><label class="text">Tên Tài Khoản</label></td>
                                            <td><input type="text" id = 'username' name="username"></td>

                                        </tr>
                                        <tr>
                                            <td><label class="text"> Mật Khẩu </label></td>
                                            <td><input type="password" id ='password' name="password"></td>

                                        </tr>
                                        
                                    </table>
                                </div>
                                <div style="display: flex; justify-content: center; "><button class="text" id="submit-login" name="submit"> Đăng Nhập</button></div>                            
                                <div > <p> <?php if(isset($data['failed'])){ echo $data['failed'];}?></p></div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
    </body>
</html>