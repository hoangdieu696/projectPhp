<?php
    include('config_database.php') ;
    class Answer{
        public $ques ;
        public $ans ;
        function __construct($ques , $ans)
        {
            $this->ques = $ques ;
            $this->ans = $ans ;
        } 
        function get_Question() {
            return $this->ques ;
        }
        function get_Ans() {
            return $this->ans ;
        }
    }
    if(isset($_POST['answer']))
    {
        $arr = array() ;
        $json =  ( $_POST['answer']);      
        $ansTest ="" ;
        for($i = 3 ; $i < strlen($json)-1 ; $i+=2)
        {
            $ansTest .= $json[$i];
            $ansTest .=':';
            $ansTest .=$json[$i+1] ;
            $ans_user = new Answer($json[$i], $json[$i+1]);
            array_push($arr,$ans_user);
        }
        echo $ansTest .'->'.$json;
    }
    if(isset($_POST['id'])) {
        echo $_POST['id'] ;
    }
    if(isset($_POST['file_id'])) {

        $sql = "SELECT * FROM ";
    }
?>