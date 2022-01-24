let head_dx = document.querySelector("#t11");
let head_sx = document.querySelector("#t0");
let tw = document.querySelectorAll(".tw");
let twArr = Array.from(tw);
let arrTrain = [];
let sw = document.querySelectorAll(".sw");
let swArr = Array.from(sw);
let aW = document.getElementById("aW");
let lW = document.getElementById("lW");
// console.log(twArr);
// console.log(swArr);
let wm = 80;
let dist;
let arrivingTrain = [];
let leavingTrain = [];
let removeFromT = [];
let addToTrain = [];

function reset() {
    for (var i = 0; i < tw.length; i++) {
        tw[i].style = "display:none";
        tw[i].style = "margin:0px";
    }
    for (var i = 0; i < sw.length; i++) {
        sw[i].style = "display:none";
        sw[i].style = "margin:0px";
    }
    move(head_sx)
        .set('margin-left', 0)
        .end();
    move(head_dx)
        .set('margin-left', 0)
        .end();
}

function resetArr() {
    arrTrain = [];
}

function updateTrain(newTrain) {
    dist = 0;
    //aggiorno arrTrain
    for (var i = 0; i < newTrain.length; i++) {
        arrTrain[i] = newTrain[i];
    }
    //aggiorno il treno;
    for (var i = 0; i < arrTrain.length; i++) {
        // if (typeof arrTrain[i] !== 'undefined') {
        tw[i].style = 'display: block';
        dist = (wm * i);
        move(tw[i])
            .add('margin-left', 10)
            .ease('out')
            .duration('1s')
            .set('opacity', 1)
            .duration('0.1s')
            .ease('out')
            .end();
        tw[i].innerHTML = arrTrain[i];
        // }
    }
}





function removeWagons(arrRem) {
    if (arrRem.length != 0) {
        console.log("removeWagons");
        var type = arrRem[0];
        for (var i = 0; i < twArr.length; i++) {
            if (arrTrain[i] === type) {
                move(tw[i])
                    .y(100)
                    .duration('0.45s')
                    .then()
                    .x(2000)
                    .duration('1.5s')
                    .then()
                    .set('display', 'none')
                    .pop()
                    .pop()
                    .end();
            }
        }
        for (var i = 0; i < arrRem.length; i++) {
            type = arrTrain.shift();
        }
        console.log(arrTrain);
    } else {
        console.log("nothing to remove");
    }
}




function addWagons(arrLeave) {
    var fp = 0;
    var contP = addToTrain.length;
    var dist = 0;
    var makeSpace = 0;
    firstTime = true;

    // for (var i = 0; i <= arrLeave.length; i++) {
    //     if (arrTrain[i] != arrLeave[i] && typeof arrLeave[i] !== 'undefined' && typeof arrTrain[i] !== 'undefined') {
    //         if (firstTime) {
    //             fp = i;
    //             firstTime = false;
    //         }
    //     }
    // }

    if(contP > 0){
        for(var i=0;i<arrLeave.length;i++){
            if(firstTime && arrLeave[i]==addToTrain[0]){
                fp=i;
                firstTime = false;
            }
        }
    }

    for (var i = 0; i < arrLeave.length; i++) {
        if (arrTrain[i] != arrLeave[i]) { //&& typeof arrLeave[i] !== 'undefined' && typeof arrTrain[i] !== 'undefined'
            console.log(i);
            arrTrain.splice(i, 0, arrLeave[i]);
        }
    }

    console.log(arrTrain);
    console.log("fp:" + fp);
    console.log("arrLeave: " + arrLeave.length);
    console.log("contP:" + contP);


    for (var i = 0; i < sw.length; i++) {

        if (i >= fp && i < fp + contP) {
            dist = (i * wm) + 200;
            makeSpace = contP * wm;
            sw[i].style = 'display: block';
            sw[i].innerHTML = arrLeave[fp];
            if (i == fp) {
                move(sw[fp])
                    .add('margin-left', dist + (i * 10))
                    .set('opacity', 1)
                    .end();

            } else {
                move(sw[i])
                    .add('margin-left', 1)
                    .set('opacity', 1)
                    .end();

            }
            if (fp + contP == arrLeave.length) {
                console.log("moveHEAD")
                move(head_dx)
                    .add('margin-left', makeSpace)
                    .then()
                    .move(sw[i])
                    .y(100)
                    .pop()
                    .end();
            } else {
                move(tw[fp])
                    .add('margin-left', makeSpace)
                    .then()
                    .move(sw[i])
                    .y(100)
                    .pop()
                    .end();
            }
        }
    }


    // var tmp = arrTrain.filter(function (el) {
    //     return el != null;
    // });

    // arrTrain = tmp;
    console.log(arrTrain);
}


