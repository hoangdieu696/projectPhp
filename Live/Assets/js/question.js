$(document).ready(function(){
    var part_id = 1;
    var renderWindow = {
        formula : document.getElementById("question"),
        update: function(data) {
            this.formula.innerHTML = data ;
            MathJax.Hub.Queue(["Typeset",MathJax.Hub,this.formula]);
        }
    };
    $.post('./Exam/index',{file_id:part_id},function(data){
        renderWindow.update(data.substr(0,data.indexOf("<html>")));
        clickAnswer();
        inputUser();
        console.log("first-time" +"\n");
    });  
    function inputUser() {
        $("#list_input").on('input',function(evt){
            console.log(evt.target.value + " : " + evt.target.name) ;
            id = getNumber(evt.target.name) ;
            eventColorButton(id);
        }) 
    }
    function clickAnswer() {
        document.querySelectorAll('.list_question').forEach(item => {
            item.addEventListener('click',event=>{

                var data = event.target.value ;
                console.log(data) ;
                var id = getNumber(data) ;
                eventColorButton(id);
            })
        });
    }
    function getNumber(data)
    {
        var id =  parseInt(data[0]) ;
        if(Number.isInteger(data[1])) {
            id = id*10  + parseInt(data[1]) ;
        }
        return id ;
    }
    function eventColorButton(id) {
        var x = document.getElementById("btn_"+id);
        x.className += " addColor";
    }

    function Remove_Mark_Question() {
        for(var i = 1 ; i <= 50 ; i++){
            var element = document.getElementById("btn_"+String(i));
            element.classList.remove('addColor');
          //$('btn_'+i).removeClass('addColor');
        }
      }
      function Remove_User_Select() {
          for(var i  = 1 ; i <= 50 ; i++)
          {
              var element = document.getElementsByName(String(i)) ;
              for(var j = 0 ; j < 4 ; j++)
              {
                  element[j].checked = false ;
              }
          }
      }

});