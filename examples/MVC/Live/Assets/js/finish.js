$(document).ready(function(){
   var id = 1 ;
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
            if(element.length == 1 ){
                  element[0].value = "";
                  continue;
            }
            for(var j = 0 ; j < element.length ; j++)
            {
                element[j].checked = false ;
            }
        }
    }
      document.getElementById('submit').onclick = function(){ finishTest(id) ; id++ ;  console.log(id)} ;
      function finishTest(id) {
            postData(id);
            Remove_Mark_Question() ;
            Remove_User_Select() ;
      }
   
      function postData(id){
         $.post('\\user\\controller\\score.php',{file_id:String(id), answer: getAnswerFinish()}, function(postData){
            console.log("Thành Công");
            console.log(postData);
         });
      }
      function getAnswerFinish() 
      {
         var arr="";
         for(var i = 1 ; i <= 50 ; i++)
            {
              var x = document.getElementsByName(i);
               if(x.length == 1 )
               {
                  arr += i+":"+String(x[0].value)+"->";
                  continue ;
               }
              for(var j = 0 ; j < x.length ; j++ )
              {
                  if(x[j].checked == true )
                  {
                    arr += i+":"+String(String.fromCharCode(j+65))+"->" ;
                  }
              }
            }
            return arr;
            console.log(arr); 
      }
});