import {callUpdateTrain} from './hubController.js';
var aperto = false;
  $('.stazione1').click(function(){
      //  console.log($('.stazione1').attr('name'));
       $('.rectBlue').children('h3').text($(this).attr('name'));
       callUpdateTrain();
  });    
// var stazione1 =  document.querySelectorAll('.stazione1');
// stazione1.forEach(stazione1 => {
// stazione1.addEventListener('click', event => {
// console.log(stazione1.getAttribute('id'));
// $('.rectB').toggle(4000);
// });

//  });
