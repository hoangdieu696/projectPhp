<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="layout.css">
    </head>
    <body>
       <div class="container-fluid bg" >
           <div class="row justify-content-center">
                <div class="col-md-4 col-sm-6 col-xs-12 row-container">
                    <form action="" method="POST">
                        <h1 class="text-center"> Hệ Thống Đăng Nhập </h1>
                        <div class="form-group">
                            <label>Tên Tài Khoản</label>
                            <input type="text" class="form-control" placeholder="username" name="username">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu</label>
                            <input type="password" class="form-control" placeholder="password" name="password">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" name="login"> Đăng Nhập</button>
                        </div>
                        <?php include("login.php"); ?>
                    </form>
                </div>
           </div>
       </div>
    </body>
</html>