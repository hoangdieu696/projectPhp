$(document).ready(function(){
    function table_choice() {
        var x = "";
        for(var i = 1 ; i <= 50 ; i++)
        {
            x += "<tr><th>Câu "+i+":</th>"+
            "<th class='question_dis'><input class = 'question_x' type='radio' name='"+i+"' id='A'"+i+" value ='question_"+i+"'"+" unchecked>A</input></th>"+
            "<th class='question_dis'><input class = 'question_x' type='radio' name='"+i+"' id='B'"+i+" value ='question_"+i+"'"+" unchecked>B</input></th>"+
            "<th class='question_dis'><input class = 'question_x' type='radio' name='"+i+"' id='C'"+i+" value ='question_"+i+"'"+" unchecked>C</input></th>"+
            "<th class='question_dis'><input class = 'question_x' type='radio' name='"+i+"' id='D'"+i+" value ='question_"+i+"'"+" unchecked>D</input></th>";
        }
        $('#table_question').html(x);
        var btn = "";
        for(var i = 1 ; i <= 50 ; i++) {
            btn += "<button class='btn_ques_x' id= btn_"+i+">"+i+"</button>";
            if(i % 5 == 0 ) btn+="<br>";
            
        }
        $('#btn_x').html(btn);
    }
    table_choice();
});