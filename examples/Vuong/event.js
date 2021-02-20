$(document).ready(function(){

    var num_id = 0 ;
    
     $.post('answer_user.php',{id : String(num_id+1)},function(data){
      console.log("vao");
    });
    var type_test = 0 ;
   
    function Select_Type_PartIII()
    {
       var path_file ="";
        document.getElementById('select_examination_xh').onclick = function(){

          $.post("answer_user.php",{file_id : "3"}, function(data){
              console.log(data + " OKE!!!!");
              path_file = data ;
          });
          document.getElementById('frame_id_file').src = '' ;
          document.getElementById('select_examination_tn').style.display = 'none' ;
        }
        document.getElementById('select_examination_tn').onclick = function(){ 
          document.getElementById('select_examination_xh').style.display = 'none' ;
          document.getElementById('frame_id_file').src = '' ;
        }
    }
    Select_Type_PartIII() ;

     document.querySelectorAll('.question_x').forEach(item => {
        item.addEventListener('click', event => {
          //handle click
          var question_id = String(event.target.value) ;
          var number = 0 ;
          if(question_id[question_id.length-2] >='0' && question_id[question_id.length-2] <= '9') {
              number = number * 10 + (question_id[question_id.length-2]-'0') ;
          }
          number = number*10 + (question_id[question_id.length-1]-'0') ;
          var colorBtn = "btn_"+number ;
          console.log(colorBtn);
          var v = document.getElementById(String(colorBtn)); 
           v.className += " addColor"; 
        })
      })

      var arr = num_id+":";
      var flag = false ;
      document.getElementById('nop_bai').onclick = function(){ noibai()};
      function noibai(){
        num_id++;

        if(num_id == 3 )
        {
          document.getElementById("select_examination_tn").style.display = 'inline';
          document.getElementById("select_examination_xh").style.display = 'inline';
          flag  = true ;
          document.getElementById('frame_id_file').src = '';
        }
        if(flag == true  && num_id == 3) 
        {
          
        }else{

            for(var i = 1 ; i <= 50 ; i++)
            {
              var x = document.getElementsByName(i);
    
              for(var j = 0 ; j < 4 ; j++ )
              {
                  if(x[j].checked == true )
                  {
                    arr += i+String(String.fromCharCode(j+65)) ;
                  }
              }
            }
            
            $.post("answer_user.php",{answer:JSON.stringify(arr)},function(data){
              console.log("data= " +data);
            });

        }
        
      
         
      }
    
});