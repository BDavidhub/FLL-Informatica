// import {callUpdateTrain} from './hubController.js';
var aperto = false;
  $('.stazione1').click(function(){
      //  console.log($('.stazione1').attr('name'));
       $('.rectBlue').children('h3').text($(this).attr('name'));




      //  callUpdateTrain();
  });    
// var stazione1 =  document.querySelectorAll('.stazione1');
// stazione1.forEach(stazione1 => {
// stazione1.addEventListener('click', event => {
// console.log(stazione1.getAttribute('id'));
// $('.rectB').toggle(4000);
// });

//  });

let arrivingTrain = [,MI,MI,MI,];
let leavingTrain = [];
let removeFromT = [];
let addToTrain = [];

// const xhr = new XMLHttpRequest();
$.ajax('test.json',  
    {
        success: function (data, status, xhr) {
            console.log(data);

        var resObj= data;
            
        
        /*
        FILL ARRIVINGTRAIN ARRAY
        */
        for (var i = 0; i < resObj.array[0].length; i++) {
            arrivingTrain.push(resObj.array[0][i].arrAbb);
        }

        /*
        FILL LEAVINGTRAIN ARRAY
        */
        for (var i = 0; i < resObj.array[1].length; i++) {
            leavingTrain.push(resObj.array[1][i].arrAbb);
        }
        /*
        FILL REMOVEFROMT ARRAY
        */

        var find = arrivingTrain[0]; 
        var search = true;

        for (var i = 0; i < leavingTrain.length; i++) {
            if (leavingTrain[i] == find) {
                console.log("si")
                search = false;
            }
        }

        console.log(search);
        if (search) {
            console.log("si");
            for (var i = 0; i < arrivingTrain.length; i++) {

                if (arrivingTrain[i] == find) {
                    console.log("--" + arrivingTrain[i])
                    removeFromT.push(arrivingTrain[i])
                    // console.log(removeFromT[i])
                }

            }
        }

        stazTit.innerHTML = " Stazione: " + removeFromT[0];
        /*
        FILL ADDTOTRAIN ARRAY
        */
        var cont = 0;
        for (var i = 0; i < leavingTrain.length; i++) {
            cont = 0;
            for (var j = 0; j < arrivingTrain.length; j++) {
                if (leavingTrain[i] == arrivingTrain[j]) {
                    cont++;
                }

            }

            if (cont == 0) {

        //  console.log(leavingTrain[i])
                addToTrain.push(leavingTrain[i]);
            }
        }

        console.log(arrivingTrain)
        console.log(leavingTrain)
        console.log(removeFromT)
        console.log(addToTrain)


        }
});
