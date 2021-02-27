<?php
    class Ajax extends Controller {

        private $FileLoad ;
        function getExam($id)
        {
           $this->FileLoad = $this->model('FileModel') ;
           $value = $this->FileLoad->getReadFileExcel();

        }
    }
?>