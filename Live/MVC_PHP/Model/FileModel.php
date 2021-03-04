<?php
    class Contests {
        public $Question ;
        public $Question_ID ;
        public $Question_Answer;
        function __construct($Question_ID, $Question , $Question_Answer)
        {
            $this->Question_ID = $Question_ID ;
            $this->Question = $Question ;
            $this->Question_Answer = $Question_Answer ;
        }
        
        function setQuestionID( $Question_ID) {
            $this->Question_ID = $Question_ID ;
        }
        function getQuestionID() {
            return $this->Question_ID ;
        }
        
        function setQuestion($Question) {
            $this->Question = $Question ;
        }
        
        function getQuestion() {
            return $this->Question ;
        }
        function setQuestionAnswer( $Question_Answer) {
        $this->Question_Answer = $Question_Answer ;
        }
        function getQuestionAnswer() {
            return $this->Question_Answer ;
        }
    }
    class FileModel extends Database {
    
        public function getFilePath() {
           // path_file_1 path_file_2 path_file_3
            $sql= "SELECT path_pdf_1,path_pdf_2,path_pdf_3 FROM uploadfile";
            $result =  mysqli_query($this->connect,$sql) ;
           
            return ($result);
        }
        public function getReadFileExcel($id) {
            
            $data  = $this->getFilePath();
            while($rows = mysqli_fetch_array($data)) {
                $result[] = $rows;
            }       
            if($id == 1){
                $file_test = $result[0]['path_pdf_1'];
            }else if($id == 2) {
                $file_test = $result[0]["path_pdf_2"];
            }else {
                $file_test = $result[0]["path_pdf_3"];
            }
            
            require_once('./Library/vendor/autoload.php');
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file_test) ;
            $worksheet = $spreadsheet->getActiveSheet();
            $worksheetArray = $worksheet->toArray();
            array_shift($worksheetArray);
            $titleQuestion ="";
            $answerQuestion ="";
            $id_temp = 1 ;
            $flag = true ;
            $run = 0 ;
            $tempImage = 2 ;
            $arr_question = array();
            $row_question = array() ;
            foreach ($worksheetArray as $key => $value) {
                $worksheet = $spreadsheet->getActiveSheet();
                if($value[0] >='0' && $value[0] <= '9')
                {
                    if($flag == false ) {
                        $ctest = new Contests($id_temp,$titleQuestion,$answerQuestion);
                        array_push($arr_question, $ctest) ;
                        $titleQuestion ="";
                        $answerQuestion ="";
                        $run = 0 ;
                    }
                    $flag = true ;
                    $i = 0 ;
                    $id_temp = $value[0];
                    $titleQuestion .= $value[1] ;
                    array_push($row_question,$tempImage) ;
                   // array_push($id_question_num , $id_temp) ;
                    $titleQuestion .= "?";
                }else{
                    $flag =  false ;
                    $answerQuestion .= chr(65);
                    $answerQuestion.=" ";
                    $answerQuestion .= $value[1] ;
                    $run++;
                }
             $tempImage++;
            }
            if($flag == false ) {
                $ctest = new Contests($id_temp,$titleQuestion,$answerQuestion);
                array_push($arr_question, $ctest) ;
                $titleQuestion ="";
                $answerQuestion ="";
                $run = 0 ;
            }
            $question_img = array() ;
            foreach ($worksheetArray as $key => $value) {
                $worksheet = $spreadsheet->getActiveSheet();
                $k = 1 ;
                if(!empty($worksheet->getDrawingCollection()[$key]))
                {
                    $drawing = $worksheet->getDrawingCollection()[$key];
                    $string = $drawing->getCoordinates();
                    $row = intval(substr($string,1,strlen($string))) ;
                    foreach($row_question as $value) {
                        if($value > $row) {
                            $k--;
                            break ;
                        }
                        if($value == $row)
                        {
                            break ;
                        }
                        $k++;
                    }
                   
                    $zipReader = fopen($drawing->getPath(), 'r');
                    $imageContents = '';
                    while (!feof($zipReader)) {
                        $imageContents .= fread($zipReader, 1024);
                    }
                   

                    fclose($zipReader);
                    $url = '<td><img  height="50px" width="250px"  src="data:image/jpeg;base64,'. base64_encode($imageContents).'"/></td>';
                    $contest = new Contests($k,$url,'');
                    array_push($question_img,$contest) ;
                }
            } 
                    $html="";
                    $html="<table><tbody>";
                    for($i = 0 ; $i < count($arr_question) ; $i++)
                    {
                        $html .="<tr><td>  Câu ".$arr_question[$i]->getQuestionID().": ".$arr_question[$i]->getQuestion()."</td></tr>";
                        for($j = 0 ; $j< count($question_img) ; $j++) {
                            if($arr_question[$i]->getQuestionID() == $question_img[$j]->getQuestionID())
                            {
                                $html .="<tr>".$question_img[$j]->getQuestion()."</tr>";
                                break ;
                            }
                        }
                    //  echo $arr_question[$i]->getQuestionAnswer()."<br>" ;
                        $arr_answer = explode(chr(65),$arr_question[$i]->getQuestionAnswer());
                    
                        $run = 0 ;
                        for($j = 0 ; $j < count($arr_answer) ; $j++)
                        {
                            if($arr_answer[$j] == null) {
                                continue;
                            } 
                            if(strpos($arr_answer[$j],"Empty") > 0) {
                                $html .="<tr><td><p><input id = 'list_input' type ='text' name ='".$arr_question[$i]->getQuestionID()."'></p></td></tr>";
                                continue ;
                            }else{
                                $html.="<tr><td><p><input class = 'list_question' type = 'radio' value ='".$arr_question[$i]->getQuestionID().chr(65+$run)."' name ='".$arr_question[$i]->getQuestionID()."'>".chr(65+$run).$arr_answer[$j]."</p></td></tr>";
                            }
                            $run++;
                        }
                    }
                    $html.="</tbody></table>";
                    return $html ;
                    
                }
            }
        
    
?>