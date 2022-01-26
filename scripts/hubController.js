let head_dx = document.querySelector("#t11");
let head_sx = document.querySelector("#t0");
let tw = document.querySelectorAll(".tw");
let twArr = Array.from(tw);
let arrTrain = [];
let sw = document.querySelectorAll(".sw");
let swArr = Array.from(sw);
let aW = document.getElementById("aW");
let lW = document.getElementById("lW");
let stazTit = document.getElementById("stazTit");
let start = document.getElementById("start123");
console.log(start);
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
    for (var i = 0; i < swArr.length; i++) {
        swArr[i].style = "display:none";
        swArr[i].style = "margin:0px";
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
            .duration('0.001s')
            .then()
            .set('opacity', 1)
            .duration('0.001s')
            .ease('out')
            .pop()
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
    printLeave(removeFromT);
}




function addWagons(arrLeave) {
    var fp = 0;
    var contP = addToTrain.length;
    var dist = 0;
    var makeSpace = 0;
    var firstTime = true;


    //trova fp
    if (contP > 0) {
        for (var i = 0; i < arrLeave.length; i++) {
            if (firstTime && arrLeave[i] == addToTrain[0]) {
                fp = i;
                firstTime = false;
            }
        }
    }
    console.log("fp:" + fp);
    //aggiorno arrTrain
    for (var i = 0; i < arrLeave.length; i++) {
        if (arrTrain[i] != arrLeave[i]) { //&& typeof arrLeave[i] !== 'undefined' && typeof arrTrain[i] !== 'undefined'
            console.log(i);
            arrTrain.splice(i, 0, arrLeave[i]);
        }
    }

    console.log("arrLeave: " + arrLeave.length);
    console.log("contP:" + contP);
    console.log(twArr);

    //sposto i vagoni da inserire
    for (var i = 0; i < arrTrain.length; i++) {

        //
        if (i >= fp && i < fp + contP) {
            dist = (i * wm) + 200;
            makeSpace = contP * wm;
            swArr[i].style = 'display: block';
            swArr[i].innerHTML = arrLeave[fp];
            if (i == fp) {
                move(swArr[fp])
                    .add('margin-left', dist + (i * 10))
                    .set('opacity', 1)
                    .end();

            } else {
                move(swArr[i])
                    .add('margin-left', 1)
                    .set('opacity', 1)
                    .end();

            }
            if (fp + contP == arrLeave.length) {
                console.log("moveHEAD")
                move(head_dx)
                    .add('margin-left', makeSpace)
                    .then()
                    .move(swArr[i])
                    .y(100)
                    .pop()
                    .end();
            } else {
                console.log("twARR");
                console.log(i);
                // console
                move(twArr[fp + 2])
                    .add('margin-left', makeSpace)
                    .then()
                    .move(swArr[i])
                    .y(100)
                    .pop()
                    .end();
            }
        }
    }
    printAdd(addToTrain);


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
    setTimeout(upArrTrain, 1400);
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
    setTimeout(callAddWagons, 6000);
    setTimeout(trainDeparture, 9500);
}


/////



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

start.addEventListener("click", automatic)
// xhr.onload = function () {
    // if (this.status == 200) {
        // const resObj = JSON.parse(this.responseText);


        // console.log(this.responseText)
    // } else {
        // console.warn("Did not receive 200 OK from response")
    // }
// };
// xhr.open('get', '../php_classes/Json.php');
// xhr.send();
// console.log("fjdsahk");
/////////////


function printLeave(leave) {
    if (leave.length > 0) {
        for (var i = 0; i < leave.length; i++) {
            lW.innerHTML = "<br>" + (i + 1) + "x " + leave[i];
        }
    } else {
        lW.innerHTML = "<br>" + "0x";
    }
}

function printAdd(add) {
    if (add.length > 0) {
        for (var i = 0; i < add.length; i++) {
            aW.innerHTML = "<br>" + (i + 1) + "x " + add[i];
        }
    } else {
        aW.innerHTML = "<br>" + "0x";
    }
}


