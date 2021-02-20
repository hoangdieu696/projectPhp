<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="layout.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>
        <script  src="jquery-3.5.1.min.js"></script>
        
        <script type="text/javascript" src="table.js"></script>
        <script type="text/javascript" src="event.js"></script>
    </head>
    <body>
            <div class="user_form_exam">
                    <div class="btn_start">
                        <button class="btn-submit" id = 'nop_bai'> NỘP BÀI</button>
                    </div>
                    <div class="time_start">
                        <h1 id="time_1" style="text-align: center;">Time </h1>
                        
                    </div>
                    <div class="select_exam">
                        <button class = "btn_select_type" id="select_examination_tn"> THI KHTN</button>
                        <button class = "btn_select_type" id="select_examination_xh"> THI KHXH</button>
                    </div>

                    <div class="container_take_form">
                            <div class="left_container_take_form">
                                <iframe class="frame_pdf" id ="frame_id_file">

                                </iframe>
                            </div>
                            <div class="right_container_take_form">
                                <div class="right_container_take_form_1">
                                        <table id="table_question" >
                                        </table>
                                </div> 
                                <div class="right_container_take_form_2">
                                        <div class="btn_container_x" id="btn_x">
                                        </div>
                                </div>
                                
                            </div>
                    </div>
            </div>
    </body>
</html>
