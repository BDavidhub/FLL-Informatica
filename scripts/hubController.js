let head_dx = document.querySelector("#t11");
let head_sx = document.querySelector("#t0");
let tw = document.querySelectorAll(".tw");
let twArr = Array.from(tw);
let arrTrain = [];
let sw = document.querySelectorAll(".sw");
let swArr = Array.from(sw);
console.log(twArr);
console.log(swArr);



let wm = 80;
let dist;

var arrivingTrain = ['VE', 'VE', 'MI', 'MI', 'TV', 'TO', 'PD', 'PD'];
let leavingTrain = ['VE', 'VE', 'MI', 'MI', 'TV', 'TO', 'VI', 'VI', 'VI', 'VI'];
/*
-MI MI
+TO
 */
let removeFromT = ['PD', 'PD'];
/*
avviene sempre in cima al treno
quindi dalla fine dell'array mi conto quanti vagono lasciano il treno
li tolgo da arrTrain e poi viasualizzo
*/
let addToTrain = ['VI', 'VI', 'VI', 'VI'];


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
    console.log(newTrain);
    console.log(arrTrain);
    //aggiorno il treno;
    for (var i = 0; i < arrTrain.length; i++) {
        if (typeof arrTrain[i] !== 'undefined') {
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
        }
    }
}

function callUpdateTrain() {
    updateTrain(arrivingTrain);
}



function removeWagons(arrRem) {
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
        type = arrTrain.pop();
    }
    console.log(arrTrain);
}


function callRemoveWagons() {
    removeWagons(removeFromT);
}



function addWagons(arrLeave) {
    var fp = 0;
    var contP = 0;
    var dist = 0;
    var makeSpace = 0;
    firstTime = true;


    console.log(arrLeave);
    for (var i = 0; i <= arrLeave.length; i++) {
        if (arrTrain[i] != arrLeave[i] && typeof arrLeave[i] !== 'undefined') { // && typeof arrTrain[i] !== 'undefined'
            console.log("ciao");
            contP++;
            if (firstTime) {
                fp = i;
                firstTime = false;
            }
        }
    }
    for (var i = 0; i < arrLeave.length; i++) {
        if (arrTrain[i] != arrLeave[i] && typeof arrLeave[i] !== 'undefined') {
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
    setTimeout(callRemoveWagons, 2000);
    setTimeout(callAddWagons, 4000);
    setTimeout(trainDeparture,6500);
}
