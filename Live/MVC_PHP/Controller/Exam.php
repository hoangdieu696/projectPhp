<?php
    class Exam extends Controller{
        protected $data ;
        protected $user ;
        function __construct()
        {
            $this->data = $this->model("FileModel");
        }
        function index(){
            if(isset($_POST['file_id']))
            {
                $id= intval($_POST['file_id']);
                echo $this->data->getReadFileExcel($id);
            }
            $this->view("ExamView",["name"=>"Hello"]);
            
        }
        function show(){
           
            $this->view("ShowExam");
            
           
        }
        function score() {
          
        }
    }
?>