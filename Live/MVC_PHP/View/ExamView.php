<html>
    <head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="../Assets/js/startExam.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-9" style="margin-top:20%;">
                        <p style="font-size: 40; font-weight: bold;">Chào mừng bạn <span><?php echo $data['name']?></span> </p>
                        <p style="font-size: 30;">Bài thi bao gồm 3 phần thi trong 180 phút </p>
                        <p style="font-size: 25; "> Phần 1: Tư duy định tính </p>
                        <p style="font-size: 25;"> Phần 2: Tư duy định lượng </p>
                        <p style="font-size: 25;">Phần 3: Khoa học xã hội </p>
                        <button id="start" style="margin-top: 20; margin-left: 250  ; width: 200px; height: 50px;" class="btn btn-primary"> BẮT ĐẦU</button>
                </div>
            </div>
        </div>
    </body>
</html>