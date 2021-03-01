// $(document).ready(function(){
//     var slideIndex = 0 ;
//     showSlide();

//     function showSlide(){
//         console.log(slideIndex);
//         var i  ;
//         var slider = document.getElementsByClassName('slide') ;
//         for(i = 0 ; i < slider.length ; i++) {
//             slider[i].style.display = "none";
//         }
//         slideIndex++;
//         if(slideIndex > slider.length) slideIndex = 1 ;

//         slider[slideIndex-1].style.display = "block" ;
//         setTimeout(showSlide,2000);
//     }
// });

$(document).ready(function () {
    var indexSilder = 0;
    function changeSlider() {
        process();
        console.log(indexSilder);
    }
    function process() {
        var arrSlider = document.getElementsByClassName('slide');

        for (var i = 0; i < arrSlider.length; i++) {
            arrSlider[i].style.display = "none";
        }
        indexSilder += 1;
        if (indexSilder > arrSlider.length) indexSilder = 1;

        arrSlider[indexSilder - 1].style.display = "block";
        setTimeout(process, 2000);
    }
    changeSlider();
})