function upArrTrain() {
    updateTrain(arrTrain);
}
function callUpdateTrain() {
    updateTrain(arrivingTrain);
}
function callRemoveWagons() {
    removeWagons(removeFromT);
}
function callAddWagons() {
    addWagons(leavingTrain);
    setTimeout(reset, 1400);
    setTimeout(upArrTrain, 1401);
}
function trainDeparture() {
    move(head_sx)
        .add('margin-left', 3000)
        .duration('3s')
        .end();

}

function automatic() {
    reset();
    resetArr();
    setTimeout(callUpdateTrain, 1000);
    setTimeout(callRemoveWagons, 3000);
    console.log("arrTrain: " + arrTrain);
    setTimeout(callAddWagons, 5000);
    setTimeout(trainDeparture, 7500);
}


/////



const xhr = new XMLHttpRequest();


xhr.onload = function () {
    if (this.status == 200) {

        const resObj = JSON.parse(this.responseText);

        /*
        FILL ARRIVINGTRAIN ARRAY
        */

        // if (resObj.array[0] == null) {
        //     arrivingTrain = [];
        //     removeFromT = [];
        // }else{
        for (var i = 0; i < resObj.array[0].length; i++) {
            arrivingTrain.push(resObj.array[0][i].arrAbb);
        }
        // }





        /*
        FILL LEAVINGTRAIN ARRAY
        */

        // if (resObj.array[1] == null) {
        //     leavingTrain = [];
        //     removeFromT = arrTrain;
        // } else {
        for (var i = 0; i < resObj.array[1].length; i++) {
            leavingTrain.push(resObj.array[1][i].arrAbb);
        }




        /*
        FILL REMOVEFROMT ARRAY
        */  

        var find = arrivingTrain[0]; //arrivingTrain.length-1
        // console.log(find);
        var search = true;

        for (var i = 0; i < leavingTrain.length; i++) {
            // console.log(leavingTrain[i])
            if (leavingTrain[i] == find) {
                search = false;
            }
        }

        console.log(search);
        if (search) {
            console.log("si");
            for (var i = 0; i < arrivingTrain.length; i++) {
            // for (var i = 0; i > arrivingTrain && !stop; i++) {

                if (arrivingTrain[i] == find) {
                    console.log("--"+arrivingTrain[i])
                    removeFromT.push(arrivingTrain[i])
                }

            }
        }
        // }

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

                console.log(leavingTrain[i])
                addToTrain.push(leavingTrain[i]);
            }
        }

        console.log("ciao");
        console.log(arrivingTrain)
        console.log(leavingTrain)
        console.log(removeFromT)
        console.log(addToTrain)
        printWAgons(removeFromT,addToTrain);
        
        // console.log(this.responseText)
    } else {
        console.warn("Did not receive 200 OK from response")
    }
};

xhr.open('get', 'test.json');
xhr.send();
/////////////


function printWAgons(leave, add) {
    for(var i=0;i<leave.length;i++){
        lW.innerHTML = "<br>" + (i+1) + "x "+ leave[i];
    }
    for(var i=0;i<add.length;i++){
        aW.innerHTML = "<br>" + (i+1) + "x "+ add[i];
    }
}



